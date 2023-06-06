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
 * @extends Enum<non-empty-string>
 */
final class CapitalMarker extends Enum
{
    private const UNKNOWN = '0';

    private const DISTRICT_CENTER = '1';
    private const REGION_CENTER   = '2';

    private const REGION_DISTRICT_CENTER = '3';

    private const REGION_DISTRICT_REGION = '4';

    public static function unknown(): self
    {
        return new self(self::UNKNOWN);
    }

    public static function districtCenter(): self
    {
        return new self(self::DISTRICT_CENTER);
    }

    public static function regionCenter(): self
    {
        return new self(self::REGION_CENTER);
    }

    public static function regionDistrictCenter(): self
    {
        return new self(self::REGION_CENTER);
    }

    public static function regionDistrictRegion(): self
    {
        return new self(self::REGION_DISTRICT_REGION);
    }
}
