<?php

/**
 * DaData Client
 *
 * @author Vlad Shashkov <v.shashkov@pos-credit.ru>
 * @copyright Copyright (c) 2023, The Vanta
 */

declare(strict_types=1);

namespace Vanta\Integration\DaData\Infrastructure\HttpClient\Middleware;

use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Vanta\Integration\DaData\Infrastructure\HttpClient\ConfigurationClient;

final class AuthorizationMiddleware implements Middleware
{
    public function process(Request $request, ConfigurationClient $configuration, callable $next): Response
    {
        $request = $request->withAddedHeader('Content-Type', 'application/json');

        if (null != $configuration->getApiKey() && null != $configuration->getSecretKey()) {
            $request = $request->withAddedHeader('Authorization', sprintf('TOKEN %s', $configuration->getApiKey()))
                ->withAddedHeader('X-Secret', $configuration->getSecretKey())
            ;
        }

        return $next($request, $configuration);
    }
}
