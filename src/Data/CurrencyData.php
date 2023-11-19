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

namespace LaravelLang\NativeCurrencyNames\Data;

class CurrencyData
{
    public function __construct(
        public string $locale,
        public string $country,
        public string $code,
        public ?int $numeric,
        public string $name,
        public string $native,
        public string $localized
    ) {}
}
