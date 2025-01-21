<?php

/**
 * DaData Client
 *
 * @author Valentin Nazarov <v.nazarov@pos-credit.ru>
 * @copyright Copyright (c) 2024, The Vanta
 */

declare(strict_types=1);

namespace Vanta\Integration\DaData\Response;

/**
 * @psalm-immutable
 */
final class SuggestOrganization
{
    private Organization $data;

    /**
     * @var non-empty-string
     */
    private string $value;

    /**
     * @var non-empty-string
     */
    private string $unrestrictedValue;

    /**
     * @param non-empty-string $value
     * @param non-empty-string $unrestrictedValue
     */
    public function __construct(Organization $data, string $value, string $unrestrictedValue)
    {
        $this->data              = $data;
        $this->value             = $value;
        $this->unrestrictedValue = $unrestrictedValue;
    }

    public function getData(): Organization
    {
        return $this->data;
    }

    /**
     * @return non-empty-string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @return non-empty-string
     */
    public function getUnrestrictedValue(): string
    {
        return $this->unrestrictedValue;
    }
}
