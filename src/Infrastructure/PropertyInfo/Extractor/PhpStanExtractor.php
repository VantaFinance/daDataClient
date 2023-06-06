<?php
/**
 * DaData Client
 *
 * @author Vlad Shashkov <v.shashkov@pos-credit.ru>
 * @copyright Copyright (c) 2023, The Vanta
 */

declare(strict_types=1);

namespace Vanta\Integration\DaData\Infrastructure\PropertyInfo\Extractor;

use Symfony\Component\PropertyInfo\Extractor\ConstructorArgumentTypeExtractorInterface as ConstructorArgumentTypeExtractor;
use Symfony\Component\PropertyInfo\PropertyTypeExtractorInterface as PropertyTypeExtractor;
use Symfony\Component\PropertyInfo\Type;

use function Vanta\Integration\DaData\Infrastructure\Composer\isOldPackage;

final class PhpStanExtractor implements PropertyTypeExtractor, ConstructorArgumentTypeExtractor
{
    /**
     * @var PropertyTypeExtractor&ConstructorArgumentTypeExtractor
     */
    private PropertyTypeExtractor $extractor;

    /**
     * @param PropertyTypeExtractor&ConstructorArgumentTypeExtractor $extractor
     */
    public function __construct(PropertyTypeExtractor $extractor)
    {
        $this->extractor = $extractor;
    }

    /**
     * @psalm-suppress InternalMethod
     *
     * @return array<array-key, Type>|null
     */
    public function getTypesFromConstructor(string $class, string $property): ?array
    {
        return $this->extractor->getTypesFromConstructor($class, $property);
    }

    /**
     * @param array<array-key,mixed> $context
     *
     * @return array<array-key, Type>|null
     */
    public function getTypes(string $class, string $property, array $context = []): ?array
    {
        $types = $this->extractor->getTypes($class, $property, $context);

        if (null === $types) {
            return null;
        }

        if (!isOldPackage('symfony/property-info', '6.1')) {
            return $types;
        }

        foreach ($types as $type) {
            $className = $type->getClassName();

            if (null === $className) {
                continue;
            }

            if (Type::BUILTIN_TYPE_OBJECT !== $type->getBuiltinType()) {
                continue;
            }

            if (!str_contains($className, 'numeric-string') && !str_contains($className, 'non-empty-string')) {
                continue;
            }

            return [new Type(Type::BUILTIN_TYPE_STRING, $type->isNullable())];
        }

        return $types;
    }
}
