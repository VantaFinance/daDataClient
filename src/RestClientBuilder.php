<?php
/**
 * DaData Client
 *
 * @author Vlad Shashkov <v.shashkov@pos-credit.ru>
 * @copyright Copyright (c) 2023, The Vanta
 */

declare(strict_types=1);

namespace Vanta\Integration\DaData;

use Doctrine\Common\Annotations\AnnotationReader;
use Psr\Http\Client\ClientInterface as PsrHttpClient;
use Symfony\Component\PropertyInfo\Extractor\PhpStanExtractor;
use Symfony\Component\PropertyInfo\PropertyInfoExtractor;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Mapping\ClassDiscriminatorFromClassMetadata;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\Mapping\Loader\AnnotationLoader;
use Symfony\Component\Serializer\NameConverter\CamelCaseToSnakeCaseNameConverter;
use Symfony\Component\Serializer\NameConverter\MetadataAwareNameConverter;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Normalizer\UidNormalizer;
use Symfony\Component\Serializer\Normalizer\UnwrappingDenormalizer;
use Symfony\Component\Serializer\Serializer as SymfonySerializer;
use Symfony\Component\Serializer\SerializerInterface as Serializer;
use Vanta\Integration\DaData\Infrastructure\HttpClient\ConfigurationClient;
use Vanta\Integration\DaData\Infrastructure\HttpClient\HttpClient;
use Vanta\Integration\DaData\Infrastructure\HttpClient\Middleware\AuthorizationMiddleware;
use Vanta\Integration\DaData\Infrastructure\HttpClient\Middleware\ClientErrorMiddleware;
use Vanta\Integration\DaData\Infrastructure\HttpClient\Middleware\InternalServerMiddleware;
use Vanta\Integration\DaData\Infrastructure\HttpClient\Middleware\Middleware;
use Vanta\Integration\DaData\Infrastructure\HttpClient\Middleware\UrlMiddleware;
use Vanta\Integration\DaData\Infrastructure\Serializer\CountryIsoNormalizer;
use Vanta\Integration\DaData\Infrastructure\Serializer\EnumNormalizer;
use Vanta\Integration\DaData\Infrastructure\Serializer\MoneyNormalizer;
use Vanta\Integration\DaData\Transport\RestSuggestAddressClient;

final class RestClientBuilder
{
    private PsrHttpClient $client;

    private Serializer $serializer;

    /**
     * @var non-empty-string|null
     */
    private ?string $apiKey;

    /**
     * @var non-empty-string|null
     */
    private ?string $secret;

    /**
     * @var non-empty-array<int, Middleware>
     */
    private array $middlewares;

    /**
     * @param array<int, Middleware> $middlewares
     * @param non-empty-string|null  $token
     * @param non-empty-string|null  $secret
     */
    private function __construct(PsrHttpClient $client, Serializer $serializer, ?string $token, ?string $secret, array $middlewares = [])
    {
        $this->client      = $client;
        $this->serializer  = $serializer;
        $this->apiKey      = $token;
        $this->secret      = $secret;
        $this->middlewares = array_merge($middlewares, [
            new AuthorizationMiddleware(),
            new UrlMiddleware(),
            new InternalServerMiddleware(),
            new ClientErrorMiddleware(),
        ]);
    }

    /**
     * @param non-empty-string|null $apiKey
     * @param non-empty-string|null $secret
     */
    public static function create(PsrHttpClient $client, string $apiKey = null, string $secret = null): self
    {
        $classMetadataFactory = new ClassMetadataFactory(new AnnotationLoader(new AnnotationReader()));

        $serializer = new SymfonySerializer([
            new MoneyNormalizer(),
            new EnumNormalizer(),
            new CountryIsoNormalizer(),
            new UnwrappingDenormalizer(),
            new DateTimeNormalizer(),
            new UidNormalizer(),
            new ObjectNormalizer(
                $classMetadataFactory,
                new MetadataAwareNameConverter($classMetadataFactory, new CamelCaseToSnakeCaseNameConverter()),
                null,
                new PropertyInfoExtractor(
                    [],
                    [new Infrastructure\PropertyInfo\Extractor\PhpStanExtractor(new PhpStanExtractor())],
                    [],
                    [],
                    [],
                ),
                new ClassDiscriminatorFromClassMetadata($classMetadataFactory)
            ),
            new ArrayDenormalizer(),
        ], [new JsonEncoder()]);

        return new self($client, $serializer, $apiKey, $secret);
    }

    public function addMiddleware(Middleware $middleware): self
    {
        return new self(
            $this->client,
            $this->serializer,
            $this->apiKey,
            $this->secret,
            array_merge($this->middlewares, [$middleware])
        );
    }

    /**
     * @param non-empty-array<int, Middleware> $middlewares
     */
    public function withMiddlewares(array $middlewares): self
    {
        return new self(
            $this->client,
            $this->serializer,
            $this->apiKey,
            $this->secret,
            $middlewares
        );
    }

    public function withSerializer(Serializer $serializer): self
    {
        return new self($this->client, $serializer, $this->apiKey, $this->secret);
    }

    public function withClient(PsrHttpClient $client): self
    {
        return new self($client, $this->serializer, $this->apiKey, $this->secret);
    }

    /**
     * @param non-empty-string $url
     */
    public function createSuggestAddressClient(string $url = 'https://suggestions.dadata.ru'): SuggestAddressClient
    {
        return new RestSuggestAddressClient(
            $this->serializer,
            new HttpClient(
                new ConfigurationClient(
                    $this->apiKey,
                    $this->secret,
                    $url
                ),
                $this->client,
                $this->middlewares
            )
        );
    }
}
