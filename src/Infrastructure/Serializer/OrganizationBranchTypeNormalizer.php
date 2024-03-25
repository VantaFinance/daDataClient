<?php
/**
 * DaData Client
 *
 * @author Vlad Shashkov <v.shashkov@pos-credit.ru>
 * @copyright Copyright (c) 2023, The Vanta
 */

declare(strict_types=1);

namespace Vanta\Integration\DaData\Infrastructure\Serializer;

use Symfony\Component\PropertyInfo\Type;
use Symfony\Component\Serializer\Exception\NotNormalizableValueException;
use Symfony\Component\Serializer\Exception\UnexpectedValueException;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface as Denormalizer;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface as Normalizer;
use Vanta\Integration\DaData\Response\OrganizationBranchType;

final class OrganizationBranchTypeNormalizer implements Normalizer, Denormalizer
{
    /**
     * @return array<class-string, true>
     */
    public function getSupportedTypes(?string $format): array
    {
        return [OrganizationBranchType::class => true];
    }

    /**
     * @psalm-suppress MissingParamType
     */
    public function supportsDenormalization($data, string $type, ?string $format = null, array $context = []): bool
    {
        return OrganizationBranchType::class == $type;
    }

    /**
     * @psalm-suppress MissingParamType, MoreSpecificImplementedParamType, MethodSignatureMismatch, TypeDoesNotContainType
     *
     * @param array{deserialization_path?: non-empty-string} $context
     */
    public function denormalize($data, string $type, ?string $format = null, array $context = []): OrganizationBranchType
    {
        if (!\is_string($data)) {
            throw NotNormalizableValueException::createForUnexpectedDataType(
                sprintf('Ожидали строку,получили: %s.', get_debug_type($data)),
                $data,
                [Type::BUILTIN_TYPE_STRING],
                $context['deserialization_path'] ?? null,
                true
            );
        }

        if ('' == $data) {
            throw NotNormalizableValueException::createForUnexpectedDataType(
                'Ожидали не пустую строку',
                $data,
                [Type::BUILTIN_TYPE_STRING],
                $context['deserialization_path'] ?? null,
                true
            );
        }

        return OrganizationBranchType::isValid($data)
            ? OrganizationBranchType::from($data)
            : OrganizationBranchType::unknown()
        ;
    }

    /**
     * @psalm-suppress MissingParamType
     */
    public function supportsNormalization($data, ?string $format = null, array $context = []): bool
    {
        return $data instanceof OrganizationBranchType;
    }

    /**
     * @psalm-suppress MoreSpecificImplementedParamType
     *
     * @param object               $object
     * @param array<string, mixed> $context
     *
     * @return non-empty-string
     */
    public function normalize($object, ?string $format = null, array $context = []): string
    {
        if (!$object instanceof OrganizationBranchType) {
            throw new UnexpectedValueException(sprintf('Allowed type: %s', OrganizationBranchType::class));
        }

        return $object->getValue();
    }
}
