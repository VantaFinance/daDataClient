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
final class Metro
{
    /**
     * @var non-empty-string
     */
    private string $name;

    /**
     * @var non-empty-string
     */
    private string $line;

    private float $distance;

    /**
     * @param non-empty-string $name
     * @param non-empty-string $line
     */
    public function __construct(string $name, string $line, float $distance)
    {
        $this->name     = $name;
        $this->line     = $line;
        $this->distance = $distance;
    }

    /**
     * @return non-empty-string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return non-empty-string
     */
    public function getLine(): string
    {
        return $this->line;
    }

    public function getDistance(): float
    {
        return $this->distance;
    }
}
