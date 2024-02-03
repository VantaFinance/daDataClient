<?php
/**
 * DaData Client
 *
 * @author Vlad Shashkov <v.shashkov@pos-credit.ru>
 * @copyright Copyright (c) 2023, The Vanta
 */

declare(strict_types=1);

namespace Vanta\Integration\DaData\Infrastructure\Serializer;

use MyCLabs\Enum\Enum;
use Symfony\Component\PropertyInfo\Type;
use Symfony\Component\Serializer\Exception\NotNormalizableValueException;
use Symfony\Component\Serializer\Exception\UnexpectedValueException;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface as Denormalizer;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface as Normalizer;
use Vanta\Integration\DaData\Response\CountryIso;

final class EnumNormalizer implements Denormalizer, Normalizer
{

    /**
     * @param string|null $format
     *
     * @return true[]
     */
    public function getSupportedTypes(?string $format): array
    {
        return [Enum::class => true];
    }

    /**
     * @psalm-suppress MissingParamType
     *
     * @param array<string, string> $context
     */
    public function supportsDenormalization($data, ?string $type = null, ?string $format = null, array $context = []): bool
    {
        return is_subclass_of($type ?? '', Enum::class);
    }

    /**
     * @psalm-suppress InvalidArgument,MoreSpecificImplementedParamType
     *
     * @template T
     *
     * @param T                     $data
     * @param class-string<Enum<T>> $type
     * @param array<string>         $context
     *
     * @return Enum<T>
     */
    public function denormalize($data, string $type, ?string $format = null, array $context = []): Enum
    {
        if (!$type::isValid($data)) {
            throw NotNormalizableValueException::createForUnexpectedDataType(
                sprintf(
                    'Ожидали enum: %s, получили: %s',
                    $type::toArray(),
                    get_debug_type($type)
                ),
                $data,
                [Type::BUILTIN_TYPE_STRING],
                $context['deserialization_path'] ?? null,
                true
            );
        }

        try {
            return new $type($data);
        } catch (\UnexpectedValueException $e) {
            throw new UnexpectedValueException($e->getMessage(), 0, $e);
        }
    }

    /**
     * @psalm-suppress MissingParamType
     *
     * @param array<string, string> $context
     */
    public function supportsNormalization($data, ?string $format = null, array $context = []): bool
    {
        return $data instanceof Enum;
    }

    /**
     * @psalm-suppress MoreSpecificImplementedParamType
     *
     * @template T of scalar
     *
     * @param Enum<T>       $object
     * @param array<string> $context
     *
     * @return T
     */
    public function normalize($object, ?string $format = null, array $context = [])
    {
        return $object->getValue();
    }
}
