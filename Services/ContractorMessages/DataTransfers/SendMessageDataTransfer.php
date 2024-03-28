<?php declare(strict_types=1);

namespace NW\WebService\References\Services\ContractorMessages\DataTransfers;

class SendMessageDataTransfer
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
     * @var MessageDataTransfer[]
     */
    private $messages;

    /**
     * @return int
     */
    public function getRessellerId(): int
    {
        return $this->ressellerId;
    }

    /**
     * @param int $ressellerId
     * @return SendMessageDataTransfer
     */
    public function setRessellerId(int $ressellerId): SendMessageDataTransfer
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
     * @return SendMessageDataTransfer
     */
    public function setClientId(int $clientId): SendMessageDataTransfer
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
     * @return SendMessageDataTransfer
     */
    public function setEventStatus(string $eventStatus): SendMessageDataTransfer
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
     * @return SendMessageDataTransfer
     */
    public function setDifferencesTo(int $differencesTo): SendMessageDataTransfer
    {
        $this->differencesTo = $differencesTo;
        return $this;
    }

    /**
     * @return MessageDataTransfer[]
     */
    public function getMessages(): array
    {
        return $this->messages;
    }

    /**
     * @param MessageDataTransfer[] $messages
     * @return SendMessageDataTransfer
     */
    public function setMessages(array $messages): SendMessageDataTransfer
    {
        $this->messages = $messages;
        return $this;
    }
}