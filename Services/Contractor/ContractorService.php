<?php declare(strict_types=1);

namespace NW\WebService\References\Services\Contractor;

use NW\WebService\References\Services\Contractor\DataTransfers\ContractorTransfer;
use NW\WebService\References\Services\Contractor\Enums\ContractorType;

class ContractorService implements ContractorServiceInterface
{

    public function getById(int $id): ?ContractorTransfer
    {
        return [
            null,
            null,
            (new ContractorTransfer())->setId(2)->setName('Name 2')->setType(ContractorType::TYPE_CUSTOMER)->setEmail('aaa@aa.aa'),
            (new ContractorTransfer())->setId(3)->setName('Name 3')->setType(ContractorType::TYPE_CREATOR)->setEmail('aaa@aa.aa'),
            (new ContractorTransfer())->setId(4)->setName('Name 4')->setType(ContractorType::TYPE_EXPERT)->setEmail('aaa@aa.aa'),
            (new ContractorTransfer())->setId(5)->setName('Name 5')->setType(ContractorType::TYPE_SELLER)->setEmail('aaa@aa.aa'),
        ][$id];
    }

    public function getByClientIdAndSellerId(int $clientId, int $sellerId): ?ContractorTransfer
    {
        return (new ContractorTransfer())->setId(2)->setName('Name 2')->setType(ContractorType::TYPE_CUSTOMER)->setEmail('aaa@aa.aa');
    }
}