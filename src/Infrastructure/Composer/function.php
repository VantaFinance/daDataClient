<?php
/**
 * DaData Client
 *
 * @author Vlad Shashkov <v.shashkov@pos-credit.ru>
 * @copyright Copyright (c) 2023, The Vanta
 */

declare(strict_types=1);

namespace Vanta\Integration\DaData\Infrastructure\Composer;

use Composer\InstalledVersions;
use Composer\Semver\Comparator;

/**
 * @internal
 *
 * @param non-empty-string $package
 * @param non-empty-string $version
 */
function isOldPackage(string $package, string $version): bool
{
    $packageVersion = InstalledVersions::getVersion($package);

    if (null == $packageVersion) {
        throw new \RuntimeException(sprintf('Not found version package: %s', $package));
    }

    return Comparator::greaterThan($version, $packageVersion);
}
