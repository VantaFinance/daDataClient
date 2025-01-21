<?php

/**
 * DaData Client
 *
 * @author Vlad Shashkov <v.shashkov@pos-credit.ru>
 * @copyright Copyright (c) 2023, The Vanta
 */

declare(strict_types=1);

namespace Vanta\Integration\DaData\Infrastructure\HttpClient;

use Psr\Http\Client\ClientInterface as PsrHttpClient;
use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Vanta\Integration\DaData\Infrastructure\HttpClient\Middleware\PipelineMiddleware;

final class HttpClient implements PsrHttpClient
{
    private PipelineMiddleware $pipeline;

    private ConfigurationClient $configuration;

    public function __construct(ConfigurationClient $configuration, PipelineMiddleware $pipeline)
    {
        $this->pipeline      = $pipeline;
        $this->configuration = $configuration;
    }

    public function sendRequest(Request $request): Response
    {
        return $this->pipeline->process($request, $this->configuration);
    }
}
