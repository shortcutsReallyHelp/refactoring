<?php declare(strict_types=1);

namespace NW\WebService\References\Controllers;

use NW\WebService\References\Services\Contractor\ContractorService;
use NW\WebService\References\Services\ContractorMessages\ContractorMessagesService;
use NW\WebService\References\Services\ContractorNotifications\ContractorNotificationService;
use NW\WebService\References\Services\Operations\Mappers\ContractorMapper;
use NW\WebService\References\Services\Operations\Mappers\DifferencesMapper;
use NW\WebService\References\Services\Operations\Mappers\EmailTemplateMapper;
use NW\WebService\References\Services\Operations\Mappers\FieldsMapper;
use NW\WebService\References\Services\Operations\Mappers\SendNotificationTransferMapper;
use NW\WebService\References\Services\Operations\ReferenceOperation;
use NW\WebService\References\Services\Operations\Senders\ClientEmailSender;
use NW\WebService\References\Services\Operations\Senders\EmployeeEmailSender;
use NW\WebService\References\Services\Operations\Senders\SmsSender;
use NW\WebService\References\Services\Operations\TsReturnOperation;
use NW\WebService\References\Services\Settings\SettingService;

class OperationExecutionController
{
    // имитация DI и фабрик, в реальной жизни используются DI containers, Service Providers and Factories
    private function createReferenceOperation(array $data): ReferenceOperation
    {
        $settingService = new SettingService();
        $contractorService = new ContractorService();
        $contractorMessagesService = new ContractorMessagesService();
        $contractorNotificationService = new ContractorNotificationService();
        $emailTemplateMapper = new EmailTemplateMapper();

        return new TsReturnOperation(
            new SendNotificationTransferMapper([
                new FieldsMapper(),
                new ContractorMapper($contractorService),
                new DifferencesMapper()
            ]),
            $data,
            [
                new ClientEmailSender($settingService, $contractorMessagesService, $emailTemplateMapper),
                new EmployeeEmailSender($settingService, $contractorMessagesService, $emailTemplateMapper),
                new SmsSender($settingService, $contractorNotificationService, $emailTemplateMapper),
            ]
        );
    }

    public function store()
    {
        $this->createReferenceOperation($_REQUEST['data'])->handle();
    }
}