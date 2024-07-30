<?php

namespace Database\Seeders;

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
            // Countries starting with 'A'
            ['name' => 'Afghanistan', 'code' => 'AF', 'num_code' => '004'],
            ['name' => 'Albania', 'code' => 'AL', 'num_code' => '008'],
            ['name' => 'Algeria', 'code' => 'DZ', 'num_code' => '012'],
            ['name' => 'Andorra', 'code' => 'AD', 'num_code' => '020'],
            ['name' => 'Angola', 'code' => 'AO', 'num_code' => '024'],
            ['name' => 'Antigua and Barbuda', 'code' => 'AG', 'num_code' => '028'],
            ['name' => 'Argentina', 'code' => 'AR', 'num_code' => '032'],
            ['name' => 'Armenia', 'code' => 'AM', 'num_code' => '051'],
            ['name' => 'Australia', 'code' => 'AU', 'num_code' => '036'],
            ['name' => 'Austria', 'code' => 'AT', 'num_code' => '040'],
            ['name' => 'Azerbaijan', 'code' => 'AZ', 'num_code' => '031'],

            // Countries starting with 'B'
            ['name' => 'Bahamas', 'code' => 'BS', 'num_code' => '044'],
            ['name' => 'Bahrain', 'code' => 'BH', 'num_code' => '048'],
            ['name' => 'Bangladesh', 'code' => 'BD', 'num_code' => '050'],
            ['name' => 'Barbados', 'code' => 'BB', 'num_code' => '052'],
            ['name' => 'Belarus', 'code' => 'BY', 'num_code' => '112'],
            ['name' => 'Belgium', 'code' => 'BE', 'num_code' => '056'],
            ['name' => 'Belize', 'code' => 'BZ', 'num_code' => '084'],
            ['name' => 'Benin', 'code' => 'BJ', 'num_code' => '204'],
            ['name' => 'Bhutan', 'code' => 'BT', 'num_code' => '064'],
            ['name' => 'Bolivia', 'code' => 'BO', 'num_code' => '068'],
            ['name' => 'Bosnia and Herzegovina', 'code' => 'BA', 'num_code' => '070'],
            ['name' => 'Botswana', 'code' => 'BW', 'num_code' => '072'],
            ['name' => 'Brazil', 'code' => 'BR', 'num_code' => '076'],
            ['name' => 'Brunei', 'code' => 'BN', 'num_code' => '096'],
            ['name' => 'Bulgaria', 'code' => 'BG', 'num_code' => '100'],
            ['name' => 'Burkina Faso', 'code' => 'BF', 'num_code' => '854'],
            ['name' => 'Burundi', 'code' => 'BI', 'num_code' => '108'],

            // Countries starting with 'C'
            ['name' => 'Cabo Verde', 'code' => 'CV', 'num_code' => '132'],
            ['name' => 'Cambodia', 'code' => 'KH', 'num_code' => '116'],
            ['name' => 'Cameroon', 'code' => 'CM', 'num_code' => '120'],
            ['name' => 'Canada', 'code' => 'CA', 'num_code' => '124'],
            ['name' => 'Central African Republic', 'code' => 'CF', 'num_code' => '140'],
            ['name' => 'Chad', 'code' => 'TD', 'num_code' => '148'],
            ['name' => 'Chile', 'code' => 'CL', 'num_code' => '152'],
            ['name' => 'China', 'code' => 'CN', 'num_code' => '156'],
            ['name' => 'Colombia', 'code' => 'CO', 'num_code' => '170'],
            ['name' => 'Comoros', 'code' => 'KM', 'num_code' => '174'],
            ['name' => 'Congo, Democratic Republic of the', 'code' => 'CD', 'num_code' => '180'],
            ['name' => 'Congo, Republic of the', 'code' => 'CG', 'num_code' => '178'],
            ['name' => 'Costa Rica', 'code' => 'CR', 'num_code' => '188'],
            ['name' => 'Croatia', 'code' => 'HR', 'num_code' => '191'],
            ['name' => 'Cuba', 'code' => 'CU', 'num_code' => '192'],
            ['name' => 'Cyprus', 'code' => 'CY', 'num_code' => '196'],
            ['name' => 'Czech Republic', 'code' => 'CZ', 'num_code' => '203'],

            // Countries starting with 'D'
            ['name' => 'Denmark', 'code' => 'DK', 'num_code' => '208'],
            ['name' => 'Djibouti', 'code' => 'DJ', 'num_code' => '262'],
            ['name' => 'Dominica', 'code' => 'DM', 'num_code' => '212'],
            ['name' => 'Dominican Republic', 'code' => 'DO', 'num_code' => '214'],

            // Countries starting with 'E'
            ['name' => 'Ecuador', 'code' => 'EC', 'num_code' => '218'],
            ['name' => 'Egypt', 'code' => 'EG', 'num_code' => '818'],
            ['name' => 'El Salvador', 'code' => 'SV', 'num_code' => '222'],
            ['name' => 'Equatorial Guinea', 'code' => 'GQ', 'num_code' => '226'],
            ['name' => 'Eritrea', 'code' => 'ER', 'num_code' => '232'],
            ['name' => 'Estonia', 'code' => 'EE', 'num_code' => '233'],
            ['name' => 'Eswatini', 'code' => 'SZ', 'num_code' => '748'],
            ['name' => 'Ethiopia', 'code' => 'ET', 'num_code' => '231'],


            ['name' => 'Fiji', 'code' => 'FJ', 'num_code' => '242'],
            ['name' => 'Finland', 'code' => 'FI', 'num_code' => '246'],
            ['name' => 'France', 'code' => 'FR', 'num_code' => '250'],

            ['name' => 'Gabon', 'code' => 'GA', 'num_code' => '266'],
            ['name' => 'Gambia', 'code' => 'GM', 'num_code' => '270'],
            ['name' => 'Georgia', 'code' => 'GE', 'num_code' => '268'],
            ['name' => 'Germany', 'code' => 'DE', 'num_code' => '276'],
            ['name' => 'Ghana', 'code' => 'GH', 'num_code' => '288'],
            ['name' => 'Greece', 'code' => 'GR', 'num_code' => '300'],
            ['name' => 'Grenada', 'code' => 'GD', 'num_code' => '308'],
            ['name' => 'Guatemala', 'code' => 'GT', 'num_code' => '320'],
            ['name' => 'Guinea', 'code' => 'GN', 'num_code' => '324'],
            ['name' => 'Guinea-Bissau', 'code' => 'GW', 'num_code' => '624'],
            ['name' => 'Guyana', 'code' => 'GY', 'num_code' => '328'],

            ['name' => 'Haiti', 'code' => 'HT', 'num_code' => '332'],
            ['name' => 'Honduras', 'code' => 'HN', 'num_code' => '340'],
            ['name' => 'Hungary', 'code' => 'HU', 'num_code' => '348'],

            ['name' => 'Iceland', 'code' => 'IS', 'num_code' => '352'],
            ['name' => 'India', 'code' => 'IN', 'num_code' => '356'],
            ['name' => 'Indonesia', 'code' => 'ID', 'num_code' => '360'],
            ['name' => 'Iran', 'code' => 'IR', 'num_code' => '364'],
            ['name' => 'Iraq', 'code' => 'IQ', 'num_code' => '368'],
            ['name' => 'Ireland', 'code' => 'IE', 'num_code' => '372'],
            ['name' => 'Israel', 'code' => 'IL', 'num_code' => '376'],
            ['name' => 'Italy', 'code' => 'IT', 'num_code' => '380'],

            ['name' => 'Jamaica', 'code' => 'JM', 'num_code' => '388'],
            ['name' => 'Japan', 'code' => 'JP', 'num_code' => '392'],
            ['name' => 'Jordan', 'code' => 'JO', 'num_code' => '400'],

            ['name' => 'Kazakhstan', 'code' => 'KZ', 'num_code' => '398'],
            ['name' => 'Kenya', 'code' => 'KE', 'num_code' => '404'],
            ['name' => 'Kiribati', 'code' => 'KI', 'num_code' => '296'],
            ['name' => 'Korea, North', 'code' => 'KP', 'num_code' => '408'],
            ['name' => 'Korea, South', 'code' => 'KR', 'num_code' => '410'],
            ['name' => 'Kuwait', 'code' => 'KW', 'num_code' => '414'],
            ['name' => 'Kyrgyzstan', 'code' => 'KG', 'num_code' => '417'],

            // Continuing from 'L'
            ['name' => 'Laos', 'code' => 'LA', 'num_code' => '418'],
            ['name' => 'Latvia', 'code' => 'LV', 'num_code' => '428'],
            ['name' => 'Lebanon', 'code' => 'LB', 'num_code' => '422'],
            ['name' => 'Lesotho', 'code' => 'LS', 'num_code' => '426'],
            ['name' => 'Liberia', 'code' => 'LR', 'num_code' => '430'],
            ['name' => 'Libya', 'code' => 'LY', 'num_code' => '434'],
            ['name' => 'Liechtenstein', 'code' => 'LI', 'num_code' => '438'],
            ['name' => 'Lithuania', 'code' => 'LT', 'num_code' => '440'],
            ['name' => 'Luxembourg', 'code' => 'LU', 'num_code' => '442'],

            // Countries starting with 'M'
            ['name' => 'Madagascar', 'code' => 'MG', 'num_code' => '450'],
            ['name' => 'Malawi', 'code' => 'MW', 'num_code' => '454'],
            ['name' => 'Malaysia', 'code' => 'MY', 'num_code' => '458'],
            ['name' => 'Maldives', 'code' => 'MV', 'num_code' => '462'],
            ['name' => 'Mali', 'code' => 'ML', 'num_code' => '466'],
            ['name' => 'Malta', 'code' => 'MT', 'num_code' => '470'],
            ['name' => 'Marshall Islands', 'code' => 'MH', 'num_code' => '584'],
            ['name' => 'Mauritania', 'code' => 'MR', 'num_code' => '478'],
            ['name' => 'Mauritius', 'code' => 'MU', 'num_code' => '480'],
            ['name' => 'Mexico', 'code' => 'MX', 'num_code' => '484'],
            ['name' => 'Micronesia', 'code' => 'FM', 'num_code' => '583'],
            ['name' => 'Moldova', 'code' => 'MD', 'num_code' => '498'],
            ['name' => 'Monaco', 'code' => 'MC', 'num_code' => '492'],
            ['name' => 'Mongolia', 'code' => 'MN', 'num_code' => '496'],
            ['name' => 'Montenegro', 'code' => 'ME', 'num_code' => '499'],
            ['name' => 'Morocco', 'code' => 'MA', 'num_code' => '504'],
            ['name' => 'Mozambique', 'code' => 'MZ', 'num_code' => '508'],
            ['name' => 'Myanmar', 'code' => 'MM', 'num_code' => '104'],

            // Countries starting with 'N'
            ['name' => 'Namibia', 'code' => 'NA', 'num_code' => '516'],
            ['name' => 'Nauru', 'code' => 'NR', 'num_code' => '520'],
            ['name' => 'Nepal', 'code' => 'NP', 'num_code' => '524'],
            ['name' => 'Netherlands', 'code' => 'NL', 'num_code' => '528'],
            ['name' => 'New Caledonia', 'code' => 'NC', 'num_code' => '540'],
            ['name' => 'New Zealand', 'code' => 'NZ', 'num_code' => '554'],
            ['name' => 'Nicaragua', 'code' => 'NI', 'num_code' => '558'],
            ['name' => 'Niger', 'code' => 'NE', 'num_code' => '562'],
            ['name' => 'Nigeria', 'code' => 'NG', 'num_code' => '566'],
            ['name' => 'Niue', 'code' => 'NU', 'num_code' => '570'],
            ['name' => 'Norfolk Island', 'code' => 'NF', 'num_code' => '574'],
            ['name' => 'North Macedonia', 'code' => 'MK', 'num_code' => '807'],
            ['name' => 'Norway', 'code' => 'NO', 'num_code' => '578'],

            // Countries starting with 'O'
            ['name' => 'Oman', 'code' => 'OM', 'num_code' => '512'],

            // Countries starting with 'P'
            ['name' => 'Pakistan', 'code' => 'PK', 'num_code' => '586'],
            ['name' => 'Palau', 'code' => 'PW', 'num_code' => '585'],
            ['name' => 'Palestine', 'code' => 'PS', 'num_code' => '275'],
            ['name' => 'Panama', 'code' => 'PA', 'num_code' => '591'],
            ['name' => 'Papua New Guinea', 'code' => 'PG', 'num_code' => '598'],
            ['name' => 'Paraguay', 'code' => 'PY', 'num_code' => '600'],
            ['name' => 'Peru', 'code' => 'PE', 'num_code' => '604'],
            ['name' => 'Philippines', 'code' => 'PH', 'num_code' => '608'],
            ['name' => 'Pitcairn Islands', 'code' => 'PN', 'num_code' => '612'],
            ['name' => 'Poland', 'code' => 'PL', 'num_code' => '616'],
            ['name' => 'Portugal', 'code' => 'PT', 'num_code' => '620'],

            // Countries starting with 'Q'
            ['name' => 'Qatar', 'code' => 'QA', 'num_code' => '634'],

            // Countries starting with 'R'
            ['name' => 'Romania', 'code' => 'RO', 'num_code' => '642'],
            ['name' => 'Russia', 'code' => 'RU', 'num_code' => '643'],
            ['name' => 'Rwanda', 'code' => 'RW', 'num_code' => '646'],

            // Countries starting with 'S'
            ['name' => 'Saint Kitts and Nevis', 'code' => 'KN', 'num_code' => '659'],
            ['name' => 'Saint Lucia', 'code' => 'LC', 'num_code' => '662'],
            ['name' => 'Saint Vincent and the Grenadines', 'code' => 'VC', 'num_code' => '670'],
            ['name' => 'Samoa', 'code' => 'WS', 'num_code' => '882'],
            ['name' => 'San Marino', 'code' => 'SM', 'num_code' => '674'],
            ['name' => 'Sao Tome and Principe', 'code' => 'ST', 'num_code' => '678'],
            ['name' => 'Saudi Arabia', 'code' => 'SA', 'num_code' => '682'],
            ['name' => 'Senegal', 'code' => 'SN', 'num_code' => '686'],
            ['name' => 'Serbia', 'code' => 'RS', 'num_code' => '688'],
            ['name' => 'Seychelles', 'code' => 'SC', 'num_code' => '690'],
            ['name' => 'Sierra Leone', 'code' => 'SL', 'num_code' => '694'],
            ['name' => 'Singapore', 'code' => 'SG', 'num_code' => '702'],
            ['name' => 'Sint Maarten', 'code' => 'SX', 'num_code' => '534'],
            ['name' => 'Slovakia', 'code' => 'SK', 'num_code' => '703'],
            ['name' => 'Slovenia', 'code' => 'SI', 'num_code' => '705'],
            ['name' => 'Solomon Islands', 'code' => 'SB', 'num_code' => '090'],
            ['name' => 'Somalia', 'code' => 'SO', 'num_code' => '706'],
            ['name' => 'South Africa', 'code' => 'ZA', 'num_code' => '710'],
            ['name' => 'South Sudan', 'code' => 'SS', 'num_code' => '728'],
            ['name' => 'Spain', 'code' => 'ES', 'num_code' => '724'],
            ['name' => 'Sri Lanka', 'code' => 'LK', 'num_code' => '144'],
            ['name' => 'Sudan', 'code' => 'SD', 'num_code' => '729'],
            ['name' => 'Suriname', 'code' => 'SR', 'num_code' => '740'],
            ['name' => 'Sweden', 'code' => 'SE', 'num_code' => '752'],
            ['name' => 'Switzerland', 'code' => 'CH', 'num_code' => '756'],

            // Countries starting with 'T'
            ['name' => 'Tajikistan', 'code' => 'TJ', 'num_code' => '762'],
            ['name' => 'Tanzania', 'code' => 'TZ', 'num_code' => '834'],
            ['name' => 'Thailand', 'code' => 'TH', 'num_code' => '764'],
            ['name' => 'Timor-Leste', 'code' => 'TL', 'num_code' => '626'],
            ['name' => 'Togo', 'code' => 'TG', 'num_code' => '768'],
            ['name' => 'Tokelau', 'code' => 'TK', 'num_code' => '772'],
            ['name' => 'Tonga', 'code' => 'TO', 'num_code' => '776'],
            ['name' => 'Trinidad and Tobago', 'code' => 'TT', 'num_code' => '780'],
            ['name' => 'Tunisia', 'code' => 'TN', 'num_code' => '788'],
            ['name' => 'Turkey', 'code' => 'TR', 'num_code' => '792'],
            ['name' => 'Turkmenistan', 'code' => 'TM', 'num_code' => '795'],
            ['name' => 'Tuvalu', 'code' => 'TV', 'num_code' => '798'],

            // Countries starting with 'U'
            ['name' => 'Uganda', 'code' => 'UG', 'num_code' => '800'],
            ['name' => 'Ukraine', 'code' => 'UA', 'num_code' => '804'],
            ['name' => 'United Arab Emirates', 'code' => 'AE', 'num_code' => '784'],
            ['name' => 'United Kingdom', 'code' => 'GB', 'num_code' => '826'],
            ['name' => 'United States', 'code' => 'US', 'num_code' => '840'],
            ['name' => 'Uruguay', 'code' => 'UY', 'num_code' => '858'],

            // Countries starting with 'V'
            ['name' => 'Vanuatu', 'code' => 'VU', 'num_code' => '548'],
            ['name' => 'Vatican City', 'code' => 'VA', 'num_code' => '336'],
            ['name' => 'Venezuela', 'code' => 'VE', 'num_code' => '862'],
            ['name' => 'Vietnam', 'code' => 'VN', 'num_code' => '704'],

            // Countries starting with 'Y'
            ['name' => 'Yemen', 'code' => 'YE', 'num_code' => '887'],

            // Countries starting with 'Z'
            ['name' => 'Zambia', 'code' => 'ZM', 'num_code' => '894'],
            ['name' => 'Zimbabwe', 'code' => 'ZW', 'num_code' => '716'],
        ];

        DB::table('countries')->insert($countries);
    }
}
