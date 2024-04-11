<?php

declare(strict_types=1);

namespace Vanta\Integration\DaData\Response;

use MyCLabs\Enum\Enum;

/**
 * @psalm-immutable
 *
 * @extends Enum<non-negative-int>
 */
final class QcFullName extends Enum
{
    /**
     * The original value is confidently recognized.
     * No need to check manually.
     */
    private const EXACT = 0;

    /**
     * Original value recognized with assumptions or not recognized.
     * Need to check manually.
     */
    private const ASSUMPTION = 1;

    /**
     * The initial value is empty or obviously “garbage”.
     * No need to check manually.
     */
    private const GARBAGE = 2;

    public static function exact(): self
    {
        return new self(self::EXACT);
    }

    public static function assumption(): self
    {
        return new self(self::ASSUMPTION);
    }

    public static function garbage(): self
    {
        return new self(self::GARBAGE);
    }
}
