<?php

declare(strict_types=1);

namespace Vanta\Integration\DaData\Response;

final class Management
{
    /**
     * @var non-empty-string
     */
    private string $name;

    /**
     * @var non-empty-string|null
     */
    private ?string $post;

    /**
     * @param non-empty-string $name
     * @param non-empty-string|null $post
     */
    public function __construct(string $name, ?string $post)
    {
        $this->name = $name;
        $this->post = $post;
    }

    /**
     * @return non-empty-string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return non-empty-string|null
     */
    public function getPost(): ?string
    {
        return $this->post;
    }
}
