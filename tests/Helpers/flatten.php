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

use DragonCode\Support\Facades\Helpers\Arr;
use LaravelLang\NativeCurrencyNames\Data\CurrencyData;

function flatten(array $items): array
{
    return Arr::of($items)
        ->renameKeys(fn (int|string $key, CurrencyData $data) => is_string($key) ? $key : $data->locale)
        ->map(fn (CurrencyData $data) => $data->localized)
        ->toArray();
}
