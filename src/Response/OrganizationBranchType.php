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
final class OrganizationBranchType extends Enum
{
    private const MAIN = 'MAIN';

    private const BRANCH = 'BRANCH';

    public static function main(): self
    {
        return new self(self::MAIN);
    }

    public static function branch(): self
    {
        return new self(self::BRANCH);
    }
}
