<?php
/**
 * DaData Client
 *
 * @author Valentin Nazarov <v.nazarov@pos-credit.ru>
 * @copyright Copyright (c) 2024, The Vanta
 */

declare(strict_types=1);

namespace Vanta\Integration\DaData\Response;

use MyCLabs\Enum\Enum;

/**
 * @psalm-immutable
 *
 * @extends Enum<non-empty-string>
 */
final class OrganizationType extends Enum
{
    private const INDIVIDUAL = 'INDIVIDUAL';

    private const LEGAL = 'LEGAL';

    public static function individual(): self
    {
        return new self(self::INDIVIDUAL);
    }

    public static function legal(): self
    {
        return new self(self::LEGAL);
    }
}
