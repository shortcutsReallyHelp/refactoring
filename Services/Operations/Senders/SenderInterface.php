<?php declare(strict_types=1);

namespace NW\WebService\References\Services\Operations\Senders;

use NW\WebService\References\Services\Operations\DataTransfers\OperationResultTransfer;
use NW\WebService\References\Services\Operations\DataTransfers\SendNotificationTransfer;

interface SenderInterface
{
    public function send(
        SendNotificationTransfer $sendNotificationTransfer,
        OperationResultTransfer $operationResultTransfer
    ): OperationResultTransfer;
}