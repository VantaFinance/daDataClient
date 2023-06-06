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
final class QcGeo extends Enum
{
    private const EXACT_COORDINATES = '0';
    private const NEAREST_HOUSE     = '1';

    private const STREET = '2';

    private const LOCALITY = '3';

    private const CITY = '4';

    private const COORDINATES_NOT_DEFINED = '5';

    public static function exactCoordinates(): self
    {
        return new self(self::EXACT_COORDINATES);
    }

    public static function nearestHouse(): self
    {
        return new self(self::NEAREST_HOUSE);
    }

    public static function street(): self
    {
        return new self(self::STREET);
    }

    public static function locality(): self
    {
        return new self(self::LOCALITY);
    }

    public static function city(): self
    {
        return new self(self::CITY);
    }

    public static function coordinatesNotDefined(): self
    {
        return new self(self::COORDINATES_NOT_DEFINED);
    }
}
