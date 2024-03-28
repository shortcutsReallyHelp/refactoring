<?php

namespace NW\WebService\References\Services\Operations\Mappers;

use NW\WebService\References\Services\Operations\DataTransfers\SendNotificationTransfer;
use NW\WebService\References\Services\Operations\Enums\NotificationType;
use NW\WebService\References\Services\Operations\Enums\Status;

class DifferencesMapper implements MapperInterface
{

    public function map(SendNotificationTransfer $transfer, array $data): SendNotificationTransfer
    {
        $differences = '';
        if ($transfer->getNotificationType() === NotificationType::TYPE_NEW) {
            $differences = __('NewPositionAdded', null, $transfer->getSeller()->getId());
        } elseif ($transfer->getNotificationType() === NotificationType::TYPE_CHANGE) {
            $differences = __('PositionStatusHasChanged', [
                'FROM' => Status::getName((int)$transfer->getDifferencesFrom()),
                'TO'   => Status::getName((int)$transfer->getDifferencesTo()),
            ], $transfer->getSeller()->getId());
        }
        $transfer->setDifferences($differences);
        return $transfer;
    }
}