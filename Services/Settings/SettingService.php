<?php declare(strict_types=1);

namespace NW\WebService\References\Services\Settings;

class SettingService implements SettingServiceInterface
{

    public function getResellerEmailFrom(): string
    {
        return 'contractor@example.com';
    }

    public function getEmailsByPermit(int $resellerId, string $event): array
    {
        return ['someemeil@example.com', 'someemeil2@example.com'];
    }
}