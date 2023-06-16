<?php

/**
 * DaData Client
 *
 * @author Vlad Shashkov <v.shashkov@pos-credit.ru>
 * @copyright Copyright (c) 2023, The Vanta
 */

declare(strict_types=1);

namespace Vanta\Integration\DaData\Response;

use Money\Money;
use Symfony\Component\Uid\AbstractUid as Uid;

/**
 * @psalm-immutable
 */
final class Address
{
    /**
     * @var numeric-string|null
     */
    private ?string $postalCode;

    /**
     * @var non-empty-string|null
     */
    private ?string $federalDistrict;

    private ?RegionIso $regionIsoCode;

    /**
     * @var non-empty-string|null
     */
    private ?string $cityArea;

    /**
     * @var non-empty-string|null
     */
    private ?string $flatArea;

    private ?Money $squareMeterPrice;

    private ?Money $flatPrice;

    /**
     * @var numeric-string|null
     */
    private ?string $postalBox;

    /**
     * @var numeric-string|null
     */
    private ?string $geonameId;

    /**
     * @var non-empty-string|null
     */
    private ?string $timezone;

    private ?BeltwayHit $beltwayHit;

    /**
     * @var numeric-string|null
     */
    private ?string $beltwayDistance;

    private ?QcGeo $qcGeo;

    /**
     * @var non-empty-string|null
     */
    private ?string $country;

    private ?CountryIso $countryIsoCode;

    private ?Uid $flatFiasId;

    private ?Uid $houseFiasId;

    private ?Uid $cityDistrictFiasId;

    private ?Uid $settlementFiasId;

    private ?Uid $areaFiasId;

    private ?Uid $regionFiasId;

    private ?Uid $cityFiasId;

    private ?Uid $fiasId;

    private ?Uid $streetFiasId;

    /**
     * @var non-empty-string|null
     */
    private ?string $flatType;

    /**
     * @var non-empty-string|null
     */
    private ?string $flatTypeFull;

    /**
     * @var numeric-string|null
     */
    private ?string $flat;

    /**
     * @var non-empty-string|null
     */
    private ?string $blockType;

    /**
     * @var non-empty-string|null
     */
    private ?string $blockTypeFull;

    /**
     * @var non-empty-string|null
     */
    private ?string $block;

    /**
     * @var non-empty-string|null
     */
    private ?string $houseType;

    /**
     * @var non-empty-string|null
     */
    private ?string $houseTypeFull;

    /**
     * @var non-empty-string|null
     */
    private ?string $house;

    /**
     * @var non-empty-string|null
     */
    private ?string $settlementWithType;

    /**
     * @var non-empty-string|null
     */
    private ?string $settlementType;

    /**
     * @var non-empty-string|null
     */
    private ?string $settlementTypeFull;

    /**
     * @var non-empty-string|null
     */
    private ?string $settlement;

    /**
     * @var non-empty-string|null
     */
    private ?string $areaWithType;

    /**
     * @var non-empty-string|null
     */
    private ?string $areaType;

    /**
     * @var non-empty-string|null
     */
    private ?string $areaTypeFull;

    /**
     * @var non-empty-string|null
     */
    private ?string $area;

    /**
     * @var non-empty-string|null
     */
    private ?string $cityDistrictWithType;

    /**
     * @var non-empty-string|null
     */
    private ?string $cityDistrictType;

    /**
     * @var non-empty-string|null
     */
    private ?string $cityDistrictTypeFull;

    /**
     * @var non-empty-string|null
     */
    private ?string $cityDistrict;

    /**
     * @var non-empty-string|null
     */
    private ?string $cityWithType;

    /**
     * @var non-empty-string|null
     */
    private ?string $cityType;

    /**
     * @var non-empty-string|null
     */
    private ?string $cityTypeFull;

    /**
     * @var non-empty-string|null
     */
    private ?string $city;

    /**
     * @var non-empty-string|null
     */
    private ?string $streetType;

    /**
     * @var non-empty-string|null
     */
    private ?string $streetTypeFull;

    /**
     * @var non-empty-string|null
     */
    private ?string $street;

