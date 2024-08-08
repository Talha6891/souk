@extends('layouts.master')
@section('title')
    {{ __('Create Client') }}
@endsection

@section('content')
    {{-- breadcrumbs start --}}
    <x-page-title title="Show" :breadcrumbs="$breadcrumbs"/>
    {{-- breadcrumb end --}}

    {{-- create form start --}}
    <div class="card">
        <div class="card-body">
            <h6 class="mb-4 text-15">Show Client Details</h6>
            <form>
                <div class="grid grid-cols-1 gap-x-5 md:grid-cols-2 xl:grid-cols-3">
                    {{-- first name --}}
                    <div class="mb-4">
                        <label for="first_name" class="inline-block mb-2 text-base font-medium">{{ __('First Name') }} <span
                                class="text-red-500">*</span></label>
                        <input type="text" id="first_name" name="first_name"
                               class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                               value="{{ old('first_name',$client->first_name) }}" readonly>
                    </div>
                    {{-- first name end --}}

                    {{-- last name --}}
                    <div class="mb-4">
                        <label for="last_name" class="inline-block mb-2 text-base font-medium">{{ __('Last Name') }}</label>
                        <input type="text" id="last_name" name="last_name"
                               class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                               placeholder="Enter Last Name" value="{{ old('last_name', $client->last_name ?? 'N/A') }}" readonly>
                    </div>
                    {{--  last name end  --}}

                    {{-- email --}}
                    <div class="mb-4">
                        <label for="email" class="inline-block mb-2 text-base font-medium">{{ __('Email') }}<span
                                class="text-red-500">*</span></label>
                        <input type="email" id="email" name="email"
                               class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                               placeholder="Enter Email" value="{{ old('email', $client->email) }}" readonly>
                    </div>
                    {{-- email end --}}

                    {{-- whatsapp_no --}}
                    <div class="mb-4">
                        <label for="whatsapp_no" class="inline-block mb-2 text-base font-medium">Whatsapp No<span
                                class="text-red-500">*</span></label>
                        <input type="text" id="whatsapp_no" name="whatsapp_no"
                               class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                               minlength="10" maxlength="15" placeholder="Enter WhatsApp number :  +92 3039243654" value="{{ old('whatsapp_no',$client->whatsapp_no) }}" readonly>
                    </div>
                    {{-- whatsapp_no end --}}

                    {{-- city --}}
                    <div class="mb-4">
                        <label for="city" class="inline-block mb-2 text-base font-medium">{{ __('City') }}<span
                                class="text-red-500">*</span></label>
                        <input type="text" id="city" name="city"
                               class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                               placeholder="Enter city" value="{{ old('city',$client->city) }}" readonly>
                    </div>
                    {{-- city end --}}

                    {{-- address --}}
                    <div class="mb-4">
                        <label for="address" class="inline-block mb-2 text-base font-medium">{{ __('Address') }}<span
                                class="text-red-500">*</span></label>
                        <textarea id="address" name="address"
                               class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                  placeholder="Enter address"  readonly>{{ old('address',$client->address) }}</textarea>
                    </div>
                    {{-- address end --}}

                    {{-- bank_name --}}
                    <div class="mb-4">
                        <label for="bank_name" class="inline-block mb-2 text-base font-medium">{{ __('Bank Name') }}<span
                                class="text-red-500">*</span></label>
                        <input type="text" id="bank_name" name="bank_name"
                               class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                               value="{{ old('bank_name',$client->bank_name) }}" readonly>
                    </div>
                    {{-- bank_name end --}}

                    {{-- branch_code --}}
                    {{-- <div class="mb-4">
                        <label for="branch_code" class="inline-block mb-2 text-base font-medium">{{ __('Branch Code') }}<span
                                class="text-red-500">*</span></label>
                        <input type="text" id="branch_code" name="branch_code"
                               class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                               value="{{ old('branch_code', $client->branch_code) }}" readonly>
                    </div> --}}
                    {{-- branch_code end --}}

                    {{-- account_title --}}
                    <div class="mb-4">
                        <label for="account_title" class="inline-block mb-2 text-base font-medium">{{ __('Account Title') }}<span
                                class="text-red-500">*</span></label>
                        <input type="text" id="account_title" name="account_title"
                               class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                               value="{{ old('account_title', $client->account_title) }}" readonly>
                    </div>
                    {{-- account_title end --}}

                    {{-- iban_number --}}
                    <div class="mb-4">
                        <label for="iban_number" class="inline-block mb-2 text-base font-medium">{{ __('IBAN No.') }}<span
                                class="text-red-500">*</span></label>
                        <input type="text" id="iban_number" name="iban_number"
                               class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                               value="{{ old('iban_number',$client->iban_number) }}" readonly>
                    </div>
                    {{-- iban_number end --}}

                    {{-- store_name --}}
                    <div class="mb-4">
                        <label for="store_name" class="inline-block mb-2 text-base font-medium">{{ __('Store Name') }}<span
                                class="text-red-500">*</span></label>
                        <input type="text" id="store_name" name="store_name"
                               class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                               value="{{ old('store_name', $client->store_name) }}" required>
                    </div>
                    {{-- store_name end --}}

                    <div class="mb-4">
                        <label for="client_type" class="inline-block mb-2 text-base font-medium">{{ __('Type') }}<span
                                class="text-red-500">*</span></label>
                        <input type="text" id="client_type" name="client_type"
                               class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                               value="{{ old('client_type', $client->client_type) }}" required>
                    </div>

                    {{--  referral_code --}}
                    <div class="mb-4">
                        <label for="referral_code" class="inline-block mb-2 text-base font-medium">{{ __(' Referral Code') }}</label>
                        <input type="text" id="referral_code" name="referral_code"
                               class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                               value="{{ old(' referral_code', $client->user->referral_code ?? 'N/A') }}" readonly >
                    </div>
                    {{--  referral_code end --}}

                    {{--  role --}}
                    <div class="mb-4">
                        <label for="role_id" class="inline-block mb-2 text-base font-medium">{{ __('Client Role') }}</label>
                        <input type="text" id="role_id" name="role_id"
                               class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                               value="{{ old(' role_id', 'Client') }}" readonly>
                    </div>
                    {{--  role end --}}


                    {{--  country --}}
                    <div class="mb-4">
                        <label for="country_id" class="inline-block mb-2 text-base font-medium">{{ __('Client Country') }}</label>
                        <input type="text" id="country_id" name="country_id"
                               class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                               value="{{ old(' country_id', $client->country->name) }}" readonly>
                    </div>
                    {{--  country end --}}

                    {{--  verification --}}
                    <div class="mb-4">
                        <label for="verified" class="inline-block mb-2 text-base font-medium">{{ __('Verification') }}</label>
                        <input type="text" id="country_id" name="country_id"
                               class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                               value="{{ old(' verified', $client->verified ? 'Verified' : 'Unverified') }}" readonly>
                    </div>
                    {{--  verification end --}}

                </div>
                <div class="flex justify-end gap-3">
                    <a href="{{ route('clients.index') }}"
                       class="text-red-500 bg-white btn hover:text-red-500 hover:bg-red-100 focus:text-red-500 focus:bg-red-100 active:text-red-500 active:bg-red-100 dark:bg-zink-700 dark:hover:bg-red-500/10 dark:focus:bg-red-500/10 dark:active:bg-red-500/10">
                        <i data-lucide="arrow-left" class="inline-block size-4"></i><span class="align-middle">Back</span>
                    </a>
                </div>
            </form>
        </div>
    </div>
    {{-- create form end--}}
@endsection

@push('scripts')
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endpush
