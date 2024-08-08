@extends('layouts.master-without-nav')
@section('title')
    {{ __('t-register') }}
@endsection

@section('content')

    <body
        class="flex items-center justify-center min-h-screen px-4 py-16 bg-cover bg-auth-pattern dark:bg-auth-pattern-dark dark:text-zink-100 font-public">
        <div class="mb-0 border-none shadow-none xl:w-2/3 card bg-white/70 dark:bg-zink-500/70">
            <div class="grid grid-cols-1 gap-0 lg:grid-cols-2">
                <div class="lg:col-span-2">
                    <div class="!px-10 !py-12 card-body">

                        <div class="text-center">
                            <h4 class="mb-2 text-purple-500 dark:text-purple-500">Welcome !</h4>
                            <p class="text-slate-500 dark:text-zink-200">Sign Up to continue to Souk.</p>
                        </div>
                        <div>
                            <form method="POST" action="{{ route('register') }}" class="mt-10">
                                @csrf

                                <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
                                    <div class="mb-3">
                                        <x-label for="first_name" value="{{ __('First Name') }}" />
                                        <x-input id="first_name" type="text" name="first_name" :value="old('first_name')" required
                                            autofocus autocomplete="first_name" placeholder="Enter first name" />
                                        <x-input-error for="first_name" />
                                    </div>

                                    <div class="mb-3">
                                        <label for="last_name"
                                            class ='inline-block mb-2 text-base font-medium'>{{ __('Last Name') }} </label>
                                        <x-input id="last_name" type="text" name="last_name" :value="old('last_name')" autofocus
                                            autocomplete="last_name" placeholder="Enter last name" />
                                        <x-input-error for="last_name" />
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
                                    <div class="mb-3">
                                        <x-label for="email" value="{{ __('Email') }}" />
                                        <x-input id="email" type="email" name="email" :value="old('email')" required
                                            autocomplete="username" placeholder="Enter valid email" />
                                        <x-input-error for="email" />
                                    </div>

                                    <div class="mb-3">
                                        <x-label for="whatsapp_no" value="{{ __('WhatsApp Number') }}" />
                                        <x-input id="whatsapp_no" type="text" name="whatsapp_no" :value="old('whatsapp_no')"
                                            required minlength="10" maxlength="15"
                                            placeholder="Enter WhatsApp number :  +92 3039243654" />
                                        <x-input-error for="whatsapp_no" />
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
                                    <div class="mb-3">
                                        <x-label for="password" value="{{ __('Password') }}" />
                                        <x-input id="password" type="password" name="password" required
                                            autocomplete="new-password" placeholder="Enter password" />
                                        <x-input-error for="password" />
                                    </div>
                                    <div class="mb-3">
                                        <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                                        <x-input id="password_confirmation" type="password" name="password_confirmation"
                                            required autocomplete="new-password" placeholder="Enter confirm password" />
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
                                    <div class="mb-3">
                                        <x-label for="city" value="{{ __('City') }}" />
                                        <x-input id="city" type="text" name="city" :value="old('city')" required
                                            placeholder="Enter city" />
                                        <x-input-error for="city" />
                                    </div>

                                    <div class="mb-3">
                                        <x-label for="address" value="{{ __('Address') }}" />
                                        <x-input id="address" type="text" name="address" :value="old('address')" required
                                            placeholder="Enter address" />
                                        <x-input-error for="address" />
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
                                    <div class="mb-3">
                                        <x-label for="bank_name" value="{{ __('Bank Name') }}" />
                                        <x-input id="bank_name" type="text" name="bank_name" :value="old('bank_name')" required
                                            placeholder="Enter bank name" />
                                        <x-input-error for="bank_name" />
                                    </div>

                                    {{-- <div class="mb-3">
                                        <x-label for="branch_code" value="{{ __('Branch Code') }}" />
                                        <x-input id="branch_code" type="text" name="branch_code" :value="old('branch_code')"
                                            required placeholder="Enter branch code" />
                                        <x-input-error for="branch_code" />
                                    </div> --}}

                                    <div class="relative mb-3">
                                        <x-label for="client_type" value="{{ __('Type') }}" />
                                        <div class="mb-3">
                                            <select id="client_type" name="client_type" class="form-select custom-select">
                                                <option value="">{{ __('Select Type') }}</option>
                                                <option value="individual">
                                                    Individual
                                                </option>
                                                <option value="agency">
                                                    Agency
                                                </option>
                                            </select>
                                        </div>
                                        <x-input-error for="client_type" />
                                    </div>

                                </div>

                                <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
                                    <div class="mb-3">
                                        <x-label for="account_title" value="{{ __('Account Title') }}" />
                                        <x-input id="account_title" type="text" name="account_title" :value="old('account_title')"
                                            required placeholder="Enter account title" />
                                        <x-input-error for="account_title" />
                                    </div>

                                    <div class="mb-3">
                                        <x-label for="iban_number" value="{{ __('IBAN Number') }}" />
                                        <x-input id="iban_number" type="text" name="iban_number" :value="old('iban_number')"
                                            required placeholder="Enter IBAN number" />
                                        <x-input-error for="iban_number" />
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
                                    <div class="mb-3">
                                        <x-label for="store_name" value="{{ __('Store Name') }}" />
                                        <x-input id="store_name" type="text" name="store_name" :value="old('store_name')"
                                            required placeholder="Enter store name" />
                                        <x-input-error for="store_name" />
                                    </div>

                                    <div class="mb-3">
                                        <label for="referral_code"
                                            class ='inline-block mb-2 text-base font-medium'>{{ __('Referral Code') }}
                                        </label>
                                        <x-input id="referral_code" type="text" name="referral_code"
                                            :value="old('referral_code')" placeholder="Enter referral code (optional)" />
                                        <x-input-error for="referral_code" />
                                    </div>

                                </div>

                                @php
                                    $countries = App\Models\Country::all();
                                @endphp
                                <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">

                                    <div class="relative mb-3">
                                        <x-label for="country_id" value="{{ __('Select Country') }}" />
                                        <div class="mb-3">
                                            <select id="country_id" name="country_id" class="form-select custom-select">
                                                <option value="">{{ __('Select Country') }}</option>
                                                @foreach ($countries as $country)
                                                    <option value="{{ $country->id }}"
                                                        data-code="{{ strtolower($country->code) }}">
                                                        {{ $country->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                </div>




                                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                                    <div class="mt-4">
                                        <label for="terms">
                                            <div class="flex items-center">
                                                <x-checkbox name="terms" id="terms" required />
                                                <div class="ms-2">
                                                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                        'terms_of_service' =>
                                                            '<a target="_blank" href="' .
                                                            route('terms.show') .
                                                            '" class="text-sm text-gray-600 underline rounded-md dark:text-slate-400 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">' .
                                                            __('Terms of Service') .
                                                            '</a>',
                                                        'privacy_policy' =>
                                                            '<a target="_blank" href="' .
                                                            route('policy.show') .
                                                            '" class="text-sm text-gray-600 underline rounded-md dark:text-slate-400 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">' .
                                                            __('Privacy Policy') .
                                                            '</a>',
                                                    ]) !!}
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                @endif

                                <div class="mt-5">
                                    <button type="submit"
                                        class="w-full text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">Sign
                                        Up</button>
                                </div>
                            </form>

                            <div class="mt-10 text-center">
                                <p class="mb-0 text-slate-500 dark:text-zink-200">Already have an account? <a
                                        href="{{ route('login') }}"
                                        class="font-semibold underline transition-all duration-150 ease-linear text-slate-500 dark:text-zink-200 hover:text-custom-500 dark:hover:text-custom-500">Login</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @push('scripts')
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const selectElement = document.querySelector('.custom-select');

                    selectElement.addEventListener('change', function() {
                        const selectedOption = selectElement.options[selectElement.selectedIndex];
                        const countryCode = selectedOption.getAttribute('data-code');

                        if (countryCode) {
                            // Use Laravel's asset() helper to get the correct URL
                            const flagUrl = `${window.location.origin}/build/images/flags/${countryCode}.svg`;
                            selectElement.style.backgroundImage = `url(${flagUrl})`;
                            selectElement.style.backgroundRepeat = 'no-repeat';
                            selectElement.style.backgroundPosition = 'left center';
                            selectElement.style.backgroundSize = '20px 15px';
                            selectElement.style.paddingLeft = '30px'; // Adjust padding to make space for the flag
                        } else {
                            selectElement.style.backgroundImage = 'none';
                            selectElement.style.paddingLeft = 'initial';
                        }
                    });

                    // Trigger the change event to apply the initial flag
                    selectElement.dispatchEvent(new Event('change'));
                });
            </script>
        @endpush
    @endsection