    /**
     * @var non-empty-string|null
     */
    private ?string $streetWithType;

    /**
     * @var non-empty-string|null
     */
    private ?string $regionType;

    /**
     * @var non-empty-string|null
     */
    private ?string $regionTypeFull;

    /**
     * @var non-empty-string|null
     */
    private ?string $region;

    /**
     * @var non-empty-string|null
     */
    private ?string $regionWithType;

    /**
     * @var numeric-string|null
     */
    private ?string $taxOfficeLegal;

    /**
     * @var numeric-string|null
     */
    private ?string $taxOffice;

    /**
     * @var numeric-string|null
     */
    private ?string $okato;

    /**
     * @var numeric-string|null
     */
    private ?string $oktmo;

    /**
     * @var numeric-string|null
     */
    private ?string $regionKladrId;

    /**
     * @var numeric-string|null
     */
    private ?string $houseKladrId;

    /**
     * @var numeric-string|null
     */
    private ?string $streetKladrId;

    /**
     * @var numeric-string|null
     */
    private ?string $cityKladrId;

    /**
     * @var numeric-string|null
     */
    private ?string $settlementKladrId;

    /**
     * @var numeric-string|null
     */
    private ?string $areaKladrId;

    /**
     * @var numeric-string|null
     */
    private ?string $cityDistrictKladrId;

    /**
     * @var numeric-string|null
     */
    private ?string $kladrId;

    private ?CapitalMarker $capitalMarker;

    /**
     * @var numeric-string|null
     */
    private ?string $fiasCode;

    private ?FiasLevel $fiasLevel;

    private ?FiasActualityState $fiasActualityState;

    /**
     * @var numeric-string|null
     */
    private ?string $geoLat;

    /**
     * @var numeric-string|null
     */
    private ?string $geoLon;

    /**
     * @var array<int, Metro>
     */
    private iterable $metro;

    /**
     * @var array<int,non-empty-string>
     */
    private array $historyValues;

