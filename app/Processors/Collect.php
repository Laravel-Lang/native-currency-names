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

namespace LaravelLang\Dev\Processors;

use LaravelLang\NativeCurrencyNames\Native;

class Collect extends Processor
{
    protected string $targetFile = __DIR__ . '/../../locales/_native/json.json';

    public function handle(): void
    {
        $this->output->writeln('Collecting locales...');
        $collection = $this->compile();

        $this->output->writeln('Store to file...');
        $this->store($this->targetFile, $collection);
    }

    protected function compile(): array
    {
        $result = [];

        foreach ($this->locales() as $locale) {
            $currency = Native::get($locale);

            $result[$locale . '.locale']    = $currency[$locale . '.locale'];
            $result[$locale . '.country']   = $currency[$locale . '.country'];
            $result[$locale . '.code']      = $currency[$locale . '.code'];
            $result[$locale . '.numeric']   = $currency[$locale . '.numeric'];
            $result[$locale . '.name']      = $currency[$locale . '.name'];
            $result[$locale . '.native']    = $currency[$locale . '.native'];
            $result[$locale . '.localized'] = $currency[$locale . '.localized'];
        }

        return $result;
    }
}
