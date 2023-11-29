<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Validator\Tests;

trait IcuCompatibilityTrait
{
    /**
     * Normalized spaces in date strings generated by INTL for older ICU versions.
     *
     * In version 72.1, ICU started to render a narrow non-breaking space (NNBSP) into localized time strings. This
     * method allows us to write expectations in a forward-compatible manner.
     */
    private static function normalizeIcuSpaces(string $input): string
    {
        if (\defined('INTL_ICU_VERSION') && version_compare(\INTL_ICU_VERSION, '72.1', '>=')) {
            return $input;
        }

        return str_replace("\u{202F}", ' ', $input);
    }
}
