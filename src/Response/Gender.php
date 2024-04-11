<?php

declare(strict_types=1);

namespace Vanta\Integration\DaData\Response;

use MyCLabs\Enum\Enum;

/**
 * @psalm-immutable
 *
 * @extends Enum<non-empty-string>
 */
final class Gender extends Enum
{
    private const MALE = 'М';

    private const FEMALE = 'Ж';

    private const UNKNOWN = 'НД';

    public static function male(): self
    {
        return new self(self::MALE);
    }

    public static function female(): self
    {
        return new self(self::FEMALE);
    }

    public static function unknown(): self
    {
        return new self(self::UNKNOWN);
    }
}
