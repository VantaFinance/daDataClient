<?php

/**
 * DaData Client
 *
 * @author Vlad Shashkov <v.shashkov@pos-credit.ru>
 * @copyright Copyright (c) 2023, The Vanta
 */

declare(strict_types=1);

namespace Vanta\Integration\DaData\Infrastructure\HttpClient\Middleware;

use GuzzleHttp\Psr7\Utils;
use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Vanta\Integration\DaData\Infrastructure\HttpClient\ConfigurationClient;

final class UrlMiddleware implements Middleware
{
    public function process(Request $request, ConfigurationClient $configuration, callable $next): Response
    {
        $request = $request->withUri(
            Utils::uriFor(sprintf('%s%s', $configuration->getUrl(), $request->getUri()->__toString()))
        );

        return $next($request, $configuration);
    }
}
