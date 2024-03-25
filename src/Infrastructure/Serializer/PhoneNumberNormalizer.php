<?php
/**
 * DaData Client
 *
 * @author Valentin Nazarov <v.nazarov@pos-credit.ru>
 * @copyright Copyright (c) 2024, The Vanta
 */

declare(strict_types=1);

namespace Vanta\Integration\DaData\Infrastructure\Serializer;

use Brick\PhoneNumber\PhoneNumber;
use Brick\PhoneNumber\PhoneNumberFormat;
use Brick\PhoneNumber\PhoneNumberParseException;
use Symfony\Component\PropertyInfo\Type;
use Symfony\Component\Serializer\Exception\NotNormalizableValueException;
use Symfony\Component\Serializer\Exception\UnexpectedValueException;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface as Denormalizer;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface as Normalizer;

final class PhoneNumberNormalizer implements Normalizer, Denormalizer
{
    /**
     * @return array<class-string, true>
     */
    public function getSupportedTypes(?string $format): array
    {
        return [PhoneNumber::class => true];
    }

    /**
     * @psalm-suppress MissingParamType, MethodSignatureMismatch
     */
    public function supportsDenormalization($data, string $type, ?string $format = null, array $context = []): bool
    {
        return PhoneNumber::class == $type;
    }

    /**
     * @psalm-suppress MissingParamType, MoreSpecificImplementedParamType, MethodSignatureMismatch
     *
     * @param array{deserialization_path?: non-empty-string} $context
     */
    public function denormalize($data, string $type, ?string $format = null, array $context = []): PhoneNumber
    {
        if (!\is_array($data)) {
            throw NotNormalizableValueException::createForUnexpectedDataType(
                sprintf('Ожидали массив, получили:%s.', get_debug_type($data)),
                $data,
                [Type::BUILTIN_TYPE_STRING],
                $context['deserialization_path'] ?? null,
                true
            );
        }

        if (!\array_key_exists('value', $data)) {
            throw NotNormalizableValueException::createForUnexpectedDataType(
                'Ожидали массив с ключом value',
                $data,
                [Type::BUILTIN_TYPE_STRING],
                $context['deserialization_path'] ?? null,
                true
            );
        }

        /** @var ?string $data */
        $data = $data['value'];

        if (!\is_string($data) || '' == $data) {
            throw NotNormalizableValueException::createForUnexpectedDataType(
                'Ожидали не пустую строку',
                $data,
                [Type::BUILTIN_TYPE_STRING],
                $context['deserialization_path'] ?? null,
                true
            );
        }

        try {
            return PhoneNumber::parse($data);
        } catch (PhoneNumberParseException $e) {
            throw NotNormalizableValueException::createForUnexpectedDataType(
                $e->getMessage(),
                $data,
                [Type::BUILTIN_TYPE_INT, Type::BUILTIN_TYPE_STRING],
                $context['deserialization_path'] ?? null,
                true
            );
        }
    }

    /**
     * @psalm-suppress MissingParamType*
     */
    public function supportsNormalization($data, ?string $format = null, array $context = []): bool
    {
        return $data instanceof PhoneNumber;
    }

    /**
     * @psalm-suppress MoreSpecificImplementedParamType, LessSpecificReturnStatement, MoreSpecificReturnType
     *
     * @param object               $object
     * @param array<string, mixed> $context
     *
     * @return non-empty-string
     */
    public function normalize($object, ?string $format = null, array $context = []): string
    {
        if (!$object instanceof PhoneNumber) {
            throw new UnexpectedValueException(sprintf('Allowed type: %s', PhoneNumber::class));
        }

        return $object->format(PhoneNumberFormat::E164);
    }
}
