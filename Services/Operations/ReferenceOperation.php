<?php declare(strict_types=1);

namespace NW\WebService\References\Services\Operations;

use NW\WebService\References\Services\Operations\DataTransfers\OperationResultTransfer;

interface ReferenceOperation
{
    public function handle(): OperationResultTransfer;
}