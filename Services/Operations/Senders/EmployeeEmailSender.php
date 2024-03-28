<?php declare(strict_types=1);

namespace NW\WebService\References\Services\Operations\Senders;

use NW\WebService\References\Services\ContractorMessages\ContractorMessagesServiceInterface;
use NW\WebService\References\Services\ContractorMessages\DataTransfers\MessageDataTransfer;
use NW\WebService\References\Services\ContractorMessages\DataTransfers\SendMessageDataTransfer;
use NW\WebService\References\Services\Operations\DataTransfers\OperationResultTransfer;
use NW\WebService\References\Services\Operations\DataTransfers\SendNotificationTransfer;
use NW\WebService\References\Services\Operations\Enums\NotificationEvents;
use NW\WebService\References\Services\Operations\Mappers\EmailTemplateMapper;
use NW\WebService\References\Services\Operations\Mappers\InvalidTemplateData;
use NW\WebService\References\Services\Settings\SettingServiceInterface;

class EmployeeEmailSender implements SenderInterface
{
    /**
     * @var SettingServiceInterface
     */
    protected $settingService;

    /**
     * @var ContractorMessagesServiceInterface
     */
    protected $contractorMessagesService;

    /**
     * @var EmailTemplateMapper
     */
    protected $emailTemplateMapper;

    /**
     * @param SettingServiceInterface $settingService
     * @param ContractorMessagesServiceInterface $contractorMessagesService
     * @param EmailTemplateMapper $emailTemplateMapper
     */
    public function __construct(SettingServiceInterface $settingService, ContractorMessagesServiceInterface $contractorMessagesService, EmailTemplateMapper $emailTemplateMapper)
    {
        $this->settingService = $settingService;
        $this->contractorMessagesService = $contractorMessagesService;
        $this->emailTemplateMapper = $emailTemplateMapper;
    }

    public function send(SendNotificationTransfer $sendNotificationTransfer, OperationResultTransfer $operationResultTransfer): OperationResultTransfer
    {
        $templateData = $this->emailTemplateMapper->mapToEmailTemplate($sendNotificationTransfer);

        $emailFrom = $this->settingService->getResellerEmailFrom();
        $emails = $this->settingService->getEmailsByPermit($sendNotificationTransfer->getSeller()->getId(), 'tsGoodsReturn');
        if (!empty($emailFrom) && count($emails) > 0) {
            foreach ($emails as $email) {
                $transfer = (new SendMessageDataTransfer())
                    ->setClientId($sendNotificationTransfer->getClientId())
                    ->setDifferencesTo($sendNotificationTransfer->getDifferencesTo())
                    ->setEventStatus(NotificationEvents::CHANGE_RETURN_STATUS)
                    ->setMessages([
                        (new MessageDataTransfer())
                            ->setEmailFrom($emailFrom)
                            ->setEmailTo($email)
                            ->setMessage(__('complaintEmployeeEmailSubject', $templateData, $sendNotificationTransfer->getSeller()->getId()))
                            ->setSubject(__('complaintEmployeeEmailBody', $templateData, $sendNotificationTransfer->getSeller()->getId()))
                    ])
                    ->setRessellerId($sendNotificationTransfer->getSeller()->getId());
                $this->contractorMessagesService->send($transfer);
            }
            $operationResultTransfer->setNotificationEmployeeByEmail(true);
        }

        return $operationResultTransfer;
    }
}