<?php declare(strict_types=1);

namespace NW\WebService\References\Services\Operations\DataTransfers;

use NW\WebService\References\Services\Contractor\DataTransfers\ContractorTransfer;

class SendNotificationTransfer
{
    /**
     * @var int
     */
    private $resellerId;
    /**
     * @var int
     */
    private $notificationType;
    /**
     * @var int
     */
    private $clientId;
    /**
     * @var int
     */
    private $creatorId;
    /**
     * @var int
     */
    private $expertId;
    /**
     * @var ?int
     */
    private $differencesFrom;
    /**
     * @var ?int
     */
    private $differencesTo;
    /**
     * @var int
     */
    private $complaintId;
    /**
     * @var string
     */
    private $complaintNumber;
    /**
     * @var int
     */
    private $consumptionId;
    /**
     * @var string
     */
    private $consumptionNumber;
    /**
     * @var string
     */
    private $agreementNumber;
    /**
     * @var string
     */
    private $date;

    /**
     * @var string
     */
    private $differences;

    /**
     * @var ContractorTransfer|null
     */
    private $seller = null;
    /**
     * @var ContractorTransfer|null
     */
    private $client = null;
    /**
     * @var ContractorTransfer|null
     */
    private $creator = null;
    /**
     * @var ContractorTransfer|null
     */
    private $expert = null;

    /**
     * @return string
     */
    public function getDifferences(): string
    {
        return $this->differences;
    }

    /**
     * @param string $differences
     * @return SendNotificationTransfer
     */
    public function setDifferences(string $differences): SendNotificationTransfer
    {
        $this->differences = $differences;
        return $this;
    }

    /**
     * @return ContractorTransfer|null
     */
    public function getSeller(): ?ContractorTransfer
    {
        return $this->seller;
    }

    /**
     * @param ContractorTransfer|null $seller
     * @return SendNotificationTransfer
     */
    public function setSeller(?ContractorTransfer $seller): SendNotificationTransfer
    {
        $this->seller = $seller;
        return $this;
    }

    /**
     * @return ContractorTransfer|null
     */
    public function getClient(): ?ContractorTransfer
    {
        return $this->client;
    }

    /**
     * @param ContractorTransfer|null $client
     * @return SendNotificationTransfer
     */
    public function setClient(?ContractorTransfer $client): SendNotificationTransfer
    {
        $this->client = $client;
        return $this;
    }

    /**
     * @return ContractorTransfer|null
     */
    public function getCreator(): ?ContractorTransfer
    {
        return $this->creator;
    }

    /**
     * @param ContractorTransfer|null $creator
     * @return SendNotificationTransfer
     */
    public function setCreator(?ContractorTransfer $creator): SendNotificationTransfer
    {
        $this->creator = $creator;
        return $this;
    }

    /**
     * @return ContractorTransfer|null
     */
    public function getExpert(): ?ContractorTransfer
    {
        return $this->expert;
    }

    /**
     * @param ContractorTransfer|null $expert
     * @return SendNotificationTransfer
     */
    public function setExpert(?ContractorTransfer $expert): SendNotificationTransfer
    {
        $this->expert = $expert;
        return $this;
    }

    /**
     * @return int
     */
    public function getResellerId(): int
    {
        return $this->resellerId;
    }

    /**
     * @param int $resellerId
     * @return SendNotificationTransfer
     */
    public function setResellerId(int $resellerId): SendNotificationTransfer
    {
        $this->resellerId = $resellerId;
        return $this;
    }

    /**
     * @return int
     */
    public function getNotificationType(): int
    {
        return $this->notificationType;
    }

    /**
     * @param int $notificationType
     * @return SendNotificationTransfer
     */
    public function setNotificationType(int $notificationType): SendNotificationTransfer
    {
        $this->notificationType = $notificationType;
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
     * @return int
     */
    public function getCreatorId(): int
    {
        return $this->creatorId;
    }

    /**
     * @param int $creatorId
     * @return SendNotificationTransfer
     */
    public function setCreatorId(int $creatorId): SendNotificationTransfer
    {
        $this->creatorId = $creatorId;
        return $this;
    }

    /**
     * @return int
     */
    public function getExpertId(): int
    {
        return $this->expertId;
    }

    /**
     * @param int $expertId
     * @return SendNotificationTransfer
     */
    public function setExpertId(int $expertId): SendNotificationTransfer
    {
        $this->expertId = $expertId;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getDifferencesFrom(): ?int
    {
        return $this->differencesFrom;
    }

    /**
     * @param ?int $differencesFrom
     * @return SendNotificationTransfer
     */
    public function setDifferencesFrom(?int $differencesFrom): SendNotificationTransfer
    {
        $this->differencesFrom = $differencesFrom;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getDifferencesTo(): ?int
    {
        return $this->differencesTo;
    }

    /**
     * @param ?int $differencesTo
     * @return SendNotificationTransfer
     */
    public function setDifferencesTo(?int $differencesTo): SendNotificationTransfer
    {
        $this->differencesTo = $differencesTo;
        return $this;
    }

    /**
     * @return int
     */
    public function getComplaintId(): int
    {
        return $this->complaintId;
    }

    /**
     * @param int $complaintId
     * @return SendNotificationTransfer
     */
    public function setComplaintId(int $complaintId): SendNotificationTransfer
    {
        $this->complaintId = $complaintId;
        return $this;
    }

    /**
     * @return string
     */
    public function getComplaintNumber(): string
    {
        return $this->complaintNumber;
    }

    /**
     * @param string $complaintNumber
     * @return SendNotificationTransfer
     */
    public function setComplaintNumber(string $complaintNumber): SendNotificationTransfer
    {
        $this->complaintNumber = $complaintNumber;
        return $this;
    }

    /**
     * @return int
     */
    public function getConsumptionId(): int
    {
        return $this->consumptionId;
    }

    /**
     * @param int $consumptionId
     * @return SendNotificationTransfer
     */
    public function setConsumptionId(int $consumptionId): SendNotificationTransfer
    {
        $this->consumptionId = $consumptionId;
        return $this;
    }

    /**
     * @return string
     */
    public function getConsumptionNumber(): string
    {
        return $this->consumptionNumber;
    }

    /**
     * @param string $consumptionNumber
     * @return SendNotificationTransfer
     */
    public function setConsumptionNumber(string $consumptionNumber): SendNotificationTransfer
    {
        $this->consumptionNumber = $consumptionNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getAgreementNumber(): string
    {
        return $this->agreementNumber;
    }

    /**
     * @param string $agreementNumber
     * @return SendNotificationTransfer
     */
    public function setAgreementNumber(string $agreementNumber): SendNotificationTransfer
    {
        $this->agreementNumber = $agreementNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * @param string $date
     * @return SendNotificationTransfer
     */
    public function setDate(string $date): SendNotificationTransfer
    {
        $this->date = $date;
        return $this;
    }
}