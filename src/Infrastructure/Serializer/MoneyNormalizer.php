<?php
/**
 * DaData Client
 *
 * @author Vlad Shashkov <v.shashkov@pos-credit.ru>
 * @copyright Copyright (c) 2023, The Vanta
 */

declare(strict_types=1);

namespace Vanta\Integration\DaData\Infrastructure\Serializer;

use Money\Currencies\ISOCurrencies;
use Money\Currency;
use Money\Formatter\DecimalMoneyFormatter;
use Money\Money;
use Money\Parser\DecimalMoneyParser;
use Symfony\Component\PropertyInfo\Type;
use Symfony\Component\Serializer\Exception\NotNormalizableValueException;
use Symfony\Component\Serializer\Exception\UnexpectedValueException;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface as Denormalizer;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface as Normalizer;

final class MoneyNormalizer implements Normalizer, Denormalizer
{
    /**
     * @return array<class-string, true>
     */
    public function getSupportedTypes(?string $format): array
    {
        return [Money::class => true];
    }

    /**
     * @psalm-suppress MissingParamType
     */
    public function supportsDenormalization($data, string $type, ?string $format = null, array $context = []): bool
    {
        return Money::class == $type;
    }

    /**
     * @psalm-suppress MissingParamType, MoreSpecificImplementedParamType, MethodSignatureMismatch
     *
     * @param array{deserialization_path?: non-empty-string} $context
     */
    public function denormalize($data, string $type, ?string $format = null, array $context = []): Money
    {
        if (!\is_string($data)) {
            throw NotNormalizableValueException::createForUnexpectedDataType(
                sprintf('Ожидали строку,получили:%s.', get_debug_type($data)),
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

        if (!is_numeric($data)) {
            throw NotNormalizableValueException::createForUnexpectedDataType(
                'Ожидали число в виде строки',
                $data,
                [Type::BUILTIN_TYPE_STRING],
                $context['deserialization_path'] ?? null,
                true
            );
        }

        $moneyParser = new DecimalMoneyParser(new ISOCurrencies());
        $money       = new Money($moneyParser->parse($data, new Currency('RUB'))->getAmount(), new Currency('NON'));

        try {
            return $money;
        } catch (\InvalidArgumentException $e) {
            throw NotNormalizableValueException::createForUnexpectedDataType(
                $e->getMessage(),
                $data,
                [Type::BUILTIN_TYPE_FLOAT],
                $context['deserialization_path'] ?? null,
                true
            );
        }
    }

    /**
     * @psalm-suppress MissingParamType
     */
    public function supportsNormalization($data, ?string $format = null, array $context = []): bool
    {
        return $data instanceof Money;
    }

    /**
     * @psalm-suppress ParamNameMismatch
     */
    public function normalize($object, ?string $format = null, array $context = []): string
    {
        if (!$object instanceof Money) {
            throw new UnexpectedValueException(sprintf('Allowed type: %s', Money::class));
        }

        return (new DecimalMoneyFormatter(new ISOCurrencies()))->format($object);
    }
}
