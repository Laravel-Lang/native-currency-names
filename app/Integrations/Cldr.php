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

use LaravelLang\NativeCurrencyNames\Data\CurrencyData;
use Punic\Currency as PunicCurrency;
use Punic\Data;

class Cldr extends Integration
{
    public function get(string $locale, string $forLocale): ?CurrencyData
    {
        return $this->find($locale, $forLocale);
    }

    protected function find(string $locale, string $forLocale): CurrencyData
    {
        $territoryCode = Data::getTerritory($locale);
        $code          = PunicCurrency::getCurrencyForTerritory($territoryCode);

        return new CurrencyData(
            locale   : $locale,
            country  : $territoryCode,
            code     : $code,
            numeric  : (int) PunicCurrency::getNumericCode($code),
            name     : PunicCurrency::getName($code, locale: 'en'),
            native   : PunicCurrency::getName($code, locale: $locale),
            localized: PunicCurrency::getName($code, locale: $forLocale)
        );
    }
}
