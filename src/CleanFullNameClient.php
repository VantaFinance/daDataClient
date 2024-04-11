<?php

declare(strict_types=1);

namespace Vanta\Integration\DaData;

use Psr\Http\Client\ClientExceptionInterface as ClientException;
use Vanta\Integration\DaData\Response\CleanedFullName;

interface CleanFullNameClient
{
    /**
     * @param non-empty-string $fullName - surname, name, patronymic
     *
     * @return list<CleanedFullName>
     *
     * @throws ClientException
     */
    public function clean(string $fullName): array;
}
