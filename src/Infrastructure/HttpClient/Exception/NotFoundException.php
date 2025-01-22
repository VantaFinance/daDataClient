<?php

/**
 * DaData Client
 *
 * @author Vlad Shashkov <v.shashkov@pos-credit.ru>
 * @copyright Copyright (c) 2023, The Vanta
 */

declare(strict_types=1);

namespace Vanta\Integration\DaData\Infrastructure\HttpClient\Exception;

use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

final class NotFoundException extends DaDataException
{
    public static function create(Response $response, Request $request): self
    {
        return new self($response, $request, 'Not Found');
    }
}
