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
     * @param non-empty-string $hid
     * @param ?numeric-string $kpp
     * @param numeric-string $inn
     * @param numeric-string $ogrn
     * @param numeric-string $okpo
     * @param numeric-string $okato
     * @param numeric-string $oktmo
     * @param numeric-string $okogu
     * @param numeric-string $okfs
     * @param non-empty-string $okved
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

    public function getPhones(): array
    {
        return $this->phones;
    }
}