    /**
     * @param numeric-string|null          $postalCode
     * @param non-empty-string|null        $federalDistrict
     * @param non-empty-string|null        $cityArea
     * @param non-empty-string|null        $flatArea
     * @param numeric-string|null          $postalBox
     * @param numeric-string|null          $geonameId
     * @param non-empty-string|null        $timezone
     * @param numeric-string|null          $beltwayDistance
     * @param non-empty-string|null        $country
     * @param non-empty-string|null        $flatType
     * @param non-empty-string|null        $flatTypeFull
     * @param numeric-string|null          $flat
     * @param non-empty-string|null        $blockType
     * @param non-empty-string|null        $blockTypeFull
     * @param non-empty-string|null        $block
     * @param non-empty-string|null        $houseType
     * @param non-empty-string|null        $houseTypeFull
     * @param non-empty-string|null        $house
     * @param non-empty-string|null        $settlementWithType
     * @param non-empty-string|null        $settlementType
     * @param non-empty-string|null        $settlementTypeFull
     * @param non-empty-string|null        $settlement
     * @param non-empty-string|null        $areaWithType
     * @param non-empty-string|null        $areaType
     * @param non-empty-string|null        $areaTypeFull
     * @param non-empty-string|null        $area
     * @param non-empty-string|null        $cityDistrictWithType
     * @param non-empty-string|null        $cityDistrictType
     * @param non-empty-string|null        $cityDistrictTypeFull
     * @param non-empty-string|null        $cityDistrict
     * @param non-empty-string|null        $cityWithType
     * @param non-empty-string|null        $cityType
     * @param non-empty-string|null        $cityTypeFull
     * @param non-empty-string|null        $city
     * @param non-empty-string|null        $streetType
     * @param non-empty-string|null        $streetTypeFull
     * @param non-empty-string|null        $street
     * @param non-empty-string|null        $streetWithType
     * @param non-empty-string|null        $regionType
     * @param non-empty-string|null        $regionTypeFull
     * @param non-empty-string|null        $region
     * @param non-empty-string|null        $regionWithType
     * @param numeric-string|null          $taxOfficeLegal
     * @param numeric-string|null          $taxOffice
     * @param numeric-string|null          $okato
     * @param numeric-string|null          $oktmo
     * @param numeric-string|null          $regionKladrId
     * @param numeric-string|null          $houseKladrId
     * @param numeric-string|null          $streetKladrId
     * @param numeric-string|null          $cityKladrId
     * @param numeric-string|null          $settlementKladrId
     * @param numeric-string|null          $areaKladrId
     * @param numeric-string|null          $cityDistrictKladrId
     * @param numeric-string|null          $kladrId
     * @param numeric-string|null          $fiasCode
     * @param numeric-string|null          $geoLat
     * @param numeric-string|null          $geoLon
     * @param array<int, Metro>            $metro
     * @param array<int, non-empty-string> $historyValues
     */
    public function __construct(
        ?string $postalCode,
        ?string $federalDistrict,
        ?RegionIso $regionIsoCode,
        ?string $cityArea,
        ?string $flatArea,
        ?Money $squareMeterPrice,
        ?Money $flatPrice,
        ?string $postalBox,
        ?string $geonameId,
        ?string $timezone,
        ?BeltwayHit $beltwayHit,
        ?string $beltwayDistance,
        ?QcGeo $qcGeo,
        ?string $country,
        ?CountryIso $countryIsoCode,
        ?Uid $flatFiasId,
        ?Uid $houseFiasId,
        ?Uid $cityDistrictFiasId,
        ?Uid $settlementFiasId,
        ?Uid $areaFiasId,
        ?Uid $regionFiasId,
        ?Uid $cityFiasId,
        ?Uid $fiasId,
        ?Uid $streetFiasId,
        ?string $flatType,
        ?string $flatTypeFull,
        ?string $flat,
        ?string $blockType,
        ?string $blockTypeFull,
        ?string $block,
        ?string $houseType,
        ?string $houseTypeFull,
        ?string $house,
        ?string $settlementWithType,
        ?string $settlementType,
        ?string $settlementTypeFull,
        ?string $settlement,
        ?string $areaWithType,
        ?string $areaType,
        ?string $areaTypeFull,
        ?string $area,
        ?string $cityDistrictWithType,
        ?string $cityDistrictType,
        ?string $cityDistrictTypeFull,
        ?string $cityDistrict,
        ?string $cityWithType,
        ?string $cityType,
        ?string $cityTypeFull,
        ?string $city,
        ?string $streetType,
        ?string $streetTypeFull,
        ?string $street,
        ?string $streetWithType,
        ?string $regionType,
        ?string $regionTypeFull,
        ?string $region,
        ?string $regionWithType,
        ?string $taxOfficeLegal,
        ?string $taxOffice,
        ?string $okato,
        ?string $oktmo,
        ?string $regionKladrId,
        ?string $houseKladrId,
        ?string $streetKladrId,
        ?string $cityKladrId,
        ?string $settlementKladrId,
        ?string $areaKladrId,
        ?string $cityDistrictKladrId,
        ?string $kladrId,
        ?CapitalMarker $capitalMarker,
        ?string $fiasCode,
        ?FiasLevel $fiasLevel,
        ?FiasActualityState $fiasActualityState,
        ?string $geoLat,
        ?string $geoLon,
        ?array $metro = [],
        ?array $historyValues = []
    ) {
        $this->postalCode           = $postalCode;
        $this->federalDistrict      = $federalDistrict;
        $this->regionIsoCode        = $regionIsoCode;
        $this->cityArea             = $cityArea;
        $this->flatArea             = $flatArea;
        $this->squareMeterPrice     = $squareMeterPrice;
        $this->flatPrice            = $flatPrice;
        $this->postalBox            = $postalBox;
        $this->geonameId            = $geonameId;
        $this->timezone             = $timezone;
        $this->beltwayHit           = $beltwayHit;
        $this->beltwayDistance      = $beltwayDistance;
        $this->qcGeo                = $qcGeo;
        $this->country              = $country;
        $this->countryIsoCode       = $countryIsoCode;
        $this->flatFiasId           = $flatFiasId;
        $this->houseFiasId          = $houseFiasId;
        $this->cityDistrictFiasId   = $cityDistrictFiasId;
        $this->settlementFiasId     = $settlementFiasId;
        $this->areaFiasId           = $areaFiasId;
        $this->regionFiasId         = $regionFiasId;
        $this->cityFiasId           = $cityFiasId;
        $this->fiasId               = $fiasId;
        $this->streetFiasId         = $streetFiasId;
        $this->flatType             = $flatType;
        $this->flatTypeFull         = $flatTypeFull;
        $this->flat                 = $flat;
        $this->blockType            = $blockType;
        $this->blockTypeFull        = $blockTypeFull;
        $this->block                = $block;
        $this->houseType            = $houseType;
        $this->houseTypeFull        = $houseTypeFull;
        $this->house                = $house;
        $this->settlementWithType   = $settlementWithType;
        $this->settlementType       = $settlementType;
        $this->settlementTypeFull   = $settlementTypeFull;
        $this->settlement           = $settlement;
        $this->areaWithType         = $areaWithType;
        $this->areaType             = $areaType;
        $this->areaTypeFull         = $areaTypeFull;
        $this->area                 = $area;
        $this->cityDistrictWithType = $cityDistrictWithType;
        $this->cityDistrictType     = $cityDistrictType;
        $this->cityDistrictTypeFull = $cityDistrictTypeFull;
        $this->cityDistrict         = $cityDistrict;
        $this->cityWithType         = $cityWithType;
        $this->cityType             = $cityType;
        $this->cityTypeFull         = $cityTypeFull;
        $this->city                 = $city;
        $this->streetType           = $streetType;
        $this->streetTypeFull       = $streetTypeFull;
        $this->street               = $street;
        $this->streetWithType       = $streetWithType;
        $this->regionType           = $regionType;
        $this->regionTypeFull       = $regionTypeFull;
        $this->region               = $region;
        $this->regionWithType       = $regionWithType;
        $this->taxOfficeLegal       = $taxOfficeLegal;
        $this->taxOffice            = $taxOffice;
        $this->okato                = $okato;
        $this->oktmo                = $oktmo;
        $this->regionKladrId        = $regionKladrId;
        $this->houseKladrId         = $houseKladrId;
        $this->streetKladrId        = $streetKladrId;
        $this->cityKladrId          = $cityKladrId;
        $this->settlementKladrId    = $settlementKladrId;
        $this->areaKladrId          = $areaKladrId;
        $this->cityDistrictKladrId  = $cityDistrictKladrId;
        $this->kladrId              = $kladrId;
        $this->capitalMarker        = $capitalMarker;
        $this->fiasCode             = $fiasCode;
        $this->fiasLevel            = $fiasLevel;
        $this->fiasActualityState   = $fiasActualityState;
        $this->geoLat               = $geoLat;
        $this->geoLon               = $geoLon;
        $this->metro                = $metro ?? [];
        $this->historyValues        = $historyValues ?? [];
    }

