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
 * @extends Enum<string>
 */
final class OrganizationStateStatus extends Enum
{
    private const ACTIVE = 'ACTIVE';

    private const LIQUIDATING = 'LIQUIDATING';

    private const LIQUIDATED = 'LIQUIDATED';

    private const BANKRUPT = 'BANKRUPT';

    private const REORGANIZING = 'REORGANIZING';

    public static function active(): self
    {
        return new self(self::ACTIVE);
    }

    public static function liquidating(): self
    {
        return new self(self::LIQUIDATING);
    }

    public static function liquidated(): self
    {
        return new self(self::LIQUIDATED);
    }

    public static function bankrupt(): self
    {
        return new self(self::BANKRUPT);
    }

    public static function reorganizing(): self
    {
        return new self(self::REORGANIZING);
    }
}
