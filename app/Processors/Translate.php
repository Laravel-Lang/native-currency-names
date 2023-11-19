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

use LaravelLang\Dev\Integrations\Cldr;
use LaravelLang\Dev\Integrations\Integration;
use Symfony\Component\Console\Output\OutputInterface;

class Translate extends Processor
{
    protected string $localeFile = __DIR__ . '/../../locales/%s/json.json';

    public function __construct(
        OutputInterface $output,
        protected Integration $translator = new Cldr()
    ) {
        parent::__construct($output);
    }

    public function handle(): void
    {
        $this->output->writeln('Translating the source file...');
        $this->translateSource();

        $this->output->writeln('Translating locales...');
        $this->translateLocales($this->locales());
    }

    protected function translateSource(): void
    {
        $this->process($this->locales(), $this->sourceFile, 'en');
    }

    protected function translateLocales(array $locales): void
    {
        foreach ($locales as $locale) {
            $this->output->writeln('    ' . $locale . '...');

            $this->process($locales, $this->localeFile($locale), $locale);
        }
    }

    protected function process(array $available, string $path, string $locale): void
    {
        $values = $this->load($path);

        foreach ($available as $key) {
            if ($currency = $this->translator->get($key, $locale)) {
                $values[$key . '.locale']    = $currency->locale;
                $values[$key . '.country']   = $currency->country;
                $values[$key . '.code']      = $currency->code;
                $values[$key . '.numeric']   = $currency->numeric;
                $values[$key . '.name']      = $currency->name;
                $values[$key . '.native']    = $currency->native;
                $values[$key . '.localized'] = $currency->localized;
            }
        }

        $this->store($path, $values);
    }

    protected function localeFile(string $locale): string
    {
        return sprintf($this->localeFile, $locale);
    }
}
