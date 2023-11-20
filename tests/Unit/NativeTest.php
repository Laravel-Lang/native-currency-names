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

use LaravelLang\LocaleList\Locale;
use LaravelLang\NativeCurrencyNames\CurrencyNames;
use LaravelLang\NativeCurrencyNames\Data\CurrencyData;
use LaravelLang\NativeCurrencyNames\Enums\SortBy;

it('should not be a clone of the English version')
    ->expect(fn () => CurrencyNames::get())
    ->toBeSameCount()
    ->toBeLocale('_native')
    ->not->toBeLocale('en')
    ->not->toBeEmpty()
    ->each->toBeInstanceOf(CurrencyData::class);

it('must check the coincidence of the native and translated values')
    ->expect(fn () => CurrencyNames::get())
    ->toBeSameCount()
    ->each->toBeSameNames()->toBeInstanceOf(CurrencyData::class);

it('should check the returned list in French')
    ->expect(fn () => flatten(CurrencyNames::get(Locale::French, SortBy::Key)))
    ->toBe([
        'af' => [
            'code'      => 'ZAR',
            'numeric'   => 710,
            'native'    => 'Suid-Afrikaanse rand',
            'localized' => 'rand sud-africain',
        ],
        'ar' => [
            'code'      => 'EGP',
            'numeric'   => 818,
            'native'    => 'جنيه مصري',
            'localized' => 'livre égyptienne',
        ],
        'az' => [
            'code'      => 'AZN',
            'numeric'   => 944,
            'native'    => 'Azərbaycan Manatı',
            'localized' => 'manat azéri',
        ],
        'be' => [
            'code'      => 'BYN',
            'numeric'   => null,
            'native'    => 'беларускі рубель',
            'localized' => 'rouble biélorusse',
        ],
        'bg' => [
            'code'      => 'BGN',
            'numeric'   => 975,
            'native'    => 'Български лев',
            'localized' => 'lev bulgare',
        ],
        'bn' => [
            'code'      => 'BDT',
            'numeric'   => 50,
            'native'    => 'বাংলাদেশী টাকা',
            'localized' => 'taka bangladeshi',
        ],
        'bs' => [
            'code'      => 'BAM',
            'numeric'   => 977,
            'native'    => 'Bosanskohercegovačka konvertibilna marka',
            'localized' => 'mark convertible bosniaque',
        ],
        'ca' => [
            'code'      => 'EUR',
            'numeric'   => 978,
            'native'    => 'euro',
            'localized' => 'euro',
        ],
        'cs' => [
            'code'      => 'CZK',
            'numeric'   => 203,
            'native'    => 'česká koruna',
            'localized' => 'couronne tchèque',
        ],
        'cy' => [
            'code'      => 'GBP',
            'numeric'   => 826,
            'native'    => 'Punt Prydain',
            'localized' => 'livre sterling',
        ],
        'da' => [
            'code'      => 'DKK',
            'numeric'   => 208,
            'native'    => 'dansk krone',
            'localized' => 'couronne danoise',
        ],
        'de' => [
            'code'      => 'EUR',
            'numeric'   => 978,
            'native'    => 'Euro',
            'localized' => 'euro',
        ],
        'de_CH' => [
            'code'      => 'CHF',
            'numeric'   => 756,
            'native'    => 'Schweizer Franken',
            'localized' => 'franc suisse',
        ],
        'el' => [
            'code'      => 'EUR',
            'numeric'   => 978,
            'native'    => 'Ευρώ',
            'localized' => 'euro',
        ],
        'en' => [
            'code'      => 'USD',
            'numeric'   => 840,
            'native'    => 'US Dollar',
            'localized' => 'dollar des États-Unis',
        ],
        'es' => [
            'code'      => 'EUR',
            'numeric'   => 978,
            'native'    => 'euro',
            'localized' => 'euro',
        ],
        'et' => [
            'code'      => 'EUR',
            'numeric'   => 978,
            'native'    => 'euro',
            'localized' => 'euro',
        ],
        'eu' => [
            'code'      => 'EUR',
            'numeric'   => 978,
            'native'    => 'euroa',
            'localized' => 'euro',
        ],
        'fa' => [
            'code'      => 'IRR',
            'numeric'   => 364,
            'native'    => 'ریال ایران',
            'localized' => 'riyal iranien',
        ],
        'fi' => [
            'code'      => 'EUR',
            'numeric'   => 978,
            'native'    => 'euro',
            'localized' => 'euro',
        ],
        'fil' => [
            'code'      => 'PHP',
            'numeric'   => 608,
            'native'    => 'Piso ng Pilipinas',
            'localized' => 'peso philippin',
        ],
        'fr' => [
            'code'      => 'EUR',
            'numeric'   => 978,
            'native'    => 'euro',
            'localized' => 'euro',
        ],
        'gl' => [
            'code'      => 'EUR',
            'numeric'   => 978,
            'native'    => 'euro',
            'localized' => 'euro',
        ],
        'gu' => [
            'code'      => 'INR',
            'numeric'   => 356,
            'native'    => 'ભારતીય રૂપિયા',
            'localized' => 'roupie indienne',
        ],
        'he' => [
            'code'      => 'ILS',
            'numeric'   => 376,
            'native'    => 'שקל חדש',
            'localized' => 'nouveau shekel israélien',
        ],
        'hi' => [
            'code'      => 'INR',
            'numeric'   => 356,
            'native'    => 'भारतीय रुपया',
            'localized' => 'roupie indienne',
        ],
        'hr' => [
            'code'      => 'EUR',
            'numeric'   => 978,
            'native'    => 'euro',
            'localized' => 'euro',
        ],
        'hu' => [
            'code'      => 'HUF',
            'numeric'   => 348,
            'native'    => 'magyar forint',
            'localized' => 'forint hongrois',
        ],
        'hy' => [
            'code'      => 'AMD',
            'numeric'   => 51,
            'native'    => 'հայկական դրամ',
            'localized' => 'dram arménien',
        ],
        'id' => [
            'code'      => 'IDR',
            'numeric'   => 360,
            'native'    => 'Rupiah Indonesia',
            'localized' => 'roupie indonésienne',
        ],
        'is' => [
            'code'      => 'ISK',
            'numeric'   => 352,
            'native'    => 'íslensk króna',
            'localized' => 'couronne islandaise',
        ],
        'it' => [
            'code'      => 'EUR',
            'numeric'   => 978,
            'native'    => 'euro',
            'localized' => 'euro',
        ],
        'ja' => [
            'code'      => 'JPY',
            'numeric'   => 392,
            'native'    => '日本円',
            'localized' => 'yen japonais',
        ],
        'ka' => [
            'code'      => 'GEL',
            'numeric'   => 981,
            'native'    => 'ქართული ლარი',
            'localized' => 'lari géorgien',
        ],
        'kk' => [
            'code'      => 'KZT',
            'numeric'   => 398,
            'native'    => 'Қазақстан теңгесі',
            'localized' => 'tenge kazakh',
        ],
        'km' => [
            'code'      => 'KHR',
            'numeric'   => 116,
            'native'    => 'រៀល​កម្ពុជា',
            'localized' => 'riel cambodgien',
        ],
        'kn' => [
            'code'      => 'INR',
            'numeric'   => 356,
            'native'    => 'ಭಾರತೀಯ ರೂಪಾಯಿ',
            'localized' => 'roupie indienne',
        ],
        'ko' => [
            'code'      => 'KRW',
            'numeric'   => 410,
            'native'    => '대한민국 원',
            'localized' => 'won sud-coréen',
        ],
        'lt' => [
            'code'      => 'EUR',
            'numeric'   => 978,
            'native'    => 'Euras',
            'localized' => 'euro',
        ],
        'lv' => [
            'code'      => 'EUR',
            'numeric'   => 978,
            'native'    => 'eiro',
            'localized' => 'euro',
        ],
        'mk' => [
            'code'      => 'MKD',
            'numeric'   => 807,
            'native'    => 'Македонски денар',
            'localized' => 'denar macédonien',
        ],
        'mn' => [
            'code'      => 'MNT',
            'numeric'   => 496,
            'native'    => 'Монгол төгрөг',
            'localized' => 'tugrik mongol',
        ],
        'mr' => [
            'code'      => 'INR',
            'numeric'   => 356,
            'native'    => 'भारतीय रुपया',
            'localized' => 'roupie indienne',
        ],
        'ms' => [
            'code'      => 'MYR',
            'numeric'   => 458,
            'native'    => 'Ringgit Malaysia',
            'localized' => 'ringgit malais',
        ],
        'nb' => [
            'code'      => 'NOK',
            'numeric'   => 578,
            'native'    => 'norske kroner',
            'localized' => 'couronne norvégienne',
        ],
        'ne' => [
            'code'      => 'NPR',
            'numeric'   => 524,
            'native'    => 'नेपाली रूपैयाँ',
            'localized' => 'roupie népalaise',
        ],
        'nl' => [
            'code'      => 'EUR',
            'numeric'   => 978,
            'native'    => 'Euro',
            'localized' => 'euro',
        ],
        'nn' => [
            'code'      => 'NOK',
            'numeric'   => 578,
            'native'    => 'norske kroner',
            'localized' => 'couronne norvégienne',
        ],
        'oc' => [
            'code'      => 'EUR',
            'numeric'   => 978,
            'native'    => 'EUR',
            'localized' => 'euro',
        ],
        'pl' => [
            'code'      => 'PLN',
            'numeric'   => 985,
            'native'    => 'złoty polski',
            'localized' => 'zloty polonais',
        ],
        'ps' => [
            'code'      => 'AFN',
            'numeric'   => 971,
            'native'    => 'افغانۍ',
            'localized' => 'afghani afghan',
        ],
        'pt' => [
            'code'      => 'BRL',
            'numeric'   => 986,
            'native'    => 'Real brasileiro',
            'localized' => 'réal brésilien',
        ],
        'pt_BR' => [
            'code'      => 'BRL',
            'numeric'   => 986,
            'native'    => 'Real brasileiro',
            'localized' => 'réal brésilien',
        ],
        'ro' => [
            'code'      => 'RON',
            'numeric'   => 946,
            'native'    => 'leu românesc',
            'localized' => 'leu roumain',
        ],
        'ru' => [
            'code'      => 'RUB',
            'numeric'   => 643,
            'native'    => 'российский рубль',
            'localized' => 'rouble russe',
        ],
        'sc' => [
            'code'      => 'EUR',
            'numeric'   => 978,
            'native'    => 'èuro',
            'localized' => 'euro',
        ],
        'si' => [
            'code'      => 'LKR',
            'numeric'   => 144,
            'native'    => 'ශ්‍රී ලංකා රුපියල',
            'localized' => 'roupie srilankaise',
        ],
        'sk' => [
            'code'      => 'EUR',
            'numeric'   => 978,
            'native'    => 'euro',
            'localized' => 'euro',
        ],
        'sl' => [
            'code'      => 'EUR',
            'numeric'   => 978,
            'native'    => 'evro',
            'localized' => 'euro',
        ],
        'sq' => [
            'code'      => 'ALL',
            'numeric'   => 8,
            'native'    => 'Leku shqiptar',
            'localized' => 'lek albanais',
        ],
        'sr_Cyrl' => [
            'code'      => 'RSD',
            'numeric'   => 941,
            'native'    => 'српски динар',
            'localized' => 'dinar serbe',
        ],
        'sr_Latn' => [
            'code'      => 'RSD',
            'numeric'   => 941,
            'native'    => 'srpski dinar',
            'localized' => 'dinar serbe',
        ],
        'sr_Latn_ME' => [
            'code'      => 'EUR',
            'numeric'   => 978,
            'native'    => 'Evro',
            'localized' => 'euro',
        ],
        'sv' => [
            'code'      => 'SEK',
            'numeric'   => 752,
            'native'    => 'svensk krona',
            'localized' => 'couronne suédoise',
        ],
        'sw' => [
            'code'      => 'TZS',
            'numeric'   => 834,
            'native'    => 'Shilingi ya Tanzania',
            'localized' => 'shilling tanzanien',
        ],
        'tg' => [
            'code'      => 'TJS',
            'numeric'   => 972,
            'native'    => 'Сомонӣ',
            'localized' => 'somoni tadjik',
        ],
        'th' => [
            'code'      => 'THB',
            'numeric'   => 764,
            'native'    => 'บาท',
            'localized' => 'baht thaïlandais',
        ],
        'tk' => [
            'code'      => 'TMT',
            'numeric'   => 934,
            'native'    => 'Türkmen manady',
            'localized' => 'nouveau manat turkmène',
        ],
        'tl' => [
            'code'      => 'PHP',
            'numeric'   => 608,
            'native'    => 'Philippine Peso',
            'localized' => 'peso philippin',
        ],
        'tr' => [
            'code'      => 'TRY',
            'numeric'   => 949,
            'native'    => 'Türk Lirası',
            'localized' => 'livre turque',
        ],
        'ug' => [
            'code'      => 'CNY',
            'numeric'   => 156,
            'native'    => 'جۇڭگو يۈەنى',
            'localized' => 'yuan renminbi chinois',
        ],
        'uk' => [
            'code'      => 'UAH',
            'numeric'   => 980,
            'native'    => 'українська гривня',
            'localized' => 'hryvnia ukrainienne',
        ],
        'ur' => [
            'code'      => 'PKR',
            'numeric'   => 586,
            'native'    => 'پاکستانی روپیہ',
            'localized' => 'roupie pakistanaise',
        ],
        'uz_Cyrl' => [
            'code'      => 'UZS',
            'numeric'   => 860,
            'native'    => 'Ўзбекистон сўм',
            'localized' => 'sum ouzbek',
        ],
        'uz_Latn' => [
            'code'      => 'UZS',
            'numeric'   => 860,
            'native'    => 'O‘zbekiston so‘mi',
            'localized' => 'sum ouzbek',
        ],
        'vi' => [
            'code'      => 'VND',
            'numeric'   => 704,
            'native'    => 'Đồng Việt Nam',
            'localized' => 'dông vietnamien',
        ],
        'zh_CN' => [
            'code'      => 'CNY',
            'numeric'   => 156,
            'native'    => '人民币',
            'localized' => 'yuan renminbi chinois',
        ],
        'zh_HK' => [
            'code'      => 'HKD',
            'numeric'   => 344,
            'native'    => '港元',
            'localized' => 'dollar de Hong Kong',
        ],
        'zh_TW' => [
            'code'      => 'TWD',
            'numeric'   => 901,
            'native'    => '新台币',
            'localized' => 'nouveau dollar taïwanais',
        ],
    ]);

