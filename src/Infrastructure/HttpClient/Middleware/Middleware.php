<?php
/**
 * DaData Client
 *
 * @author Vlad Shashkov <v.shashkov@pos-credit.ru>
 * @copyright Copyright (c) 2023, The Vanta
 */

declare(strict_types=1);

namespace Vanta\Integration\DaData\Infrastructure\HttpClient\Middleware;

use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Vanta\Integration\DaData\Infrastructure\HttpClient\ConfigurationClient;

interface Middleware
{
    /**
     * @param callable(Request, ConfigurationClient): Response $next
     *
     * @throws ClientExceptionInterface
     */
    public function process(Request $request, ConfigurationClient $configuration, callable $next): Response;
}
