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

    return parsePackageVersion($packageVersion)->isOld(parsePackageVersion($version));
}

/**
 * @internal
 *
 * @psalm-suppress ArgumentTypeCoercion
 *
 * @param non-empty-string $version
 */
function parsePackageVersion(string $version): Version
{
    $matches = [];

    preg_match('/^(?<major>\d*).(?<minor>\d*)/m', $version, $matches);

    if ([] == $matches) {
        throw new \RuntimeException('Not found version package');
    }

    [ 'major' => $major , 'minor' => $minor] = $matches;

    return new Version($major, $minor);
}

/**
 * @psalm-immutable
 *
 * @internal
 */
final class Version
{
    /**
     * @var numeric-string
     */
    private string $major;

    /**
     * @var numeric-string
     */
    private string $minor;

    /**
     * @param numeric-string $major
     * @param numeric-string $minor
     */
    public function __construct(string $major, string $minor)
    {
        $this->major = $major;
        $this->minor = $minor;
    }

    /**
     * @return numeric-string
     */
    public function getMajor(): string
    {
        return $this->major;
    }

    /**
     * @return numeric-string
     */
    public function getMinor(): string
    {
        return $this->minor;
    }

    public function isOld(self $version): bool
    {
        return $this->major < $version->getMajor() && $this->minor <=> $version->getMinor();
    }
}
