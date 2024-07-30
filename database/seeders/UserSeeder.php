<?php
namespace Database\Seeders;

use App\Models\User;
use App\Models\Employee;
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
                'email' => 'superadmin@souk.com',
                'email_verified_at' => now(),
                'password' => bcrypt('password'),
                'profile_photo_path' => null,
                'role' => 'super-admin',
                'employee_data' => [
                    'first_name' => 'Super',
                    'last_name' => 'Admin',
                    'email' => 'superadmin@souk.com',
                    'gender' => 'male',
                    'dob' => now()->subYears(30)->format('Y-m-d'),
                    'joining_date' => now()->format('Y-m-d'),
                    'address' => '123 Admin St',
                    'department_id' => 1, // Ensure these IDs exist in your departments table
                    'designation_id' => 1, // Ensure these IDs exist in your designations table
                ],
            ],
            [
                'first_name' => 'Admin',
                'last_name' => '',
                'email' => 'admin@souk.com',
                'email_verified_at' => now(),
                'password' => bcrypt('password'),
                'profile_photo_path' => null,
                'role' => 'admin',
                'employee_data' => [
                    'first_name' => 'Admin',
                    'last_name' => '',
                    'email' => 'admin@souk.com',
                    'gender' => 'female',
                    'dob' => now()->subYears(25)->format('Y-m-d'),
                    'joining_date' => now()->format('Y-m-d'),
                    'address' => '456 Admin Ave',
                    'department_id' => 1,
                    'designation_id' => 2,
                ],
            ],
            [
                'first_name' => 'Client',
                'last_name' => '',
                'email' => 'client@souk.com',
                'email_verified_at' => now(),
                'password' => bcrypt('password'),
                'profile_photo_path' => null,
                'role' => 'client',
                'employee_data' => [
                    'first_name' => 'Client',
                    'last_name' => '',
                    'email' => 'client@souk.com',
                    'gender' => 'other',
                    'dob' => now()->subYears(28)->format('Y-m-d'),
                    'joining_date' => now()->format('Y-m-d'),
                    'address' => '789 Client Rd',
                    'department_id' => 2,
                    'designation_id' => 3,
                ],
            ],
        ]);

        $users->each(function ($user) {
            $user = collect($user);
            $newUser = User::create($user->except('role', 'employee_data')->toArray());

            // Assign role
            if ($user->has('role')) {
                $newUser->assignRole($user['role']);
            }

            if ($user->has('employee_data')) {
                Employee::create(array_merge($user['employee_data'], ['user_id' => $newUser->id]));
            }

            $token = $newUser->createToken('token')->plainTextToken;
        });
    }
}
