<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $users = collect([
            [
                'first_name' => 'Super',
                'last_name' => 'Admin',
                'role' => 'super-admin',
                'email' => 'superadmin@souk.com',
                'email_verified_at' => now(),
                'country_id' => 1,
                'password' => bcrypt('password'),
                'whatsapp_no' => '1234567890',
                'city' => 'CityName',
                'address' => 'Address 1',
                'bank_name' => 'Bank Name',
                'branch_code' => '1234',
                'store_name' => 'Store 1',
                'account_title' => 'Account Title 1',
                'iban_number' => 'PK12345678901234567890123456',
                'referral_code' => 'REF123',
                'verified' => '1',
                'profile_photo_path' => null,
            ],
            [
                'first_name' => 'Admin',
                'last_name' => '',
                'role' => 'admin',
                'email' => 'admin@souk.com',
                'email_verified_at' => now(),
                'country_id' => 1,
                'password' => bcrypt('password'),
                'whatsapp_no' => '0987654321',
                'city' => 'CityName',
                'address' => 'Address 2',
                'bank_name' => 'Another Bank',
                'branch_code' => '5678',
                'store_name' => 'Store 2',
                'account_title' => 'Account Title 2',
                'iban_number' => 'PK09876543210987654321098765',
                'referral_code' => null,
                'verified' => '1',
                'profile_photo_path' => null,
            ],
            [
                'first_name' => 'User',
                'last_name' => '',
                'role' => 'user',
                'email' => 'user@souk.com',
                'email_verified_at' => now(),
                'country_id' => 1,
                'password' => bcrypt('password'),
                'whatsapp_no' => '1122334455',
                'city' => 'CityName',
                'address' => 'Address 3',
                'bank_name' => 'Third Bank',
                'branch_code' => '9101',
                'store_name' => 'Store 3',
                'account_title' => 'Account Title 3',
                'iban_number' => 'PK11223344556677889900112233',
                'referral_code' => null,
                'verified' => '0',
                'profile_photo_path' => null,
            ],
        ]);

        $users->map(function ($user) {
            $user = collect($user);
            $newUser = User::create($user->except('role')->toArray());
            $newUser->assignRole($user['role']);
        });
    }
}
