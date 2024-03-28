<?php declare(strict_types=1);

namespace NW\WebService\References\Services\ContractorNotifications\DataTransfers;

class SendNotificationTransfer
{
    /**
     * @var int
     */
    private $ressellerId;
    /**
     * @var int
     */
    private $clientId;
    /**
     * @var string
     */
    private $eventStatus;
    /**
     * @var int
     */
    private $differencesTo;
    /**
     * @var array
     */
    private $templateData;
    /**
     * @var string
     */
    private $error;

    /**
     * @return int
     */
    public function getRessellerId(): int
    {
        return $this->ressellerId;
    }

    /**
     * @param int $ressellerId
     * @return SendNotificationTransfer
     */
    public function setRessellerId(int $ressellerId): SendNotificationTransfer
    {
        $this->ressellerId = $ressellerId;
        return $this;
    }

    /**
     * @return int
     */
    public function getClientId(): int
    {
        return $this->clientId;
    }

    /**
     * @param int $clientId
     * @return SendNotificationTransfer
     */
    public function setClientId(int $clientId): SendNotificationTransfer
    {
        $this->clientId = $clientId;
        return $this;
    }

    /**
     * @return string
     */
    public function getEventStatus(): string
    {
        return $this->eventStatus;
    }

    /**
     * @param string $eventStatus
     * @return SendNotificationTransfer
     */
    public function setEventStatus(string $eventStatus): SendNotificationTransfer
    {
        $this->eventStatus = $eventStatus;
        return $this;
    }

    /**
     * @return int
     */
    public function getDifferencesTo(): int
    {
        return $this->differencesTo;
    }

    /**
     * @param int $differencesTo
     * @return SendNotificationTransfer
     */
    public function setDifferencesTo(int $differencesTo): SendNotificationTransfer
    {
        $this->differencesTo = $differencesTo;
        return $this;
    }

    /**
     * @return array
     */
    public function getTemplateData(): array
    {
        return $this->templateData;
    }

    /**
     * @param array $templateData
     * @return SendNotificationTransfer
     */
    public function setTemplateData(array $templateData): SendNotificationTransfer
    {
        $this->templateData = $templateData;
        return $this;
    }

    /**
     * @return string
     */
    public function getError(): string
    {
        return $this->error;
    }

    /**
     * @param string $error
     * @return SendNotificationTransfer
     */
    public function setError(string $error): SendNotificationTransfer
    {
        $this->error = $error;
        return $this;
    }
}