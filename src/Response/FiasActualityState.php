<?php

/**
 * DaData Client
 *
 * @author Vlad Shashkov <v.shashkov@pos-credit.ru>
 * @copyright Copyright (c) 2023, The Vanta
 */

declare(strict_types=1);

namespace Vanta\Integration\DaData\Response;

/**
 * @psalm-immutable
 */
final class FiasActualityState
{
    private const ACTUAL = '0';

    private const DELETED = '99';

    private const REASSIGNED = '51';

    private const MIN_RENAMED = '1';

    private const MAX_RENAMED = '50';

    /**
     * @var numeric-string
     */
    private string $value;

    /**
     * @param numeric-string $value
     */
    public function __construct(string $value)
    {
        $isRenamed = $value >= self::MIN_RENAMED && $value <= self::MAX_RENAMED;

        if (!in_array($value, [self::ACTUAL, self::REASSIGNED, self::DELETED]) && !$isRenamed) {
            throw new \InvalidArgumentException('Invalid Fias actuality state');
        }

        $this->value = $value;
    }

    public function isActual(): bool
    {
        return self::ACTUAL == $this->value;
    }

    public function isDeleted(): bool
    {
        return self::DELETED == $this->value;
    }

    public function isReassigned(): bool
    {
        return self::REASSIGNED == $this->value;
    }

    public function isRenamed(): bool
    {
        return $this->value >= self::MIN_RENAMED && $this->value <= self::MAX_RENAMED;
    }

    /**
     * @return numeric-string
     */
    public function __toString(): string
    {
        return $this->value;
    }
}
