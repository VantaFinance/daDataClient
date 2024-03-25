<?php
/**
 * DaData Client
 *
 * @author Valentin Nazarov <v.nazarov@pos-credit.ru>
 * @copyright Copyright (c) 2024, The Vanta
 */

declare(strict_types=1);

namespace Vanta\Integration\DaData\Response;

use Brick\PhoneNumber\PhoneNumber;

final class Organization
{
    /**
     * @var non-empty-string
     */
    private string $hid;

    private OrganizationType $type;

    private OrganizationName $name;

    private OrganizationOpf $opf;

    private OrganizationState $state;

    private ?OrganizationBranchType $branchType;

    private ?int $branchCount;

    /**
     * @var ?numeric-string
     */
    private ?string $kpp;

    /**
     * @var numeric-string
     */
    private string $inn;

    /**
     * @var numeric-string
     */
    private string $ogrn;

    /**
     * @var numeric-string
     */
    private string $okpo;

    /**
     * @var numeric-string
     */
    private string $okato;

    /**
     * @var numeric-string
     */
    private string $oktmo;

    /**
     * @var numeric-string
     */
    private string $okogu;

    /**
     * @var numeric-string
     */
    private string $okfs;

    /**
     * @var non-empty-string
     */
    private string $okved;

    private SuggestAddress $address;

    /**
     * @var list<PhoneNumber>
     */
    private array $phones;

    private ?bool $invalid;

    /**
     * @param non-empty-string   $hid
     * @param ?numeric-string    $kpp
     * @param numeric-string     $inn
     * @param numeric-string     $ogrn
     * @param numeric-string     $okpo
     * @param numeric-string     $okato
     * @param numeric-string     $oktmo
     * @param numeric-string     $okogu
     * @param numeric-string     $okfs
     * @param non-empty-string   $okved
     * @param ?list<PhoneNumber> $phones
     */
    public function __construct(
        string $hid,
        OrganizationType $type,
        OrganizationName $name,
        OrganizationOpf $opf,
        OrganizationState $state,
        ?OrganizationBranchType $branchType,
        ?int $branchCount,
        ?string $kpp,
        string $inn,
        string $ogrn,
        string $okpo,
        string $okato,
        string $oktmo,
        string $okogu,
        string $okfs,
        string $okved,
        SuggestAddress $address,
        ?bool $invalid,
        ?array $phones
    ) {
        $this->hid         = $hid;
        $this->type        = $type;
        $this->name        = $name;
        $this->opf         = $opf;
        $this->state       = $state;
        $this->branchType  = $branchType;
        $this->branchCount = $branchCount;
        $this->kpp         = $kpp;
        $this->inn         = $inn;
        $this->ogrn        = $ogrn;
        $this->okpo        = $okpo;
        $this->okato       = $okato;
        $this->oktmo       = $oktmo;
        $this->okogu       = $okogu;
        $this->okfs        = $okfs;
        $this->okved       = $okved;
        $this->address     = $address;
        $this->phones      = $phones ?? [];
        $this->invalid     = $invalid;
    }

    /**
     * @return non-empty-string
     */
    public function getHid(): string
    {
        return $this->hid;
    }

    public function getType(): OrganizationType
    {
        return $this->type;
    }

    public function getName(): OrganizationName
    {
        return $this->name;
    }

    public function getOpf(): OrganizationOpf
    {
        return $this->opf;
    }

    public function getState(): OrganizationState
    {
        return $this->state;
    }

    public function getBranchType(): ?OrganizationBranchType
    {
        return $this->branchType;
    }

    public function getBranchCount(): ?int
    {
        return $this->branchCount;
    }

    /**
     * @return ?numeric-string
     */
    public function getKpp(): ?string
    {
        return $this->kpp;
    }

    /**
     * @return numeric-string
     */
    public function getInn(): string
    {
        return $this->inn;
    }

    /**
     * @return numeric-string
     */
    public function getOgrn(): string
    {
        return $this->ogrn;
    }

    /**
     * @return numeric-string
     */
    public function getOkpo(): string
    {
        return $this->okpo;
    }

    /**
     * @return numeric-string
     */
    public function getOkato(): string
    {
        return $this->okato;
    }

    /**
     * @return numeric-string
     */
    public function getOktmo(): string
    {
        return $this->oktmo;
    }

    /**
     * @return numeric-string
     */
    public function getOkogu(): string
    {
        return $this->okogu;
    }

    /**
     * @return numeric-string
     */
    public function getOkfs(): string
    {
        return $this->okfs;
    }

    /**
     * @return non-empty-string
     */
    public function getOkved(): string
    {
        return $this->okved;
    }

    public function getAddress(): SuggestAddress
    {
        return $this->address;
    }

    public function getInvalid(): ?bool
    {
        return $this->invalid;
    }

    /**
     * @return list<PhoneNumber>
     */
    public function getPhones(): array
    {
        return $this->phones;
    }
}