    /**
     * @return numeric-string|null
     */
    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    /**
     * @return non-empty-string|null
     */
    public function getFederalDistrict(): ?string
    {
        return $this->federalDistrict;
    }

    public function getRegionIsoCode(): ?RegionIso
    {
        return $this->regionIsoCode;
    }

    /**
     * @return non-empty-string|null
     */
    public function getCityArea(): ?string
    {
        return $this->cityArea;
    }

    /**
     * @return non-empty-string|null
     */
    public function getFlatArea(): ?string
    {
        return $this->flatArea;
    }

    public function getSquareMeterPrice(): ?Money
    {
        return $this->squareMeterPrice;
    }

    public function getFlatPrice(): ?Money
    {
        return $this->flatPrice;
    }

    /**
     * @return numeric-string|null
     */
    public function getPostalBox(): ?string
    {
        return $this->postalBox;
    }

    /**
     * @return numeric-string|null
     */
    public function getGeonameId(): ?string
    {
        return $this->geonameId;
    }

    /**
     * @return non-empty-string|null
     */
    public function getTimezone(): ?string
    {
        return $this->timezone;
    }

    public function getBeltwayHit(): ?BeltwayHit
    {
        return $this->beltwayHit;
    }

    /**
     * @return numeric-string|null
     */
    public function getBeltwayDistance(): ?string
    {
        return $this->beltwayDistance;
    }

