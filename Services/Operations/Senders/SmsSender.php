<?php declare(strict_types=1);

namespace NW\WebService\References\Services\Operations\Senders;

use NW\WebService\References\Services\ContractorNotifications\ContractorNotificationServiceInterface;
use NW\WebService\References\Services\ContractorNotifications\DataTransfers\SendNotificationTransfer as NotifyTransfer;
use NW\WebService\References\Services\Operations\DataTransfers\OperationResultTransfer;
use NW\WebService\References\Services\Operations\DataTransfers\SendNotificationTransfer;
use NW\WebService\References\Services\Operations\DataTransfers\SmsResultTransfer;
use NW\WebService\References\Services\Operations\Enums\NotificationEvents;
use NW\WebService\References\Services\Operations\Enums\NotificationType;
use NW\WebService\References\Services\Operations\Mappers\EmailTemplateMapper;
use NW\WebService\References\Services\Settings\SettingServiceInterface;

class SmsSender implements SenderInterface
{
    /**
     * @var SettingServiceInterface
     */
    protected $settingService;

    /**
     * @var ContractorNotificationServiceInterface
     */
    protected $contractorNotificationService;

    /**
     * тут немного не понятно почему шаблон уведомлении email и sms одинаковые
     * но допустим что они одинаковые поэтому будем использовать то что для email
     * @var EmailTemplateMapper
     */
    protected $emailTemplateMapper;

    /**
     * @param SettingServiceInterface $settingService
     * @param ContractorNotificationServiceInterface $contractorNotificationService
     * @param EmailTemplateMapper $emailTemplateMapper
     */
    public function __construct(SettingServiceInterface $settingService, ContractorNotificationServiceInterface $contractorNotificationService, EmailTemplateMapper $emailTemplateMapper)
    {
        $this->settingService = $settingService;
        $this->contractorNotificationService = $contractorNotificationService;
        $this->emailTemplateMapper = $emailTemplateMapper;
    }

    public function send(SendNotificationTransfer $sendNotificationTransfer, OperationResultTransfer $operationResultTransfer): OperationResultTransfer
    {
        if ($sendNotificationTransfer->getNotificationType() !== NotificationType::TYPE_CHANGE || is_null($sendNotificationTransfer->getDifferencesTo())) {
            return $operationResultTransfer;
        }

        if ($sendNotificationTransfer->getClient()->hasMobile()) {
            $res = $this->contractorNotificationService->send(
                (new NotifyTransfer())
                    ->setRessellerId($sendNotificationTransfer->getResellerId())
                    ->setEventStatus(NotificationEvents::CHANGE_RETURN_STATUS)
                    ->setDifferencesTo($sendNotificationTransfer->getDifferencesTo())
                    ->setClientId($sendNotificationTransfer->getClientId())
                    ->setError('') // не понимаю откуда взялся error нужны уточнения
                    ->setTemplateData($this->emailTemplateMapper->mapToEmailTemplate($sendNotificationTransfer))
            );

            if ($res) {
                $operationResultTransfer->setNotificationClientBySms((new SmsResultTransfer())->setIsSent(true));
            } else {
                $operationResultTransfer->setNotificationClientBySms((new SmsResultTransfer())->setMessage('some error'));
            }
        }

        return $operationResultTransfer;
    }
}