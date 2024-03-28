<?php declare(strict_types=1);

namespace NW\WebService\References\Services\Operations\DataTransfers;

class SmsResultTransfer
{
    /**
     * @var bool
     */
    private $isSent = false;

    /**
     * @var string
     */
    private $message = '';

    /**
     * @return bool
     */
    public function isSent(): bool
    {
        return $this->isSent;
    }

    /**
     * @param bool $isSent
     * @return SmsResultTransfer
     */
    public function setIsSent(bool $isSent): SmsResultTransfer
    {
        $this->isSent = $isSent;
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
     * @return SmsResultTransfer
     */
    public function setMessage(string $message): SmsResultTransfer
    {
        $this->message = $message;
        return $this;
    }
}