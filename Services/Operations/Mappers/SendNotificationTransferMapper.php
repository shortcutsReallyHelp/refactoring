<?php declare(strict_types=1);

namespace NW\WebService\References\Services\Operations\Mappers;

use NW\WebService\References\Services\Operations\DataTransfers\SendNotificationTransfer;

class SendNotificationTransferMapper implements MapperInterface
{
    /**
     * @var MapperInterface[]
     */
    private $mappers;

    /**
     * @param MapperInterface[] $mappers
     */
    public function __construct(array $mappers)
    {
        $this->mappers = $mappers;
    }


    public function map(SendNotificationTransfer $transfer, array $data): SendNotificationTransfer
    {
        foreach ($this->mappers as $mapper) {
            $transfer = $mapper->map($transfer, $data);
        }
        return $transfer;
    }
}