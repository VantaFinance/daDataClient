<?php

/**
 * DaData Client
 *
 * @author Vlad Shashkov <v.shashkov@pos-credit.ru>
 * @copyright Copyright (c) 2023, The Vanta
 */

declare(strict_types=1);

namespace Vanta\Integration\DaData\Infrastructure\HttpClient\Exception;

use Psr\Http\Client\ClientExceptionInterface as ClientException;
use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

abstract class DaDataException extends \Exception implements ClientException
{
    private Response $response;

    private Request $request;

    /**
     * @var non-empty-string
     */
    private string $source;

    final protected function __construct(
        Response $response,
        Request $request,
        string $source,
        string $message = '',
        int $code = 0,
        ?\Throwable $previous = null
    ) {
        $this->response = $response;
        $this->request  = $request;
        $this->source   = $source;

        parent::__construct($message, $code, $previous);
    }

    /**
     * @return non-empty-string
     */
    final public function getSource(): string
    {
        return $this->source;
    }

    final public function getResponse(): Response
    {
        return $this->response;
    }

    final public function getRequest(): Request
    {
        return $this->request;
    }
}
