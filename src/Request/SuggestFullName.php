<?php

declare(strict_types=1);

namespace Vanta\Integration\DaData\Request;

/**
 * @psalm-immutable
 */
final class SuggestFullName
{
    /**
     * @var non-empty-string
     */
    private string $query;

    /**
     * @var positive-int
     */
    private int $count;

    /**
     * @param non-empty-string $query
     */
    public function __construct(string $query, int $count = 1)
    {
        $this->query = $query;
        $this->count = $count;
    }

    /**
     * @return non-empty-string
     */
    public function getQuery(): string
    {
        return $this->query;
    }

    /**
     * @return positive-int
     */
    public function getCount(): int
    {
        return $this->count;
    }
}
