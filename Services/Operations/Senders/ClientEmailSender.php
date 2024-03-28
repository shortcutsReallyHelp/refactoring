<?php declare(strict_types=1);

namespace NW\WebService\References\Services\Operations\Senders;

use NW\WebService\References\Services\ContractorMessages\ContractorMessagesServiceInterface;
use NW\WebService\References\Services\ContractorMessages\DataTransfers\MessageDataTransfer;
use NW\WebService\References\Services\ContractorMessages\DataTransfers\SendMessageDataTransfer;
use NW\WebService\References\Services\Operations\DataTransfers\OperationResultTransfer;
use NW\WebService\References\Services\Operations\DataTransfers\SendNotificationTransfer;
use NW\WebService\References\Services\Operations\Enums\NotificationEvents;
use NW\WebService\References\Services\Operations\Enums\NotificationType;
use NW\WebService\References\Services\Operations\Mappers\EmailTemplateMapper;
use NW\WebService\References\Services\Operations\Mappers\InvalidTemplateData;
use NW\WebService\References\Services\Settings\SettingServiceInterface;

class ClientEmailSender implements SenderInterface
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

        if ($sendNotificationTransfer->getNotificationType() !== NotificationType::TYPE_CHANGE || is_null($sendNotificationTransfer->getDifferencesTo())) {
            return $operationResultTransfer;
        }
        if (empty($emailFrom) || is_null($sendNotificationTransfer->getClient()->getEmail())) {
            return $operationResultTransfer;
        }
        $transfer = (new SendMessageDataTransfer())
            ->setClientId($sendNotificationTransfer->getClientId())
            ->setRessellerId($sendNotificationTransfer->getSeller()->getId())
            ->setDifferencesTo($sendNotificationTransfer->getDifferencesTo())
            ->setEventStatus(NotificationEvents::CHANGE_RETURN_STATUS)
            ->setMessages([
                (new MessageDataTransfer())
                    ->setEmailFrom($emailFrom)
                    ->setEmailTo($sendNotificationTransfer->getClient()->getEmail())
                    ->setMessage(__('complaintClientEmailSubject', $templateData, $sendNotificationTransfer->getSeller()->getId()))
                    ->setSubject(__('complaintClientEmailBody', $templateData, $sendNotificationTransfer->getSeller()->getId()))
            ])
            ->setRessellerId($sendNotificationTransfer->getSeller()->getId());
        $this->contractorMessagesService->send($transfer);
        $operationResultTransfer->setNotificationClientByEmail(true);
        return $operationResultTransfer;
    }
}