    public function getQcGeo(): ?QcGeo
    {
        return $this->qcGeo;
    }

    /**
     * @return non-empty-string|null
     */
    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function getCountryIsoCode(): ?CountryIso
    {
        return $this->countryIsoCode;
    }

    public function getFlatFiasId(): ?Uid
    {
        return $this->flatFiasId;
    }

    public function getHouseFiasId(): ?Uid
    {
        return $this->houseFiasId;
    }

    public function getCityDistrictFiasId(): ?Uid
    {
        return $this->cityDistrictFiasId;
    }

    public function getSettlementFiasId(): ?Uid
    {
        return $this->settlementFiasId;
    }

    public function getAreaFiasId(): ?Uid
    {
        return $this->areaFiasId;
    }

    public function getRegionFiasId(): ?Uid
    {
        return $this->regionFiasId;
    }

    public function getCityFiasId(): ?Uid
    {
        return $this->cityFiasId;
    }

    public function getFiasId(): ?Uid
    {
        return $this->fiasId;
    }

    public function getStreetFiasId(): ?Uid
    {
        return $this->streetFiasId;
    }

    /**
     * @return non-empty-string|null
     */
    public function getFlatType(): ?string
    {
        return $this->flatType;
    }

    /**
     * @return non-empty-string|null
     */
    public function getFlatTypeFull(): ?string
    {
        return $this->flatTypeFull;
    }

    /**
     * @return numeric-string|null
     */
    public function getFlat(): ?string
    {
        return $this->flat;
    }

    /**
     * @return non-empty-string|null
     */
    public function getBlockType(): ?string
    {
        return $this->blockType;
    }

    /**
     * @return non-empty-string|null
     */
    public function getBlockTypeFull(): ?string
    {
        return $this->blockTypeFull;
    }

    /**
     * @return non-empty-string|null
     */
    public function getBlock(): ?string
    {
        return $this->block;
    }

    /**
     * @return non-empty-string|null
     */
    public function getHouseType(): ?string
    {
        return $this->houseType;
    }

    /**
     * @return non-empty-string|null
     */
    public function getHouseTypeFull(): ?string
    {
        return $this->houseTypeFull;
    }

    /**
     * @return non-empty-string|null
     */
    public function getHouse(): ?string
    {
        return $this->house;
    }

    /**
     * @return non-empty-string|null
     */
    public function getSettlementWithType(): ?string
    {
        return $this->settlementWithType;
    }

    /**
     * @return non-empty-string|null
     */
    public function getSettlementType(): ?string
    {
        return $this->settlementType;
    }

    /**
     * @return non-empty-string|null
     */
    public function getSettlementTypeFull(): ?string
    {
        return $this->settlementTypeFull;
    }

    /**
     * @return non-empty-string|null
     */
    public function getSettlement(): ?string
    {
        return $this->settlement;
    }

    /**
     * @return non-empty-string|null
     */
    public function getAreaWithType(): ?string
    {
        return $this->areaWithType;
    }

    /**
     * @return non-empty-string|null
     */
    public function getAreaType(): ?string
    {
        return $this->areaType;
    }

    /**
     * @return non-empty-string|null
     */
    public function getAreaTypeFull(): ?string
    {
        return $this->areaTypeFull;
    }

    /**
     * @return non-empty-string|null
     */
    public function getArea(): ?string
    {
        return $this->area;
    }

    /**
     * @return non-empty-string|null
     */
    public function getCityDistrictWithType(): ?string
    {
        return $this->cityDistrictWithType;
    }

    /**
     * @return non-empty-string|null
     */
    public function getCityDistrictType(): ?string
    {
        return $this->cityDistrictType;
    }

    /**
     * @return non-empty-string|null
     */
    public function getCityDistrictTypeFull(): ?string
    {
        return $this->cityDistrictTypeFull;
    }

    /**
     * @return non-empty-string|null
     */
    public function getCityDistrict(): ?string
    {
        return $this->cityDistrict;
    }

