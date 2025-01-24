<?php

/**
 * DaData Client
 *
 * @author Vlad Shashkov <v.shashkov@pos-credit.ru>
 * @copyright Copyright (c) 2023, The Vanta
 */

declare(strict_types=1);

namespace Vanta\Integration\DaData\Infrastructure\HttpClient;

final class ConfigurationClient
{
    /**
     * @var non-empty-string|null
     */
    private ?string $apiKey;

    /**
     * @var non-empty-string|null
     */
    private ?string $secretKey;

    /**
     * @var non-empty-string
     */
    private string $url;

    /**
     * @param non-empty-string|null $apiKey
     * @param non-empty-string|null $secretKey
     * @param non-empty-string      $url
     */
    public function __construct(?string $apiKey, ?string $secretKey, string $url)
    {
        $this->apiKey    = $apiKey;
        $this->secretKey = $secretKey;
        $this->url       = $url;
    }

    /**
     * @return non-empty-string|null
     */
    public function getApiKey(): ?string
    {
        return $this->apiKey;
    }

    /**
     * @return non-empty-string|null
     */
    public function getSecretKey(): ?string
    {
        return $this->secretKey;
    }

    /**
     * @return non-empty-string
     */
    public function getUrl(): string
    {
        return $this->url;
    }
}
