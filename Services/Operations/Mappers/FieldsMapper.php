<?php declare(strict_types=1);

namespace NW\WebService\References\Services\Operations\Mappers;

use NW\WebService\References\Services\Operations\DataTransfers\SendNotificationTransfer;

class FieldsMapper implements MapperInterface
{

    public function map(SendNotificationTransfer $transfer, array $data): SendNotificationTransfer
    {
        $transfer->setResellerId($data['resellerId']);
        $transfer->setNotificationType($data['notificationType']);
        $transfer->setClientId($data['clientId']);
        $transfer->setCreatorId($data['creatorId']);
        $transfer->setExpertId($data['expertId']);
        $transfer->setDifferencesFrom($data['differences']['from']);
        $transfer->setDifferencesTo($data['differences']['to']);
        $transfer->setComplaintId($data['complaintId']);
        $transfer->setComplaintNumber($data['complaintNumber']);
        $transfer->setConsumptionId($data['consumptionId']);
        $transfer->setConsumptionNumber($data['consumptionNumber']);
        $transfer->setAgreementNumber($data['agreementNumber']);
        $transfer->setDate($data['date']);
        return $transfer;
    }
}