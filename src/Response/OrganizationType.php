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
    /**
     * @var string
     */
    private const INDIVIDUAL = 'INDIVIDUAL';

    /**
     * @var string
     */
    private const LEGAL = 'LEGAL';

    /**
     * @var string
     */
    private const UNKNOWN = 'UNKNOWN';

    public static function individual(): self
    {
        return new self(self::INDIVIDUAL);
    }

    public static function legal(): self
    {
        return new self(self::LEGAL);
    }

    public static function unknown(): self
    {
        return new self(self::UNKNOWN);
    }
}
