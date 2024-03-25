<?php
/**
 * DaData Client
 *
 * @author Valentin Nazarov <v.nazarov@pos-credit.ru>
 * @copyright Copyright (c) 2024, The Vanta
 */

declare(strict_types=1);

namespace Vanta\Integration\DaData;

use Psr\Http\Client\ClientExceptionInterface as ClientException;
use Vanta\Integration\DaData\Response\SuggestOrganization;

interface SuggestOrganizationClient
{
    /**
     * @param numeric-string $inn 10 or 12 or digits
     *
     * @return array<int, SuggestOrganization>
     *
     * @throws ClientException
     */
    public function findByInn(string $inn): array;
}
