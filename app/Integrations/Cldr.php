<?php

/**
 * This file is part of the "laravel-lang/native-currency-names" project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Andrey Helldar <helldar@dragon-code.pro>
 * @copyright 2023 Laravel Lang Team
 * @license MIT
 *
 * @see https://laravel-lang.com
 */

declare(strict_types=1);

namespace LaravelLang\Dev\Integrations;

use Punic\Currency;
use Punic\Data;

class Cldr extends Integration
{
    public function name(string $locale, string $forLocale): string
    {
        return Currency::getName($this->code($locale), locale: $forLocale);
    }

    public function code(string $locale, bool $asNumeric = false): string|int|null
    {
        $code = Currency::getCurrencyForTerritory(Data::getTerritory($locale));

        return ($asNumeric ? Currency::getNumericCode($code) : $code) ?: null;
    }
}
