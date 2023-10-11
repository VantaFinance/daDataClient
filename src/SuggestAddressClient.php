<?php
/**
 * DaData Client
 *
 * @author Vlad Shashkov <v.shashkov@pos-credit.ru>
 * @copyright Copyright (c) 2023, The Vanta
 */

declare(strict_types=1);

namespace Vanta\Integration\DaData;

use Psr\Http\Client\ClientExceptionInterface as ClientException;
use Symfony\Component\Uid\AbstractUid as Uid;
use Vanta\Integration\DaData\Response\SuggestAddress;

interface SuggestAddressClient
{
    /**
     * @param positive-int     $count
     * @param non-empty-string $query
     *
     * @return array<int, SuggestAddress>
     *
     * @throws ClientException
     */
    public function findByText(string $query, int $count = 1): array;

    /**
     * @return array<int, SuggestAddress>
     *
     * @throws ClientException
     */
    public function findByFiasId(Uid $id): array;
}
