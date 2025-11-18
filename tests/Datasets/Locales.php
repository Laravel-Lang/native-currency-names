<?php

/**
 * This file is part of the "laravel-lang/native-currency-names" project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Andrey Helldar <helldar@dragon-code.pro>
 * @copyright 2024 Laravel Lang Team
 * @license MIT
 *
 * @see https://laravel-lang.com
 */

declare(strict_types=1);

use LaravelLang\LocaleList\Locale;

dataset('locales-string', fn (): array => Locale::values());
dataset('locales-enum', fn (): array => Locale::cases());
dataset('locales-incorrect', ['foo', 'bar', 'baz']);
dataset('locales-empty', ['', null]);
