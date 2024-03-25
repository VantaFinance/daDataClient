<?php
/**
 * DaData Client
 *
 * @author Valentin Nazarov <v.nazarov@pos-credit.ru>
 * @copyright Copyright (c) 2024, The Vanta
 */

declare(strict_types=1);

namespace Vanta\Integration\DaData\Response;

final class OrganizationName
{
    /**
     * @var non-empty-string
     */
    private string $full;

    /**
     * @var non-empty-string
     */
    private string $fullWithOpf;

    /**
     * @var ?non-empty-string
     */
    private ?string $short;

    /**
     * @var ?non-empty-string
     */
    private ?string $shortWithOpf;

    /**
     * @var ?non-empty-string
     */
    private ?string $latin;

    /**
     * @param non-empty-string $full
     * @param non-empty-string $fullWithOpf
     * @param ?non-empty-string $short
     * @param ?non-empty-string $shortWithOpf
     * @param ?non-empty-string $latin
     */
    public function __construct(string $full, string $fullWithOpf, ?string $short, ?string $shortWithOpf, ?string $latin)
    {
        $this->full         = $full;
        $this->fullWithOpf  = $fullWithOpf;
        $this->short        = $short;
        $this->shortWithOpf = $shortWithOpf;
        $this->latin        = $latin;
    }
}
