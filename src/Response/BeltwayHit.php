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
final class BeltwayHit extends Enum
{
    private const IN_MKAD = 'IN_MKAD';

    private const OUT_MKAD = 'OUT_MKAD';

    private const IN_KAD = 'IN_KAD';

    private const OUT_KAD = 'OUT_KAD';

    public static function inMkad(): self
    {
        return new self(self::IN_MKAD);
    }

    public static function outMkad(): self
    {
        return new self(self::OUT_MKAD);
    }

    public static function inKad(): self
    {
        return new self(self::IN_KAD);
    }

    public static function outKad(): self
    {
        return new self(self::OUT_KAD);
    }
}
