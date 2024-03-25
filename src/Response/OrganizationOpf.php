<?php
/**
 * DaData Client
 *
 * @author Valentin Nazarov <v.nazarov@pos-credit.ru>
 * @copyright Copyright (c) 2024, The Vanta
 */

declare(strict_types=1);

namespace Vanta\Integration\DaData\Response;

final class OrganizationOpf
{
    /**
     * @var numeric-string
     */
    private string $type;

    /**
     * @var numeric-string
     */
    private string $code;

    /**
     * @var non-empty-string
     */
    private string $short;

    /**
     * @var non-empty-string
     */
    private string $full;

    /**
     * @param numeric-string $type
     * @param numeric-string $code
     * @param non-empty-string $short
     * @param non-empty-string $full
     */
    public function __construct(string $type, string $code, string $short, string $full)
    {
        $this->type  = $type;
        $this->code  = $code;
        $this->short = $short;
        $this->full  = $full;
    }
}
