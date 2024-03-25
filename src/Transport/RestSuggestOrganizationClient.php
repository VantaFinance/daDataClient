<?php
/**
 * DaData Client
 *
 * @author Valentin Nazarov <v.nazarov@pos-credit.ru>
 * @copyright Copyright (c) 2024, The Vanta
 */

declare(strict_types=1);

namespace Vanta\Integration\DaData\Transport;

use GuzzleHttp\Psr7\Request;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface as HttpClient;
use Symfony\Component\Serializer\Normalizer\UnwrappingDenormalizer;
use Symfony\Component\Serializer\SerializerInterface as Serializer;
use Vanta\Integration\DaData\Response\SuggestOrganization;
use Vanta\Integration\DaData\SuggestOrganizationClient;
use Yiisoft\Http\Method;

final class RestSuggestOrganizationClient implements SuggestOrganizationClient
{
    private HttpClient $client;

    private Serializer $serializer;

    public function __construct(Serializer $serializer, HttpClient $client)
    {
        $this->serializer = $serializer;
        $this->client     = $client;
    }

    public function findByInn(string $inn): array
    {
        $request = new Request(
            Method::POST,
            '/suggestions/api/4_1/rs/findById/party',
            [],
            $this->serializer->serialize(['query' => $inn], 'json')
        );

        $content = $this->client->sendRequest($request)->getBody()->__toString();

        /** @var list<SuggestOrganization> $value */
        $value = $this->serializer->deserialize($content, SuggestOrganization::class . '[]', 'json', [
            UnwrappingDenormalizer::UNWRAP_PATH => '[suggestions]',
        ]);

        return $value;
    }

}
