<?php declare(strict_types=1);

namespace NW\WebService\References\Services\Operations\Enums;

class Status
{
    public const COMPLETED = 0;
    public const PENDING = 1;
    public const REJECTED = 2;

    public const NAMES = [
        self::COMPLETED => 'Completed',
        self::PENDING => 'Pending',
        self::REJECTED => 'Rejected',
    ];

    public static function getName(int $id): string
    {
        return self::NAMES[$id];
    }
}