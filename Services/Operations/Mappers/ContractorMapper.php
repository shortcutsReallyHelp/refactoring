<?php declare(strict_types=1);

namespace NW\WebService\References\Services\Operations\Mappers;

use NW\WebService\References\Services\Contractor\ContractorServiceInterface;
use NW\WebService\References\Services\Contractor\Enums\ContractorType;
use NW\WebService\References\Services\Operations\DataTransfers\SendNotificationTransfer;

class ContractorMapper implements MapperInterface
{
    /**
     * @var ContractorServiceInterface
     */
    private $contractorService;

    /**
     * @param ContractorServiceInterface $contractorService
     */
    public function __construct(ContractorServiceInterface $contractorService)
    {
        $this->contractorService = $contractorService;
    }

    public function map(SendNotificationTransfer $transfer, array $data): SendNotificationTransfer
    {
        $resellerId = $transfer->getResellerId();
        $clientId = $transfer->getClientId();
        $creatorId = $transfer->getCreatorId();
        $expertId = $transfer->getExpertId();

        $reseller = $this->contractorService->getById($resellerId);
        if ($reseller === null || $reseller->getType() !== ContractorType::TYPE_SELLER) {
            throw new ContractorNotFound('Seller not found!', 400);
        }

        $client = $this->contractorService->getByClientIdAndSellerId($clientId, $resellerId);
        if ($client === null || $client->getType() !== ContractorType::TYPE_CUSTOMER) {
            throw new ContractorNotFound('Client not found!', 400);
        }
        $transfer->setClient($client);

        $creator = $this->contractorService->getById($creatorId);
        if ($creator === null) {
            throw new ContractorNotFound('Creator not found!', 400);
        }
        $transfer->setCreator($creator);

        $expert = $this->contractorService->getById($expertId);
        if ($expert === null) {
            throw new ContractorNotFound('Expert not found!', 400);
        }
        $transfer->setExpert($expert);
    }
}