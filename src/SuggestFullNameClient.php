<?php

declare(strict_types=1);

namespace Vanta\Integration\DaData;

use Psr\Http\Client\ClientExceptionInterface as ClientException;
use Vanta\Integration\DaData\Request\SuggestFullName as SuggestFullNameRequest;
use Vanta\Integration\DaData\Response\SuggestFullName as SuggestFullNameResponse;

interface SuggestFullNameClient
{
    /**
     * @return list<SuggestFullNameResponse>
     *
     * @throws ClientException
     */
    public function findByFullName(SuggestFullNameRequest $suggestFullName): array;
}
