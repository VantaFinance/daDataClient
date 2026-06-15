<?php

/**
 * DaData Client
 *
 * @author Vlad Shashkov <v.shashkov@pos-credit.ru>
 * @copyright Copyright (c) 2026, The Vanta
 */
declare(strict_types=1);

namespace Vanta\Integration\DaData\Infrastructure\HttpClient\Middleware;

abstract class SourceAwareMiddleware implements Middleware
{
    /**
     * @var non-empty-string
     */
    protected string $source;

    /**
     * @param non-empty-string $source
     */
    final public function __construct(string $source = 'none')
    {
        $this->source = $source;
    }

    /**
     * @param non-empty-string $source
     *
     * @return static
     */
    final public function withSource(string $source): self
    {
        return new static($source);
    }
}
