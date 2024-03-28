<?php declare(strict_types=1);

namespace NW\WebService\References\Services\Settings;

interface SettingServiceInterface
{
    public function getResellerEmailFrom(): string;

    public function getEmailsByPermit(int $resellerId, string $event): array;
}