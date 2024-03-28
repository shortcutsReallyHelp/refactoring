<?php declare(strict_types=1);

namespace NW\WebService\References\Services\Contractor\DataTransfers;

class ContractorTransfer
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $type;

    /**
     * @var string
     */
    private $name;

    /**
     * @var ?string
     */
    private $email;

    /**
     * @var bool
     */
    private $hasMobile = true;

    /**
     * @return bool
     */
    public function hasMobile(): bool
    {
        return $this->hasMobile;
    }

    /**
     * @param bool $hasMobile
     * @return ContractorTransfer
     */
    public function setHasMobile(bool $hasMobile): ContractorTransfer
    {
        $this->hasMobile = $hasMobile;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     * @return ContractorTransfer
     */
    public function setEmail(?string $email): ContractorTransfer
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return ContractorTransfer
     */
    public function setId(int $id): ContractorTransfer
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getType(): int
    {
        return $this->type;
    }

    /**
     * @param int $type
     * @return ContractorTransfer
     */
    public function setType(int $type): ContractorTransfer
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return ContractorTransfer
     */
    public function setName(string $name): ContractorTransfer
    {
        $this->name = $name;
        return $this;
    }

    public function getFullName(): string
    {
        return $this->name . ' ' . $this->id;
    }
}