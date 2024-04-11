<?php

declare(strict_types=1);

namespace Vanta\Integration\DaData\Transport;

use GuzzleHttp\Psr7\Request;
use Psr\Http\Client\ClientInterface as HttpClient;
use Symfony\Component\Serializer\SerializerInterface as Serializer;
use Vanta\Integration\DaData\CleanFullNameClient;
use Vanta\Integration\DaData\Response\CleanedFullName;
use Vanta\Integration\DaData\Response\SuggestAddress;
use Yiisoft\Http\Method;

final class RestCleanFullNameClient implements CleanFullNameClient
{
    private HttpClient $client;

    private Serializer $serializer;

    public function __construct(Serializer $serializer, HttpClient $client)
    {
        $this->serializer = $serializer;
        $this->client     = $client;
    }

    public function clean(string $fullName): array
    {
        $request = new Request(
            Method::POST,
            '/api/v1/clean/name',
            [],
            $this->serializer->serialize([$fullName], 'json')
        );

        $content = $this->client->sendRequest($request)->getBody()->__toString();

        /** @var list<SuggestAddress> $value */
        $value = $this->serializer->deserialize($content, CleanedFullName::class . '[]', 'json');

        return $value;
    }
}
