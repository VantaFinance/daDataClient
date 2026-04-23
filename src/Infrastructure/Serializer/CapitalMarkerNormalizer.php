<?php

/**
 * DaData Client
 *
 * @author Denis Khodakovskii <d.khodakovskii@pos-credit.ru>
 * @copyright Copyright (c) 2026, The Vanta
 */

declare(strict_types=1);

namespace Vanta\Integration\DaData\Infrastructure\Serializer;

use Symfony\Component\Serializer\Normalizer\DenormalizerInterface as Denormalizer;
use Vanta\Integration\DaData\Response\CapitalMarker;

final class CapitalMarkerNormalizer implements Denormalizer
{
    /**
     * @return array<class-string, true>
     */
    public function getSupportedTypes(?string $format): array
    {
        return [CapitalMarker::class => true];
    }

    /**
     * @psalm-suppress MissingParamType, MethodSignatureMismatch
     */
    public function supportsDenormalization($data, ?string $type = null, ?string $format = null, array $context = []): bool
    {
        return CapitalMarker::class === $type;
    }

    /**
     * @psalm-suppress MissingParamType, MethodSignatureMismatch
     */
    public function denormalize($data, string $type, ?string $format = null, array $context = []): CapitalMarker
    {
        return new CapitalMarker((string) $data);
    }
}
