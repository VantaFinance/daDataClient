<?php

/**
 * DaData Client
 *
 * @author Vlad Shashkov <v.shashkov@pos-credit.ru>
 * @copyright Copyright (c) 2023, The Vanta
 */

declare(strict_types=1);

namespace Vanta\Integration\DaData\Transport;

use GuzzleHttp\Psr7\Request;
use Psr\Http\Client\ClientInterface as HttpClient;
use Symfony\Component\Serializer\Normalizer\UnwrappingDenormalizer;
use Symfony\Component\Serializer\SerializerInterface as Serializer;
use Vanta\Integration\DaData\Response\SuggestAddress;
use Vanta\Integration\DaData\SuggestAddressClient;
use Yiisoft\Http\Method;

final class RestSuggestAddressClient implements SuggestAddressClient
{
    private HttpClient $client;

    private Serializer $serializer;

    public function __construct(Serializer $serializer, HttpClient $client)
    {
        $this->serializer = $serializer;
        $this->client     = $client;
    }

    public function findByText(string $query, int $count = 1): array
    {
        $request = new Request(
            Method::POST,
            '/suggestions/api/4_1/rs/suggest/address',
            [],
            $this->serializer->serialize(['query' => $query, 'count' => $count], 'json')
        );

        $content = $this->client->sendRequest($request)->getBody()->__toString();

        /** @var list<SuggestAddress> $value */
        $value = $this->serializer->deserialize($content, SuggestAddress::class . '[]', 'json', [
            UnwrappingDenormalizer::UNWRAP_PATH => '[suggestions]',
        ]);

        return $value;
    }
}
