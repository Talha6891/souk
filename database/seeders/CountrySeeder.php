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
        ];

        DB::table('countries')->insert($countries);
    }
}
