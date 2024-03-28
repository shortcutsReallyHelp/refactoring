<?php declare(strict_types=1);

namespace NW\WebService\References\Services\ContractorMessages\DataTransfers;

class MessageDataTransfer
{
    /**
     * @var string
     */
    private $emailFrom;
    /**
     * @var string
     */
    private $emailTo;
    /**
     * @var string
     */
    private $subject;
    /**
     * @var string
     */
    private $message;

    /**
     * @return string
     */
    public function getEmailFrom(): string
    {
        return $this->emailFrom;
    }

    /**
     * @param string $emailFrom
     * @return MessageDataTransfer
     */
    public function setEmailFrom(string $emailFrom): MessageDataTransfer
    {
        $this->emailFrom = $emailFrom;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmailTo(): string
    {
        return $this->emailTo;
    }

    /**
     * @param string $emailTo
     * @return MessageDataTransfer
     */
    public function setEmailTo(string $emailTo): MessageDataTransfer
    {
        $this->emailTo = $emailTo;
        return $this;
    }

    /**
     * @return string
     */
    public function getSubject(): string
    {
        return $this->subject;
    }

    /**
     * @param string $subject
     * @return MessageDataTransfer
     */
    public function setSubject(string $subject): MessageDataTransfer
    {
        $this->subject = $subject;
        return $this;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param string $message
     * @return MessageDataTransfer
     */
    public function setMessage(string $message): MessageDataTransfer
    {
        $this->message = $message;
        return $this;
    }
}