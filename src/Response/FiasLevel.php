<?php

/**
 * DaData Client
 *
 * @author Vlad Shashkov <v.shashkov@pos-credit.ru>
 * @copyright Copyright (c) 2023, The Vanta
 */

declare(strict_types=1);

namespace Vanta\Integration\DaData\Response;

use MyCLabs\Enum\Enum;

/**
 * @psalm-immutable
 *
 * @extends Enum<numeric-string>
 */
final class FiasLevel extends Enum
{
    private const COUNTRY = '0';
    private const REGION  = '1';

    private const AREA = '3';

    private const CITY = '4';

    private const DISTRICT_CITY = '5';

    private const LOCALITY = '6';

    private const STREET = '7';

    private const HOME = '8';

    private const APARTMENT_OR_ROOM = '9';

    private const PLANNING_STRUCTURE = '65';

    private const LAND_PLOT = '75';

    private const ADDITIONAL_TERRITORY = '90';

    private const STREET_IN_ADDITIONAL_TERRITORY = '91';

    private const FOREIGN_OR_BLANK = '-1';

    public static function country(): self
    {
        return new self(self::COUNTRY);
    }

    public static function region(): self
    {
        return new self(self::REGION);
    }

    public static function area(): self
    {
        return new self(self::AREA);
    }

    public static function city(): self
    {
        return new self(self::CITY);
    }

    public static function districtCity(): self
    {
        return new self(self::DISTRICT_CITY);
    }

    public static function locality(): self
    {
        return new self(self::LOCALITY);
    }

    public static function street(): self
    {
        return new self(self::STREET);
    }

    public static function home(): self
    {
        return new self(self::HOME);
    }

    public static function apartmentOrRoom(): self
    {
        return new self(self::APARTMENT_OR_ROOM);
    }

    public static function planningStructure(): self
    {
        return new self(self::PLANNING_STRUCTURE);
    }

    public static function landPlot(): self
    {
        return new self(self::LAND_PLOT);
    }

    public static function additionalTerritory(): self
    {
        return new self(self::ADDITIONAL_TERRITORY);
    }

    public static function streetInAdditionalTerritory(): self
    {
        return new self(self::STREET_IN_ADDITIONAL_TERRITORY);
    }

    public static function foreignOrBlank(): self
    {
        return new self(self::FOREIGN_OR_BLANK);
    }
}
