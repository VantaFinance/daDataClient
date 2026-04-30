<?php

/**
 * DaData Client
 *
 * @author Denis Khodakovskii <d.khodakovskii@pos-credit.ru>
 * @copyright Copyright (c) 2026, The Vanta
 */

declare(strict_types=1);

namespace Vanta\Integration\DaData\Infrastructure\Serializer;

use Symfony\Component\PropertyInfo\Type;
use Symfony\Component\Serializer\Exception\NotNormalizableValueException;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface as Denormalizer;
use Vanta\Integration\DaData\Response\QcGeo;

final class QcGeoNormalizer implements Denormalizer
{
    /**
     * @return array<class-string, true>
     */
    public function getSupportedTypes(?string $format): array
    {
        return [QcGeo::class => true];
    }

    /**
     * @psalm-suppress MissingParamType, MethodSignatureMismatch
     */
    public function supportsDenormalization($data, ?string $type = null, ?string $format = null, array $context = []): bool
    {
        return QcGeo::class === $type;
    }

    /**
     * @psalm-suppress MissingParamType, MethodSignatureMismatch
     *
     * @param array{deserialization_path?: non-empty-string} $context
     */
    public function denormalize($data, string $type, ?string $format = null, array $context = []): QcGeo
    {
        if (\is_int($data)) {
            $data = (string) $data;
        }

        if (!\is_string($data)) {
            throw NotNormalizableValueException::createForUnexpectedDataType(
                sprintf('Ожидали строку, получили: %s.', get_debug_type($data)),
                $data,
                [Type::BUILTIN_TYPE_STRING],
                $context['deserialization_path'] ?? null,
                true
            );
        }

        if (!is_numeric($data)) {
            throw NotNormalizableValueException::createForUnexpectedDataType(
                'Ожидали число в виде строки',
                $data,
                [Type::BUILTIN_TYPE_STRING],
                $context['deserialization_path'] ?? null,
                true
            );
        }

        try {
            return new QcGeo($data);
        } catch (\InvalidArgumentException $e) {
            throw NotNormalizableValueException::createForUnexpectedDataType(
                $e->getMessage(),
                $data,
                [Type::BUILTIN_TYPE_STRING],
                $context['deserialization_path'] ?? null,
                true
            );
        }
    }
}
