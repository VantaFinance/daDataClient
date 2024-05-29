<?php

declare(strict_types=1);

namespace Vanta\Integration\DaData\Response;

use MyCLabs\Enum\Enum;

/**
 * @psalm-immutable
 *
 * @extends Enum<non-empty-string>
 */
final class SuggestGender extends Enum
{
    private const MALE = 'MALE';

    private const FEMALE = 'FEMALE';

    private const UNKNOWN = 'UNKNOWN';

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
