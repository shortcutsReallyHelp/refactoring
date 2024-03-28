<?php declare(strict_types=1);

namespace NW\WebService\References\Services\ContractorNotifications;

use NW\WebService\References\Services\ContractorNotifications\DataTransfers\SendNotificationTransfer;

interface ContractorNotificationServiceInterface
{
    public function send(SendNotificationTransfer $transfer): ?array;
}