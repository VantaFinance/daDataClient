<?php

/**
 * DaData Client
 *
 * @author Denis Khodakovskiy <d.khodakovskii@pos-credit.ru>
 * @copyright Copyright (c) 2026, The Vanta
 */

declare(strict_types=1);

namespace Vanta\Integration\DaData;

use Psr\Http\Client\ClientExceptionInterface as ClientException;
use Vanta\Integration\DaData\Response\Address;

interface CleanAddressClient
{
    /**
     * @param non-empty-string $address
     *
     * @return list<Address>
     *
     * @throws ClientException
     */
    public function clean(string $address): array;
}
