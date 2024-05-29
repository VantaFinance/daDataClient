<?php

declare(strict_types=1);

namespace Vanta\Integration\DaData\Response;

use MyCLabs\Enum\Enum;

if (version_compare(PHP_VERSION, '8.3.0')) {
    /**
     * @psalm-immutable
     *
     * @extends Enum<numeric-string>
     */
    final class QcSuggestFullName extends Enum
    {
        private string const KNOWN = '0';

        private string const UNKNOWN = '1';

        public static function known(): self
        {
            return new self(self::KNOWN);
        }

        public static function unknown(): self
        {
            return new self(self::UNKNOWN);
        }
    }
} else {
    /**
     * @psalm-immutable
     *
     * @extends Enum<numeric-string>
     */
    final class QcSuggestFullName extends Enum
    {
        private const KNOWN = '0';

        private const UNKNOWN = '1';

        public static function known(): self
        {
            return new self(self::KNOWN);
        }

        public static function unknown(): self
        {
            return new self(self::UNKNOWN);
        }
    }

}
