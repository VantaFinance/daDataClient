<?php

declare(strict_types=1);

namespace Vanta\Integration\DaData\Response;

/**
 * @psalm-immutable
 */
final class CleanedFullName
{
    /**
     * @var non-empty-string
     */
    private string $source;

    /**
     * @var non-empty-string|null
     */
    private ?string $result;

    /**
     * @var non-empty-string|null
     */
    private ?string $resultGenitive;

    /**
     * @var non-empty-string|null
     */
    private ?string $resultDative;

    /**
     * @var non-empty-string|null
     */
    private ?string $resultAblative;

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

    private Gender $gender;

    private QcFullName $qc;

    /**
     * @param non-empty-string      $source
     * @param non-empty-string|null $result
     * @param non-empty-string|null $resultGenitive
     * @param non-empty-string|null $resultDative
     * @param non-empty-string|null $resultAblative
     * @param non-empty-string|null $surname
     * @param non-empty-string      $name
     * @param non-empty-string      $patronymic
     */
    public function __construct(
        string $source,
        ?string $result,
        ?string $resultGenitive,
        ?string $resultDative,
        ?string $resultAblative,
        ?string $surname,
        ?string $name,
        ?string $patronymic,
        Gender $gender,
        QcFullName $qc
    ) {
        $this->source         = $source;
        $this->result         = $result;
        $this->resultGenitive = $resultGenitive;
        $this->resultDative   = $resultDative;
        $this->resultAblative = $resultAblative;
        $this->surname        = $surname;
        $this->name           = $name;
        $this->patronymic     = $patronymic;
        $this->gender         = $gender;
        $this->qc             = $qc;
    }

    /**
     * @return non-empty-string
     */
    public function getSource(): string
    {
        return $this->source;
    }

    /**
     * @return non-empty-string|null
     */
    public function getResult(): ?string
    {
        return $this->result;
    }

    /**
     * @return non-empty-string|null
     */
    public function getResultGenitive(): ?string
    {
        return $this->resultGenitive;
    }

    /**
     * @return non-empty-string|null
     */
    public function getResultDative(): ?string
    {
        return $this->resultDative;
    }

    /**
     * @return non-empty-string|null
     */
    public function getResultAblative(): ?string
    {
        return $this->resultAblative;
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

    public function getGender(): Gender
    {
        return $this->gender;
    }

    public function getQc(): QcFullName
    {
        return $this->qc;
    }
}
