<?php
/**
 * DaData Client
 *
 * @author Vlad Shashkov <v.shashkov@pos-credit.ru>
 * @copyright Copyright (c) 2023, The Vanta
 */

declare(strict_types=1);


namespace Vanta\Integration\DaData\Response;


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
        $isDeleted = $value >= self::MIN_RENAMED && $value <= self::MAX_RENAMED;

        if (!in_array($value, [self::ACTUAL, self::REASSIGNED, self::DELETED]) && !$isDeleted){
            throw new \InvalidArgumentException('Invalid Fias actuality state');
        }

        $this->value = $value;
    }


    public function isActual(): bool
    {
        return $this->value == self::ACTUAL;
    }

    public function isDeleted(): bool
    {
        return $this->value == self::DELETED;
    }


    public function isReassigned(): bool
    {
        return $this->value == self::REASSIGNED;
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