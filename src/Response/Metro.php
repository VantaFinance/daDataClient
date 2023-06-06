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

    /**
     * @var numeric-string
     */
    private string $distance;

    /**
     * @param non-empty-string $name
     * @param non-empty-string $line
     * @param numeric-string   $distance
     */
    public function __construct(string $name, string $line, string $distance)
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

    /**
     * @return numeric-string
     */
    public function getDistance(): string
    {
        return $this->distance;
    }
}
