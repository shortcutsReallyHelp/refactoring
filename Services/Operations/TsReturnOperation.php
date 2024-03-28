<?php declare(strict_types=1);

namespace NW\WebService\References\Services\Operations;

use NW\WebService\References\Services\Operations\DataTransfers\OperationResultTransfer;
use NW\WebService\References\Services\Operations\DataTransfers\SendNotificationTransfer;
use NW\WebService\References\Services\Operations\Mappers\ContractorNotFound;
use NW\WebService\References\Services\Operations\Mappers\MapperInterface;
use NW\WebService\References\Services\Operations\Senders\SenderInterface;

class TsReturnOperation implements ReferenceOperation
{
    /**
     * @var array
     */
    protected $requestData;

    /**
     * @var SenderInterface[]
     */
    protected $senders;
    /**
     * @var MapperInterface
     */
    protected $mapper;

    /**
     * @param array $requestData
     */
    public function __construct(MapperInterface $mapper, array $requestData, array $senders)
    {
        $this->requestData = $requestData;
        $this->senders = $senders;
        $this->mapper = $mapper;
    }

    public function handle(): OperationResultTransfer
    {
        $result = new OperationResultTransfer();

        /**
         * @var SendNotificationTransfer $sendNotificationTransfer
         */
        $sendNotificationTransfer = $this->mapper->map(new SendNotificationTransfer(), $this->requestData);

        $this->validate($sendNotificationTransfer);

        foreach ($this->senders as $sender) {
            $sender->send($sendNotificationTransfer, $result);
        }

        return $result;
    }

    protected function validate(SendNotificationTransfer $sendNotificationTransfer): OperationResultTransfer
    {
        if (!$sendNotificationTransfer->getSeller()) {
            throw new ContractorNotFound('Seller not found');
        }
        if (!$sendNotificationTransfer->getClient()) {
            throw new ContractorNotFound('Client not found');
        }
        if (!$sendNotificationTransfer->getCreator()) {
            throw new ContractorNotFound('Creator not found');
        }
        if (!$sendNotificationTransfer->getExpert()) {
            throw new ContractorNotFound('Expert not found');
        }
    }
}