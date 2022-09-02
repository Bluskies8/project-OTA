<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\country;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            array('Afghanistan', '93', 'AF', ''),
            array('Albania', '355', 'AL', ''),
            array('Algeria', '213', 'DZ', ''),
            array('American Samoa', '1-684', 'AS', ''),
            array('Andorra', '376', 'AD', ''),
            array('Angola', '244', 'AO', ''),
            array('Anguilla', '1-264', 'AI', ''),
            array('Antigua and Barbuda', '1-268', 'AG', ''),
            array('Argentina', '54', 'AR', ''),
            array('Armenia', '374', 'AM', ''),
            array('Aruba Kingdom of the Netherlands', '297', 'AW', ''),
            array('Australia', '61', 'AU', ''),
            array('Austria', '43', 'AT', ''),
            array('Azerbaijan', '994', 'AZ', ''),
            array('Bahamas', '1-242', 'BS', ''),
            array('Bahrain', '973', 'BH', ''),
            array('Bangladesh', '880', 'BD', ''),
            array('Barbados', '1-246', 'BB', ''),
            array('Belarus', '375', 'BY', ''),
            array('Belgium', '32', 'BE', ''),
            array('Belize', '501', 'BZ', ''),
            array('Benin', '229', 'BJ', ''),
            array('Bermuda', '1-441', 'BM', ''),
            array('Bhutan', '975', 'BT', ''),
            array('Bolivia', '591', 'BO', ''),
            array('Bosnia and Herzegovina', '387', 'BA', ''),
            array('Botswana', '267', 'BW', ''),
            array('Brazil', '55', 'BR', ''),
            array('Brunei Darussalam', '673', 'BN', ''),
            array('Bulgaria', '359', 'BG', ''),
            array('Burkina Faso', '226', 'BF', ''),
            array('Burundi', '257', 'BI', ''),
            array('Cabo Verde', '238', 'CV', ''),
            array('Cambodia', '855', 'KH', ''),
            array('Cameroon', '237', 'CM', ''),
            array('Canada', '1', 'CA', ''),
            array('Cayman Islands', '1-345', 'KY', ''),
            array('Central African Republic', '236', 'CF', ''),
            array('Chad', '235', 'TD', ''),
            array('Chile', '56', 'CL', ''),
            array('China', '86', 'CN', ''),
            array('Colombia', '57', 'CO', ''),
            array('Comoros', '269', 'KM', ''),
            array('Congo', '243', 'CD', ''),
            array('Cook Islands', '682', 'CK', ''),
            array('Costa Rica', '506', 'CR', ''),
            array('Cote d\'Ivoire', '225', 'CI', ''),
            array('Croatia', '385', 'HR', ''),
            array('Cuba', '53', 'CU', ''),
            array('Curaçao Kingdom of the Netherlands', '599', 'CW', ''),
            array('Cyprus', '357', 'CY', ''),
            array('Czech Republic', '420', 'CZ', ''),
            array('Denmark', '45', 'DK', ''),
            array('Djibouti', '253', 'DJ', ''),
            array('Dominica', '1-767', 'DM', ''),
            array('Dominican Republic', '1-809, 1-829, 1-849', 'DO', ''),
            array('Ecuador', '593', 'EC', ''),
            array('Egypt', '20', 'EG', ''),
            array('El Salvador', '503', 'SV', ''),
            array('Equatorial Guinea', '240', 'GQ', ''),
            array('Eritrea', '291', 'ER', ''),
            array('Estonia', '372', 'EE', ''),
            array('Ethiopia', '251', 'ET', ''),
            array('Fiji', '679', 'FJ', ''),
            array('Finland', '358', 'FI', ''),
            array('France', '33', 'FR', ''),
            array('Gabon', '241', 'GA', ''),
            array('Gambia', '220', 'GM', ''),
            array('Georgia', '995', 'GE', ''),
            array('Germany', '49', 'DE', ''),
            array('Ghana', '233', 'GH', ''),
            array('Gibraltar', '350', 'GI', ''),
            array('Greece', '30', 'GR', ''),
            array('Grenada', '1-473', 'GD', ''),
            array('Guam', '1-671', 'GU', ''),
            array('Guatemala', '502', 'GT', ''),
            array('Guernsey', '44-1481', 'GG', ''),
            array('Guinea', '224', 'GN', ''),
            array('Guinea Bissau', '245', 'GW', ''),
            array('Guyana', '592', 'GY', ''),
            array('Haiti', '509', 'HT', ''),
            array('Honduras', '504', 'HN', ''),
            array('Hong Kong', '852', 'HK', ''),
            array('Hungary', '36', 'HU', ''),
            array('Iceland', '354', 'IS', ''),
            array('India', '91', 'IN', ''),
            array('Indonesia', '62', 'ID', ''),
            array('Iran', '98', 'IR', ''),
            array('Iraq', '964', 'IQ', ''),
            array('Ireland', '353', 'IE', ''),
            array('Isle of Man', '44-1624', 'IM', ''),
            array('Israel', '972', 'IL', ''),
            array('Italy', '39', 'IT', ''),
            array('Jamaica', '1-876', 'JM', ''),
            array('Japan', '81', 'JP', ''),
            array('Jersey', '44-1534', 'JE', ''),
            array('Jordan', '962', 'JO', ''),
            array('Kazakhstan', '7', 'KZ', ''),
            array('Kenya', '254', 'KE', ''),
            array('Korea North', '850', 'KP', ''),
            array('Korea South', '82', 'KR', ''),
            array('Kosovo', '383', 'XK', ''),
            array('Kuwait', '965', 'KW', ''),
            array('Kyrgyzstan', '996', 'KG', ''),
            array('Laos', '856', 'LA', ''),
            array('Latvia', '371', 'LV', ''),
            array('Lebanon', '961', 'LB', ''),
            array('Lesotho', '266', 'LS', ''),
            array('Liberia', '231', 'LR', ''),
            array('Libya', '218', 'LY', ''),
            array('Liechtenstein', '423', 'LI', ''),
            array('Lithuania', '370', 'LT', ''),
            array('Luxembourg', '352', 'LU', ''),
            array('Madagascar', '261', 'MG', ''),
            array('Malawi', '265', 'MW', ''),
            array('Malaysia', '60', 'MY', ''),
            array('Maldives', '960', 'MV', ''),
            array('Mali', '223', 'ML', ''),
            array('Malta', '356', 'MT', ''),
            array('Marshall Islands', '692', 'MH', ''),
            array('Mauritania', '222', 'MR', ''),
            array('Mauritius', '230', 'MU', ''),
            array('Mexico', '52', 'MX', ''),
            array('Moldova', '373', 'MD', ''),
            array('Monaco', '377', 'MC', ''),
            array('Mongolia', '976', 'MN', ''),
            array('Montenegro', '382', 'ME', ''),
            array('Montserrat', '1-664', 'MS', ''),
            array('Morocco', '212', 'MA', ''),
            array('Mozambique', '258', 'MZ', ''),
            array('Myanmar', '95', 'MM', ''),
            array('Namibia', '264', '', ''),
            array('Nauru', '674', 'NR', ''),
            array('Nepal', '977', 'NP', ''),
            array('Netherlands', '31', 'NL', ''),
            array('New Zealand', '64', 'NZ', ''),
            array('Nicaragua', '505', 'NI', ''),
            array('Niger', '227', 'NE', ''),
            array('Nigeria', '234', 'NG', ''),
            array('Niue', '683', 'NU', ''),
            array('North Macedonia', '389', 'MK', ''),
            array('Norway', '47', 'NO', ''),
            array('Oman', '968', 'OM', ''),
            array('Pakistan', '92', 'PK', ''),
            array('Palau', '680', 'PW', ''),
            array('Palestinian Authority', '970', 'PS', ''),
            array('Panama', '507', 'PA', ''),
            array('Papua New Guinea', '675', 'PG', ''),
            array('Paraguay', '595', 'PY', ''),
            array('Peru', '51', 'PE', ''),
            array('Philippines', '63', 'PH', ''),
            array('Poland', '48', 'PL', ''),
            array('Portugal', '351', 'PT', ''),
            array('Qatar', '974', 'QA', ''),
            array('Romania', '40', 'RO', ''),
            array('Russia', '7', 'RU', ''),
            array('Rwanda', '250', 'RW', ''),
            array('Saint Kitts and Nevis', '1-869', 'KN', ''),
            array('Saint Lucia', '1-758', 'LC', ''),
            array('Saint Vincent & the Grenadines', '1-784', 'VC', ''),
            array('Samoa', '685', 'WS', ''),
            array('San Marino', '378', 'SM', ''),
            array('Sao Tome and Principe', '239', 'ST', ''),
            array('Saudi Arabia', '966', 'SA', ''),
            array('Senegal', '221', 'SN', ''),
            array('Serbia', '381', 'RS', ''),
            array('Seychelles', '248', 'SC', ''),
            array('Sierra Leone', '232', 'SL', ''),
            array('Singapore', '65', 'SG', ''),
            array('Sint Maarten Kingdom of the Netherlands', '1-721', 'SX', ''),
            array('Slovakia', '421', 'SK', ''),
            array('Slovenia', '386', 'SI', ''),
            array('Solomon Islands', '677', 'SB', ''),
            array('Somalia', '252', 'SO', ''),
            array('South Africa', '27', 'ZA', ''),
            array('South Sudan', '211', 'SS', ''),
            array('Spain', '34', 'ES', ''),
            array('Sri Lanka', '94', 'LK', ''),
            array('Sudan', '249', 'SD', ''),
            array('Suriname', '597', 'SR', ''),
            array('Swaziland', '268', 'SZ', ''),
            array('Sweden', '46', 'SE', ''),
            array('Switzerland', '41', 'CH', ''),
            array('Syria', '963', 'SY', ''),
            array('Taiwan', '886', 'TW', ''),
            array('Tajikistan', '992', 'TJ', ''),
            array('Tanzania', '255', 'TZ', ''),
            array('Thailand', '66', 'TH', ''),
            array('Togo', '228', 'TG', ''),
            array('Tonga', '676', 'TO', ''),
            array('Trinidad and Tobago', '1-868', 'TT', ''),
            array('Tunisia', '216', 'TN', ''),
            array('Turkey', '90', 'TR', ''),
            array('Turkmenistan', '993', 'TM', ''),
            array('Turks and Caicos Islands', '1-649', 'TC', ''),
            array('Uganda', '256', 'UG', ''),
            array('Ukraine', '380', 'UA', ''),
            array('United Arab Emirates', '971', 'AE', ''),
            array('United Kingdom', '44', 'GB', ''),
            array('United States', '1', 'US', ''),
            array('Uruguay', '598', 'UY', ''),
            array('Uzbekistan', '998', 'UZ', ''),
            array('Vanuatu', '678', 'VU', ''),
            array('Venezuela', '58', 'VE', ''),
            array('Vietnam', '84', 'VN', ''),
            array('Virgin Islands (UK)', '1-284', 'VG', ''),
            array('Virgin Islands (US)', '1-340', 'VI', ''),
            array('Yemen', '967', 'YE', ''),
            array('Zambia', '260', 'ZM', ''),
            array('Zimbabwe', '263', 'ZW', ''),
        ];
        foreach ($data as $key) {
            country::create([
                'label' => $key[0],
                'phone' => $key[1],
                'code' => $key[2],
                'region' => $key[3]
            ]);
        }
    }
}