    /**
     * @return non-empty-string|null
     */
    public function getCityWithType(): ?string
    {
        return $this->cityWithType;
    }

    /**
     * @return non-empty-string|null
     */
    public function getCityType(): ?string
    {
        return $this->cityType;
    }

    /**
     * @return non-empty-string|null
     */
    public function getCityTypeFull(): ?string
    {
        return $this->cityTypeFull;
    }

    /**
     * @return non-empty-string|null
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * @return non-empty-string|null
     */
    public function getStreetType(): ?string
    {
        return $this->streetType;
    }

    /**
     * @return non-empty-string|null
     */
    public function getStreetTypeFull(): ?string
    {
        return $this->streetTypeFull;
    }

    /**
     * @return non-empty-string|null
     */
    public function getStreet(): ?string
    {
        return $this->street;
    }

    /**
     * @return non-empty-string|null
     */
    public function getStreetWithType(): ?string
    {
        return $this->streetWithType;
    }

    /**
     * @return non-empty-string|null
     */
    public function getRegionType(): ?string
    {
        return $this->regionType;
    }

    /**
     * @return non-empty-string|null
     */
    public function getRegionTypeFull(): ?string
    {
        return $this->regionTypeFull;
    }

    /**
     * @return non-empty-string|null
     */
    public function getRegion(): ?string
    {
        return $this->region;
    }

    /**
     * @return non-empty-string|null
     */
    public function getRegionWithType(): ?string
    {
        return $this->regionWithType;
    }

    /**
     * @return numeric-string|null
     */
    public function getTaxOfficeLegal(): ?string
    {
        return $this->taxOfficeLegal;
    }

    /**
     * @return numeric-string|null
     */
    public function getTaxOffice(): ?string
    {
        return $this->taxOffice;
    }

    /**
     * @return numeric-string|null
     */
    public function getOkato(): ?string
    {
        return $this->okato;
    }

    /**
     * @return numeric-string|null
     */
    public function getOktmo(): ?string
    {
        return $this->oktmo;
    }

    /**
     * @return numeric-string|null
     */
    public function getRegionKladrId(): ?string
    {
        return $this->regionKladrId;
    }

    /**
     * @return numeric-string|null
     */
    public function getHouseKladrId(): ?string
    {
        return $this->houseKladrId;
    }

    /**
     * @return numeric-string|null
     */
    public function getStreetKladrId(): ?string
    {
        return $this->streetKladrId;
    }

    /**
     * @return numeric-string|null
     */
    public function getCityKladrId(): ?string
    {
        return $this->cityKladrId;
    }

    /**
     * @return numeric-string|null
     */
    public function getSettlementKladrId(): ?string
    {
        return $this->settlementKladrId;
    }

    /**
     * @return numeric-string|null
     */
    public function getAreaKladrId(): ?string
    {
        return $this->areaKladrId;
    }

    /**
     * @return numeric-string|null
     */
    public function getCityDistrictKladrId(): ?string
    {
        return $this->cityDistrictKladrId;
    }

    /**
     * @return numeric-string|null
     */
    public function getKladrId(): ?string
    {
        return $this->kladrId;
    }

    public function getCapitalMarker(): ?CapitalMarker
    {
        return $this->capitalMarker;
    }

    /**
     * @return numeric-string|null
     */
    public function getFiasCode(): ?string
    {
        return $this->fiasCode;
    }

    public function getFiasLevel(): ?FiasLevel
    {
        return $this->fiasLevel;
    }

    public function getFiasActualityState(): ?FiasActualityState
    {
        return $this->fiasActualityState;
    }

    /**
     * @return numeric-string|null
     */
    public function getGeoLat(): ?string
    {
        return $this->geoLat;
    }

    /**
     * @return numeric-string|null
     */
    public function getGeoLon(): ?string
    {
        return $this->geoLon;
    }

    /**
     * @return array<int,Metro>
     */
    public function getMetro(): array
    {
        return $this->metro;
    }

    /**
     * @return array<int, non-empty-string>
     */
    public function getHistoryValues(): array
    {
        return $this->historyValues;
    }
}
