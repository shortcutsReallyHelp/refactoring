<?php declare(strict_types=1);

namespace NW\WebService\References\Services\Contractor;


use NW\WebService\References\Services\Contractor\DataTransfers\ContractorTransfer;

interface ContractorServiceInterface
{
    public function getById(int $id): ?ContractorTransfer;
    public function getByClientIdAndSellerId(int $clientId, int $sellerId): ?ContractorTransfer;
}