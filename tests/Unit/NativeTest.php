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

use LaravelLang\NativeCurrencyNames\Native;

it('should not be a clone of the English version')
    ->expect(fn () => flatten(Native::get()))
    ->toBeSameCount()
    ->toBe(flatten(sourceLocale('_native')))
    ->not->toBe(flatten(sourceLocale('en')))
    ->not->toBeEmpty();
