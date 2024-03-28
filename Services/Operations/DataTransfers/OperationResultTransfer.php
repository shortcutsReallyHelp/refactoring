<?php declare(strict_types=1);

namespace NW\WebService\References\Services\Operations\DataTransfers;

class OperationResultTransfer
{
    /**
     * @var bool
     */
    private $notificationEmployeeByEmail = false;

    /**
     * @var bool
     */
    private $notificationClientByEmail = false;

    /**
     * @var SmsResultTransfer
     */
    private $notificationClientBySms;

    public function __construct()
    {
        $this->notificationClientBySms = new SmsResultTransfer();
    }

    /**
     * @return bool
     */
    public function isNotificationEmployeeByEmail(): bool
    {
        return $this->notificationEmployeeByEmail;
    }

    /**
     * @param bool $notificationEmployeeByEmail
     * @return OperationResultTransfer
     */
    public function setNotificationEmployeeByEmail(bool $notificationEmployeeByEmail): OperationResultTransfer
    {
        $this->notificationEmployeeByEmail = $notificationEmployeeByEmail;
        return $this;
    }

    /**
     * @return bool
     */
    public function isNotificationClientByEmail(): bool
    {
        return $this->notificationClientByEmail;
    }

    /**
     * @param bool $notificationClientByEmail
     * @return OperationResultTransfer
     */
    public function setNotificationClientByEmail(bool $notificationClientByEmail): OperationResultTransfer
    {
        $this->notificationClientByEmail = $notificationClientByEmail;
        return $this;
    }

    /**
     * @return SmsResultTransfer
     */
    public function getNotificationClientBySms(): SmsResultTransfer
    {
        return $this->notificationClientBySms;
    }

    /**
     * @param SmsResultTransfer $notificationClientBySms
     * @return OperationResultTransfer
     */
    public function setNotificationClientBySms(SmsResultTransfer $notificationClientBySms): OperationResultTransfer
    {
        $this->notificationClientBySms = $notificationClientBySms;
        return $this;
    }
}