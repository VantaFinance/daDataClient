<?php

declare(strict_types=1);

namespace Vanta\Integration\DaData\Response;

/**
 * @psalm-immutable
 */
final class FullName
{
    /**
     * @var non-empty-string|null
     */
    private ?string $source;

    /**
     * @var non-empty-string|null
     */
    private ?string $surname;

    /**
     * @var non-empty-string|null
     */
    private ?string $name;

    /**
     * @var non-empty-string|null
     */
    private ?string $patronymic;

    private SuggestGender $gender;

    private QcSuggestFullName $qc;

    /**
     * @param non-empty-string|null $source
     * @param non-empty-string|null $surname
     * @param non-empty-string|null $name
     * @param non-empty-string|null $patronymic
     */
    public function __construct(
        ?string $source,
        ?string $surname,
        ?string $name,
        ?string $patronymic,
        SuggestGender $gender,
        QcSuggestFullName $qc
    ) {
        $this->source     = $source;
        $this->surname    = $surname;
        $this->name       = $name;
        $this->patronymic = $patronymic;
        $this->gender     = $gender;
        $this->qc         = $qc;
    }

    /**
     * @return non-empty-string|null
     */
    public function getSource(): ?string
    {
        return $this->source;
    }

    /**
     * @return non-empty-string|null
     */
    public function getSurname(): ?string
    {
        return $this->surname;
    }

    /**
     * @return non-empty-string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return non-empty-string|null
     */
    public function getPatronymic(): ?string
    {
        return $this->patronymic;
    }

    public function getGender(): SuggestGender
    {
        return $this->gender;
    }

    public function getQc(): QcSuggestFullName
    {
        return $this->qc;
    }
}
