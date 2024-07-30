<?php

namespace App\Actions\Fortify;

use App\Models\Client;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        $validator = Validator::make($input, [
            'first_name' => ['required', 'string', 'min:1', 'max:100'],
            'last_name' => ['nullable', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'whatsapp_no' => ['required', 'string', 'unique:clients', 'min:10', 'max:15'],
            'city' => ['required', 'string', 'min:1', 'max:100'],
            'address' => ['required', 'string', 'min:1', 'max:255'],
            'bank_name' => ['required', 'string', 'min:1', 'max:100'],
            'branch_code' => ['required', 'string', 'min:1', 'max:20'],
            'store_name' => ['required', 'string', 'min:1', 'max:100'],
            'account_title' => ['required', 'string', 'min:1', 'max:100'],
            'iban_number' => ['required', 'string', 'min:15', 'max:34'],
            'referral_code' => ['nullable', 'string', 'max:50'],
            'country_id' => ['required', 'exists:countries,id'],
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        return DB::transaction(function () use ($input) {
            $user = User::create([
                'first_name' => $input['first_name'],
                'last_name' => $input['last_name'],
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
                'referral_code' => $input['referral_code'],

            ]);
            $client =  Client::create([
                'first_name' => $input['first_name'],
                'last_name' => $input['last_name'],
                'email' => $input['email'],
                'whatsapp_no' => $input['whatsapp_no'],
                'city' => $input['city'],
                'address' => $input['address'],
                'bank_name' => $input['bank_name'],
                'branch_code' => $input['branch_code'],
                'store_name' => $input['store_name'],
                'account_title' => $input['account_title'],
                'iban_number' => $input['iban_number'],
                'country_id' => $input['country_id'],
                'user_id' => $user->id
            ]);

            $user->assignRole('client');
            return $user;
        });
    }

}
