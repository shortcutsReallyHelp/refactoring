<?php declare(strict_types=1);

namespace NW\WebService\References\Services\Operations\Mappers;

use NW\WebService\References\Services\Operations\DataTransfers\SendNotificationTransfer;

interface MapperInterface
{
    public function map(SendNotificationTransfer $transfer, array $data): SendNotificationTransfer;
}