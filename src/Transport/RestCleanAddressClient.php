<?php

/**
 * DaData Client
 *
 * @author Denis Khodakovskiy <d.khodakovskii@pos-credit.ru>
 * @copyright Copyright (c) 2023, The Vanta
 */

declare(strict_types=1);

namespace Vanta\Integration\DaData\Transport;

use GuzzleHttp\Psr7\Request;
use Psr\Http\Client\ClientInterface as HttpClient;
use Symfony\Component\Serializer\SerializerInterface as Serializer;
use Vanta\Integration\DaData\CleanAddressClient;
use Vanta\Integration\DaData\Response\Address;
use Yiisoft\Http\Method;

final class RestCleanAddressClient implements CleanAddressClient
{
    private HttpClient $client;

    private Serializer $serializer;

    public function __construct(Serializer $serializer, HttpClient $client)
    {
        $this->serializer = $serializer;
        $this->client     = $client;
    }

    public function clean(string $address): array
    {
        $request = new Request(
            Method::POST,
            '/api/v1/clean/address',
            [],
            $this->serializer->serialize([$address], 'json')
        );

        $content = $this->client->sendRequest($request)->getBody()->__toString();

        /** @var list<Address> $value */
        $value = $this->serializer->deserialize($content, Address::class . '[]', 'json');

        return $value;
    }
}
