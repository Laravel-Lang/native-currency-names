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

namespace LaravelLang\Dev\Processors;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use LaravelLang\Dev\Services\Process;

class Cldr extends Processor
{
    protected array $notSupported = [
        'tl',
    ];

    public function handle(): void
    {
        Process::run($this->output, ['php', 'vendor/bin/punic-data', '-l', $this->toInstall()]);
    }

    protected function toInstall(): string
    {
        return collect(parent::locales())
            ->map(fn (string $locale): array => [
                $locale,
                Str::before($locale, '_'),
            ])
            ->flatten()
            ->unique()
            ->when($this->notSupported, fn (Collection $items, array $except) => $items->filter(
                fn (string $locale): bool => ! in_array($locale, $except, true)
            ))
            ->filter(fn (string $locale): bool => ! Str::contains($locale, ['-', '_']))
            ->sort()
            ->map(fn (string $locale): string => '+' . $locale)
            ->implode(',');
    }
}
