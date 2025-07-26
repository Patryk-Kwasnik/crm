<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $countries = [
            ['name' => 'Albania', 'code' => 'AL'],
            ['name' => 'Andorra', 'code' => 'AD'],
            ['name' => 'Armenia', 'code' => 'AM'],
            ['name' => 'Austria', 'code' => 'AT'],
            ['name' => 'Azerbaijan', 'code' => 'AZ'],
            ['name' => 'Belarus', 'code' => 'BY'],
            ['name' => 'Belgium', 'code' => 'BE'],
            ['name' => 'Bosnia and Herzegovina', 'code' => 'BA'],
            ['name' => 'Bulgaria', 'code' => 'BG'],
            ['name' => 'Croatia', 'code' => 'HR'],
            ['name' => 'Cyprus', 'code' => 'CY'],
            ['name' => 'Czech Republic', 'code' => 'CZ'],
            ['name' => 'Denmark', 'code' => 'DK'],
            ['name' => 'Estonia', 'code' => 'EE'],
            ['name' => 'Finland', 'code' => 'FI'],
            ['name' => 'France', 'code' => 'FR'],
            ['name' => 'Georgia', 'code' => 'GE'],
            ['name' => 'Germany', 'code' => 'DE'],
            ['name' => 'Greece', 'code' => 'GR'],
            ['name' => 'Hungary', 'code' => 'HU'],
            ['name' => 'Iceland', 'code' => 'IS'],
            ['name' => 'Ireland', 'code' => 'IE'],
            ['name' => 'Italy', 'code' => 'IT'],
            ['name' => 'Kazakhstan', 'code' => 'KZ'],
            ['name' => 'Kosovo', 'code' => 'XK'],
            ['name' => 'Latvia', 'code' => 'LV'],
            ['name' => 'Liechtenstein', 'code' => 'LI'],
            ['name' => 'Lithuania', 'code' => 'LT'],
            ['name' => 'Luxembourg', 'code' => 'LU'],
            ['name' => 'Malta', 'code' => 'MT'],
            ['name' => 'Moldova', 'code' => 'MD'],
            ['name' => 'Monaco', 'code' => 'MC'],
            ['name' => 'Montenegro', 'code' => 'ME'],
            ['name' => 'Netherlands', 'code' => 'NL'],
            ['name' => 'North Macedonia', 'code' => 'MK'],
            ['name' => 'Norway', 'code' => 'NO'],
            ['name' => 'Poland', 'code' => 'PL'],
            ['name' => 'Portugal', 'code' => 'PT'],
            ['name' => 'Romania', 'code' => 'RO'],
            ['name' => 'Russia', 'code' => 'RU'],
            ['name' => 'San Marino', 'code' => 'SM'],
            ['name' => 'Serbia', 'code' => 'RS'],
            ['name' => 'Slovakia', 'code' => 'SK'],
            ['name' => 'Slovenia', 'code' => 'SI'],
            ['name' => 'Spain', 'code' => 'ES'],
            ['name' => 'Sweden', 'code' => 'SE'],
            ['name' => 'Switzerland', 'code' => 'CH'],
            ['name' => 'Turkey', 'code' => 'TR'],
            ['name' => 'Ukraine', 'code' => 'UA'],
            ['name' => 'United Kingdom', 'code' => 'GB'],
            ['name' => 'Vatican City', 'code' => 'VA'],
        ];

        DB::table('countries')->insert($countries);

        $countries = [
            ['code' => 'AL', 'name' => 'Albania'],
            ['code' => 'AD', 'name' => 'Andora'],
            ['code' => 'AM', 'name' => 'Armenia'],
            ['code' => 'AT', 'name' => 'Austria'],
            ['code' => 'AZ', 'name' => 'Azerbejdżan'],
            ['code' => 'BY', 'name' => 'Białoruś'],
            ['code' => 'BE', 'name' => 'Belgia'],
            ['code' => 'BA', 'name' => 'Bośnia i Hercegowina'],
            ['code' => 'BG', 'name' => 'Bułgaria'],
            ['code' => 'HR', 'name' => 'Chorwacja'],
            ['code' => 'CY', 'name' => 'Cypr'],
            ['code' => 'CZ', 'name' => 'Czechy'],
            ['code' => 'DK', 'name' => 'Dania'],
            ['code' => 'EE', 'name' => 'Estonia'],
            ['code' => 'FI', 'name' => 'Finlandia'],
            ['code' => 'FR', 'name' => 'Francja'],
            ['code' => 'GE', 'name' => 'Gruzja'],
            ['code' => 'DE', 'name' => 'Niemcy'],
            ['code' => 'GR', 'name' => 'Grecja'],
            ['code' => 'HU', 'name' => 'Węgry'],
            ['code' => 'IS', 'name' => 'Islandia'],
            ['code' => 'IE', 'name' => 'Irlandia'],
            ['code' => 'IT', 'name' => 'Włochy'],
            ['code' => 'KZ', 'name' => 'Kazachstan'],
            ['code' => 'XK', 'name' => 'Kosowo'],
            ['code' => 'LV', 'name' => 'Łotwa'],
            ['code' => 'LI', 'name' => 'Liechtenstein'],
            ['code' => 'LT', 'name' => 'Litwa'],
            ['code' => 'LU', 'name' => 'Luksemburg'],
            ['code' => 'MT', 'name' => 'Malta'],
            ['code' => 'MD', 'name' => 'Mołdawia'],
            ['code' => 'MC', 'name' => 'Monako'],
            ['code' => 'ME', 'name' => 'Czarnogóra'],
            ['code' => 'NL', 'name' => 'Holandia'],
            ['code' => 'MK', 'name' => 'Macedonia Północna'],
            ['code' => 'NO', 'name' => 'Norwegia'],
            ['code' => 'PL', 'name' => 'Polska'],
            ['code' => 'PT', 'name' => 'Portugalia'],
            ['code' => 'RO', 'name' => 'Rumunia'],
            ['code' => 'RU', 'name' => 'Rosja'],
            ['code' => 'SM', 'name' => 'San Marino'],
            ['code' => 'RS', 'name' => 'Serbia'],
            ['code' => 'SK', 'name' => 'Słowacja'],
            ['code' => 'SI', 'name' => 'Słowenia'],
            ['code' => 'ES', 'name' => 'Hiszpania'],
            ['code' => 'SE', 'name' => 'Szwecja'],
            ['code' => 'CH', 'name' => 'Szwajcaria'],
            ['code' => 'TR', 'name' => 'Turcja'],
            ['code' => 'UA', 'name' => 'Ukraina'],
            ['code' => 'GB', 'name' => 'Wielka Brytania'],
            ['code' => 'VA', 'name' => 'Watykan'],
        ];

        DB::table('countries_pl')->insert($countries);
    }
}
