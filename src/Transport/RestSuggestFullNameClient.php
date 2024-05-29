<?php

declare(strict_types=1);

namespace Vanta\Integration\DaData\Transport;

use GuzzleHttp\Psr7\Request;
use Psr\Http\Client\ClientInterface as HttpClient;
use Symfony\Component\Serializer\Normalizer\UnwrappingDenormalizer;
use Symfony\Component\Serializer\SerializerInterface as Serializer;
use Vanta\Integration\DaData\Request\SuggestFullName as SuggestFullNameRequest;
use Vanta\Integration\DaData\Response\SuggestFullName as SuggestFullNameResponse;
use Vanta\Integration\DaData\SuggestFullNameClient;
use Yiisoft\Http\Method;

final class RestSuggestFullNameClient implements SuggestFullNameClient
{
    private HttpClient $client;

    private Serializer $serializer;

    public function __construct(Serializer $serializer, HttpClient $client)
    {
        $this->serializer = $serializer;
        $this->client     = $client;
    }

    public function findByFullName(SuggestFullNameRequest $suggestFullName): array
    {
        $request = new Request(
            Method::POST,
            '/suggestions/api/4_1/rs/suggest/fio',
            [],
            $this->serializer->serialize($suggestFullName, 'json')
        );

        $content = $this->client->sendRequest($request)->getBody()->__toString();

        /** @var list<SuggestFullNameResponse> $value */
        $value = $this->serializer->deserialize($content, SuggestFullNameResponse::class . '[]', 'json', [
            UnwrappingDenormalizer::UNWRAP_PATH => '[suggestions]',
        ]);

        return $value;
    }
}
