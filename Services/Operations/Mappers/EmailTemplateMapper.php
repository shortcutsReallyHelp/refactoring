<?php declare(strict_types=1);

namespace NW\WebService\References\Services\Operations\Mappers;

use NW\WebService\References\Services\Operations\DataTransfers\SendNotificationTransfer;

class EmailTemplateMapper
{
    public function mapToEmailTemplate(SendNotificationTransfer $transfer): array
    {
        $templateData = [
            'COMPLAINT_ID'       => $transfer->getComplaintId(),
            'COMPLAINT_NUMBER'   => $transfer->getComplaintNumber(),
            'CREATOR_ID'         => $transfer->getCreator()->getId(),
            'CREATOR_NAME'       => $transfer->getCreator()->getFullName(),
            'EXPERT_ID'          => $transfer->getExpert()->getId(),
            'EXPERT_NAME'        => $transfer->getExpert()->getFullName(),
            'CLIENT_ID'          => $transfer->getClient()->getId(),
            'CLIENT_NAME'        => $transfer->getClient()->getFullName(),
            'CONSUMPTION_ID'     => $transfer->getConsumptionId(),
            'CONSUMPTION_NUMBER' => $transfer->getConsumptionNumber(),
            'AGREEMENT_NUMBER'   => $transfer->getAgreementNumber(),
            'DATE'               => $transfer->getDate(),
            'DIFFERENCES'        => $transfer->getDifferences(),
        ];

        foreach ($templateData as $key => $tempData) {
            if (empty($tempData)) {
                throw new InvalidTemplateData("Template Data ({$key}) is empty!");
            }
        }

        return $templateData;
    }
}