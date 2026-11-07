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

use LaravelLang\NativeCurrencyNames\Services\Filesystem;

beforeEach(function () {
    $this->dir = sys_get_temp_dir() . '/native-currency-names-' . bin2hex(random_bytes(6));
});

afterEach(function () {
    foreach (glob($this->dir . '/{*/*,*}', GLOB_BRACE) ?: [] as $path) {
        is_file($path) && unlink($path);
    }

    is_dir($this->dir . '/nested') && rmdir($this->dir . '/nested');
    is_dir($this->dir) && rmdir($this->dir);
});

test('load returns an empty array when the file does not exist', function () {
    expect(Filesystem::load($this->dir . '/missing.json'))->toBe([]);
});

test('load returns an empty array for a directory', function () {
    mkdir($this->dir);

    expect(Filesystem::load($this->dir))->toBe([]);
});

test('load throws on invalid json', function () {
    mkdir($this->dir);
    file_put_contents($this->dir . '/broken.json', '{"foo":');

    Filesystem::load($this->dir . '/broken.json');
})->throws(JsonException::class);

test('store creates missing directories and appends a trailing newline', function () {
    $path = $this->dir . '/nested/en.json';

    Filesystem::store($path, ['foo' => 'bar']);

    expect(file_get_contents($path))->toBe('{"foo":"bar"}' . PHP_EOL);
});

test('store keeps unicode and slashes unescaped and round-trips', function () {
    $path   = $this->dir . '/ru.json';
    $values = ['RUB' => ['native' => 'российский рубль', 'url' => 'a/b']];

    mkdir($this->dir);
    Filesystem::store($path, $values);

    expect(file_get_contents($path))->toContain('российский рубль')->toContain('a/b')
        ->and(Filesystem::load($path))->toBe($values);
});

test('store overwrites an existing file', function () {
    $path = $this->dir . '/en.json';

    mkdir($this->dir);
    Filesystem::store($path, ['a' => 1]);
    Filesystem::store($path, ['b' => 2]);

    expect(Filesystem::load($path))->toBe(['b' => 2]);
});
