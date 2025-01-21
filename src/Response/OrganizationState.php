<?php

/**
 * DaData Client
 *
 * @author Valentin Nazarov <v.nazarov@pos-credit.ru>
 * @copyright Copyright (c) 2024, The Vanta
 */

declare(strict_types=1);

namespace Vanta\Integration\DaData\Response;

final class OrganizationState
{
    private OrganizationStateStatus $status;

    public function __construct(OrganizationStateStatus $status)
    {
        $this->status = $status;
    }

    public function getStatus(): OrganizationStateStatus
    {
        return $this->status;
    }
}
