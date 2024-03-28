<?php declare(strict_types=1);

namespace NW\WebService\References\Services\ContractorMessages;

use NW\WebService\References\Services\ContractorMessages\DataTransfers\SendMessageDataTransfer;

interface ContractorMessagesServiceInterface
{
    public function send(SendMessageDataTransfer $sendMessageDataTransfer): void;
}