it('should check the returned list in Ukrainian')
    ->expect(fn () => flatten(CurrencyNames::get(Locale::Ukrainian, SortBy::Key)))
    ->toBe([
        'af' => [
            'code'      => 'ZAR',
            'numeric'   => 710,
            'native'    => 'Suid-Afrikaanse rand',
            'localized' => 'південноафриканський ранд',
        ],
        'ar' => [
            'code'      => 'EGP',
            'numeric'   => 818,
            'native'    => 'جنيه مصري',
            'localized' => 'єгипетський фунт',
        ],
        'az' => [
            'code'      => 'AZN',
            'numeric'   => 944,
            'native'    => 'Azərbaycan Manatı',
            'localized' => 'азербайджанський манат',
        ],
        'be' => [
            'code'      => 'BYN',
            'numeric'   => null,
            'native'    => 'беларускі рубель',
            'localized' => 'білоруський рубль',
        ],
        'bg' => [
            'code'      => 'BGN',
            'numeric'   => 975,
            'native'    => 'Български лев',
            'localized' => 'болгарський лев',
        ],
        'bn' => [
            'code'      => 'BDT',
            'numeric'   => 50,
            'native'    => 'বাংলাদেশী টাকা',
            'localized' => 'бангладеська така',
        ],
        'bs' => [
            'code'      => 'BAM',
            'numeric'   => 977,
            'native'    => 'Bosanskohercegovačka konvertibilna marka',
            'localized' => 'конвертована марка Боснії і Герцеговини',
        ],
        'ca' => [
            'code'      => 'EUR',
            'numeric'   => 978,
            'native'    => 'euro',
            'localized' => 'євро',
        ],
        'cs' => [
            'code'      => 'CZK',
            'numeric'   => 203,
            'native'    => 'česká koruna',
            'localized' => 'чеська крона',
        ],
        'cy' => [
            'code'      => 'GBP',
            'numeric'   => 826,
            'native'    => 'Punt Prydain',
            'localized' => 'англійський фунт',
        ],
        'da' => [
            'code'      => 'DKK',
            'numeric'   => 208,
            'native'    => 'dansk krone',
            'localized' => 'данська крона',
        ],
        'de' => [
            'code'      => 'EUR',
            'numeric'   => 978,
            'native'    => 'Euro',
            'localized' => 'євро',
        ],
        'de_CH' => [
            'code'      => 'CHF',
            'numeric'   => 756,
            'native'    => 'Schweizer Franken',
            'localized' => 'швейцарський франк',
        ],
        'el' => [
            'code'      => 'EUR',
            'numeric'   => 978,
            'native'    => 'Ευρώ',
            'localized' => 'євро',
        ],
        'en' => [
            'code'      => 'USD',
            'numeric'   => 840,
            'native'    => 'US Dollar',
            'localized' => 'долар США',
        ],
        'es' => [
            'code'      => 'EUR',
            'numeric'   => 978,
            'native'    => 'euro',
            'localized' => 'євро',
        ],
        'et' => [
            'code'      => 'EUR',
            'numeric'   => 978,
            'native'    => 'euro',
            'localized' => 'євро',
        ],
        'eu' => [
            'code'      => 'EUR',
            'numeric'   => 978,
            'native'    => 'euroa',
            'localized' => 'євро',
        ],
        'fa' => [
            'code'      => 'IRR',
            'numeric'   => 364,
            'native'    => 'ریال ایران',
            'localized' => 'іранський ріал',
        ],
        'fi' => [
            'code'      => 'EUR',
            'numeric'   => 978,
            'native'    => 'euro',
            'localized' => 'євро',
        ],
        'fil' => [
            'code'      => 'PHP',
            'numeric'   => 608,
            'native'    => 'Piso ng Pilipinas',
            'localized' => 'філіппінський песо',
        ],
        'fr' => [
            'code'      => 'EUR',
            'numeric'   => 978,
            'native'    => 'euro',
            'localized' => 'євро',
        ],
        'gl' => [
            'code'      => 'EUR',
            'numeric'   => 978,
            'native'    => 'euro',
            'localized' => 'євро',
        ],
        'gu' => [
            'code'      => 'INR',
            'numeric'   => 356,
            'native'    => 'ભારતીય રૂપિયા',
            'localized' => 'індійська рупія',
        ],
        'he' => [
            'code'      => 'ILS',
            'numeric'   => 376,
            'native'    => 'שקל חדש',
            'localized' => 'ізраїльський новий шекель',
        ],
        'hi' => [
            'code'      => 'INR',
            'numeric'   => 356,
            'native'    => 'भारतीय रुपया',
            'localized' => 'індійська рупія',
        ],
        'hr' => [
            'code'      => 'EUR',
            'numeric'   => 978,
            'native'    => 'euro',
            'localized' => 'євро',
        ],
        'hu' => [
            'code'      => 'HUF',
            'numeric'   => 348,
            'native'    => 'magyar forint',
            'localized' => 'угорський форинт',
        ],
        'hy' => [
            'code'      => 'AMD',
            'numeric'   => 51,
            'native'    => 'հայկական դրամ',
            'localized' => 'вірменський драм',
        ],
        'id' => [
            'code'      => 'IDR',
            'numeric'   => 360,
            'native'    => 'Rupiah Indonesia',
            'localized' => 'індонезійська рупія',
        ],
        'is' => [
            'code'      => 'ISK',
            'numeric'   => 352,
            'native'    => 'íslensk króna',
            'localized' => 'ісландська крона',
        ],
        'it' => [
            'code'      => 'EUR',
            'numeric'   => 978,
            'native'    => 'euro',
            'localized' => 'євро',
        ],
        'ja' => [
            'code'      => 'JPY',
            'numeric'   => 392,
            'native'    => '日本円',
            'localized' => 'японська єна',
        ],
        'ka' => [
            'code'      => 'GEL',
            'numeric'   => 981,
            'native'    => 'ქართული ლარი',
            'localized' => 'грузинський ларі',
        ],
        'kk' => [
            'code'      => 'KZT',
            'numeric'   => 398,
            'native'    => 'Қазақстан теңгесі',
            'localized' => 'казахстанський тенге',
        ],
        'km' => [
            'code'      => 'KHR',
            'numeric'   => 116,
            'native'    => 'រៀល​កម្ពុជា',
            'localized' => 'камбоджійський рієль',
        ],
        'kn' => [
            'code'      => 'INR',
            'numeric'   => 356,
            'native'    => 'ಭಾರತೀಯ ರೂಪಾಯಿ',
            'localized' => 'індійська рупія',
        ],
        'ko' => [
            'code'      => 'KRW',
            'numeric'   => 410,
            'native'    => '대한민국 원',
            'localized' => 'південнокорейський вон',
        ],
        'lt' => [
            'code'      => 'EUR',
            'numeric'   => 978,
            'native'    => 'Euras',
            'localized' => 'євро',
        ],
        'lv' => [
            'code'      => 'EUR',
            'numeric'   => 978,
            'native'    => 'eiro',
            'localized' => 'євро',
        ],
        'mk' => [
            'code'      => 'MKD',
            'numeric'   => 807,
            'native'    => 'Македонски денар',
            'localized' => 'македонський денар',
        ],
        'mn' => [
            'code'      => 'MNT',
            'numeric'   => 496,
            'native'    => 'Монгол төгрөг',
            'localized' => 'монгольський тугрик',
        ],
        'mr' => [
            'code'      => 'INR',
            'numeric'   => 356,
            'native'    => 'भारतीय रुपया',
            'localized' => 'індійська рупія',
        ],
        'ms' => [
            'code'      => 'MYR',
            'numeric'   => 458,
            'native'    => 'Ringgit Malaysia',
            'localized' => 'малайзійський рингіт',
        ],
        'nb' => [
            'code'      => 'NOK',
            'numeric'   => 578,
            'native'    => 'norske kroner',
            'localized' => 'норвезька крона',
        ],
        'ne' => [
            'code'      => 'NPR',
            'numeric'   => 524,
            'native'    => 'नेपाली रूपैयाँ',
            'localized' => 'непальська рупія',
        ],
        'nl' => [
            'code'      => 'EUR',
            'numeric'   => 978,
            'native'    => 'Euro',
            'localized' => 'євро',
        ],
        'nn' => [
            'code'      => 'NOK',
            'numeric'   => 578,
            'native'    => 'norske kroner',
            'localized' => 'норвезька крона',
        ],
        'oc' => [
            'code'      => 'EUR',
            'numeric'   => 978,
            'native'    => 'EUR',
            'localized' => 'євро',
        ],
        'pl' => [
            'code'      => 'PLN',
            'numeric'   => 985,
            'native'    => 'złoty polski',
            'localized' => 'польський злотий',
        ],
        'ps' => [
            'code'      => 'AFN',
            'numeric'   => 971,
            'native'    => 'افغانۍ',
            'localized' => 'афганський афгані',
        ],
        'pt' => [
            'code'      => 'BRL',
            'numeric'   => 986,
            'native'    => 'Real brasileiro',
            'localized' => 'бразильський реал',
        ],
        'pt_BR' => [
            'code'      => 'BRL',
            'numeric'   => 986,
            'native'    => 'Real brasileiro',
            'localized' => 'бразильський реал',
        ],
        'ro' => [
            'code'      => 'RON',
            'numeric'   => 946,
            'native'    => 'leu românesc',
            'localized' => 'румунський лей',
        ],
        'ru' => [
            'code'      => 'RUB',
            'numeric'   => 643,
            'native'    => 'российский рубль',
            'localized' => 'російський рубль',
        ],
        'sc' => [
            'code'      => 'EUR',
            'numeric'   => 978,
            'native'    => 'èuro',
            'localized' => 'євро',
        ],
        'si' => [
            'code'      => 'LKR',
            'numeric'   => 144,
            'native'    => 'ශ්‍රී ලංකා රුපියල',
            'localized' => 'шрі-ланкійська рупія',
        ],
        'sk' => [
            'code'      => 'EUR',
            'numeric'   => 978,
            'native'    => 'euro',
            'localized' => 'євро',
        ],
        'sl' => [
            'code'      => 'EUR',
            'numeric'   => 978,
            'native'    => 'evro',
            'localized' => 'євро',
        ],
        'sq' => [
            'code'      => 'ALL',
            'numeric'   => 8,
            'native'    => 'Leku shqiptar',
            'localized' => 'албанський лек',
        ],
        'sr_Cyrl' => [
            'code'      => 'RSD',
            'numeric'   => 941,
            'native'    => 'српски динар',
            'localized' => 'сербський динар',
        ],
        'sr_Latn' => [
            'code'      => 'RSD',
            'numeric'   => 941,
            'native'    => 'srpski dinar',
            'localized' => 'сербський динар',
        ],
        'sr_Latn_ME' => [
            'code'      => 'EUR',
            'numeric'   => 978,
            'native'    => 'Evro',
            'localized' => 'євро',
        ],
        'sv' => [
            'code'      => 'SEK',
            'numeric'   => 752,
            'native'    => 'svensk krona',
            'localized' => 'шведська крона',
        ],
        'sw' => [
            'code'      => 'TZS',
            'numeric'   => 834,
            'native'    => 'Shilingi ya Tanzania',
            'localized' => 'танзанійський шилінг',
        ],
        'tg' => [
            'code'      => 'TJS',
            'numeric'   => 972,
            'native'    => 'Сомонӣ',
            'localized' => 'таджицький сомоні',
        ],
        'th' => [
            'code'      => 'THB',
            'numeric'   => 764,
            'native'    => 'บาท',
            'localized' => 'таїландський бат',
        ],
        'tk' => [
            'code'      => 'TMT',
            'numeric'   => 934,
            'native'    => 'Türkmen manady',
            'localized' => 'туркменський манат',
        ],
        'tl' => [
            'code'      => 'PHP',
            'numeric'   => 608,
            'native'    => 'Philippine Peso',
            'localized' => 'філіппінський песо',
        ],
        'tr' => [
            'code'      => 'TRY',
            'numeric'   => 949,
            'native'    => 'Türk Lirası',
            'localized' => 'турецька ліра',
        ],
        'ug' => [
            'code'      => 'CNY',
            'numeric'   => 156,
            'native'    => 'جۇڭگو يۈەنى',
            'localized' => 'китайський юань',
        ],
        'uk' => [
            'code'      => 'UAH',
            'numeric'   => 980,
            'native'    => 'українська гривня',
            'localized' => 'українська гривня',
        ],
        'ur' => [
            'code'      => 'PKR',
            'numeric'   => 586,
            'native'    => 'پاکستانی روپیہ',
            'localized' => 'пакистанська рупія',
        ],
        'uz_Cyrl' => [
            'code'      => 'UZS',
            'numeric'   => 860,
            'native'    => 'Ўзбекистон сўм',
            'localized' => 'узбецький сум',
        ],
        'uz_Latn' => [
            'code'      => 'UZS',
            'numeric'   => 860,
            'native'    => 'O‘zbekiston so‘mi',
            'localized' => 'узбецький сум',
        ],
        'vi' => [
            'code'      => 'VND',
            'numeric'   => 704,
            'native'    => 'Đồng Việt Nam',
            'localized' => 'вʼєтнамський донг',
        ],
        'zh_CN' => [
            'code'      => 'CNY',
            'numeric'   => 156,
            'native'    => '人民币',
            'localized' => 'китайський юань',
        ],
        'zh_HK' => [
            'code'      => 'HKD',
            'numeric'   => 344,
            'native'    => '港元',
            'localized' => 'гонконгський долар',
        ],
        'zh_TW' => [
            'code'      => 'TWD',
            'numeric'   => 901,
            'native'    => '新台币',
            'localized' => 'новий тайванський долар',
        ],
    ]);
