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
    private ?string $token;

    /**
     * @var non-empty-string|null
     */
    private ?string $secret;

    /**
     * @var non-empty-string
     */
    private string $url;

    /**
     * @param non-empty-string|null $token
     * @param non-empty-string|null $secret
     * @param non-empty-string      $url
     */
    public function __construct(?string $token, ?string $secret, string $url)
    {
        $this->token  = $token;
        $this->secret = $secret;
        $this->url    = $url;
    }

    /**
     * @return non-empty-string|null
     */
    public function getToken(): ?string
    {
        return $this->token;
    }

    /**
     * @return non-empty-string|null
     */
    public function getSecret(): ?string
    {
        return $this->secret;
    }

    /**
     * @return non-empty-string
     */
    public function getUrl(): string
    {
        return $this->url;
    }
}
