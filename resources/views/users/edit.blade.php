@extends('layouts.master')
@section('title')
    {{ __('Create Client') }}
@endsection

@section('content')
    {{-- breadcrumbs start --}}
    <x-page-title title="Edit" :breadcrumbs="$breadcrumbs"/>
    {{-- breadcrumb end --}}

    {{-- create form start --}}
    <div class="card">
        <div class="card-body">
            <h6 class="mb-4 text-15">Create User</h6>
            <form method="POST" action="{{ route('users.update', $user) }}" >
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 gap-x-5 md:grid-cols-2 xl:grid-cols-3">
                    {{-- first name --}}
                    <div class="mb-4">
                        <label for="first_name" class="inline-block mb-2 text-base font-medium">{{ __('First Name') }} <span
                                class="text-red-500">*</span></label>
                        <input type="text" id="first_name" name="first_name"
                               class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                               placeholder="Enter First Name" value="{{ old('first_name', $user->first_name) }}" required>
                        <x-input-error for="first_name" />

                    </div>
                    {{-- first name end --}}

                    {{-- last name --}}
                    <div class="mb-4">
                        <label for="last_name" class="inline-block mb-2 text-base font-medium">{{ __('Last Name') }}</label>
                        <input type="text" id="last_name" name="last_name"
                               class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                               placeholder="Enter Last Name" value="{{ old('last_name',$user->last_name ?? ' ') }}" >
                        <x-input-error for="last_name" />
                    </div>
                    {{--  last name end  --}}

                    {{-- email --}}
                    <div class="mb-4">
                        <label for="email" class="inline-block mb-2 text-base font-medium">{{ __('Email') }}<span
                                class="text-red-500">*</span></label>
                        <input type="email" id="email" name="email"
                               class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                               placeholder="Enter Email" value="{{ old('email', $user->email) }}" required>
                        <x-input-error for="email" />
                    </div>
                    {{-- email end --}}

                    {{-- whatsapp_no --}}
                    <div class="mb-4">
                        <label for="whatsapp_no" class="inline-block mb-2 text-base font-medium">Whatsapp No<span
                                class="text-red-500">*</span></label>
                        <input type="text" id="whatsapp_no" name="whatsapp_no"
                               class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                               minlength="10" maxlength="15" placeholder="Enter WhatsApp number :  +92 3039243654" value="{{ old('whatsapp_no',$user->whatsapp_no) }}" required>
                        <x-input-error for="whatsapp_no" />
                    </div>
                    {{-- whatsapp_no end --}}

                    {{-- city --}}
                    <div class="mb-4">
                        <label for="city" class="inline-block mb-2 text-base font-medium">{{ __('City') }}<span
                                class="text-red-500">*</span></label>
                        <input type="text" id="city" name="city"
                               class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                               placeholder="Enter city" value="{{ old('city', $user->city) }}" required>
                        <x-input-error for="city" />
                    </div>
                    {{-- city end --}}

                    {{-- address --}}
                    <div class="mb-4">
                        <label for="address" class="inline-block mb-2 text-base font-medium">{{ __('Address') }}<span
                                class="text-red-500">*</span></label>
                        <textarea id="address" name="address"
                               class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                               placeholder="Enter address" required>{{ old('address',$user->address) }}</textarea>
                        <x-input-error for="address" />
                    </div>
                    {{-- address end --}}

                    {{-- bank_name --}}
                    <div class="mb-4">
                        <label for="bank_name" class="inline-block mb-2 text-base font-medium">{{ __('Bank Name') }}<span
                                class="text-red-500">*</span></label>
                        <input type="text" id="bank_name" name="bank_name"
                               class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                               placeholder="Enter bank name" value="{{ old('bank_name',$user->bank_name) }}" required>
                        <x-input-error for="bank_name" />
                    </div>
                    {{-- bank_name end --}}

                    {{-- branch_code --}}
                    <div class="mb-4">
                        <label for="branch_code" class="inline-block mb-2 text-base font-medium">{{ __('Branch Code') }}<span
                                class="text-red-500">*</span></label>
                        <input type="text" id="branch_code" name="branch_code"
                               class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                               placeholder="Enter branch code" value="{{ old('branch_code',$user->branch_code) }}" required>
                        <x-input-error for="branch_code" />
                    </div>
                    {{-- branch_code end --}}

                    {{-- account_title --}}
                    <div class="mb-4">
                        <label for="account_title" class="inline-block mb-2 text-base font-medium">{{ __('Account Title') }}<span
                                class="text-red-500">*</span></label>
                        <input type="text" id="account_title" name="account_title"
                               class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                               placeholder="Enter account title" value="{{ old('account_title',$user->account_title) }}" required>
                        <x-input-error for="account_title" />
                    </div>
                    {{-- account_title end --}}

                    {{-- iban_number --}}
                    <div class="mb-4">
                        <label for="iban_number" class="inline-block mb-2 text-base font-medium">{{ __('IBAN No.') }}<span
                                class="text-red-500">*</span></label>
                        <input type="text" id="iban_number" name="iban_number"
                               class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                               placeholder="Enter iban no." value="{{ old('iban_number',$user->iban_number) }}" required>
                        <x-input-error for="iban_number" />
                    </div>
                    {{-- iban_number end --}}

                    {{-- store_name --}}
                    <div class="mb-4">
                        <label for="store_name" class="inline-block mb-2 text-base font-medium">{{ __('Store Name') }}<span
                                class="text-red-500">*</span></label>
                        <input type="text" id="store_name" name="store_name"
                               class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                               placeholder="Enter store name" value="{{ old('store_name',$user->store_name) }}" required>
                        <x-input-error for="store_name" />
                    </div>
                    {{-- store_name end --}}

                    {{--  referral_code --}}
                    <div class="mb-4">
                        <label for="referral_code" class="inline-block mb-2 text-base font-medium">{{ __(' Referral Code') }}</label>
                        <input type="text" id="referral_code" name="referral_code"
                               class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                               placeholder="Enter  referral code" value="{{ old(' referral_code',$user->referral_code ?? ' ') }}" >
                        <x-input-error for="referral_code" />
                    </div>
                    {{--  referral_code end --}}

                    {{--  role --}}
                    <div class="mb-4">
                        <label for="role_id" class="inline-block mb-2 text-base font-medium">{{ __('Select Role') }}<span
                                class="text-red-500">*</span></label>

                        <select id="role_id" name="role_id" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200">
                            <option value="">{{ __('Select Role') }}</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}" {{ $user->roles->contains($role->id) ? 'selected' : '' }}>
                                    {{ $role->name }}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error for="role_id" />
                    </div>
                    {{--  role end --}}

                    {{--  country --}}
                    <div class="mb-4">
                        <label for="country_id" class="inline-block mb-2 text-base font-medium">{{ __('Select Country') }}<span
                                class="text-red-500">*</span></label>

                        <select id="country_id" name="country_id" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200">
                            <option value="">{{ __('Select Country') }}</option>
                            @foreach ($countries as $country)
                                <option value="{{ $country->id }}" data-code="{{ strtolower($country->code) }}" @selected($country->id == $user->country->id )>
                                    {{ $country->name }}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error for="country_id" />
                    </div>
                    {{--  country end --}}

                    {{-- verified --}}
                    <div class="mb-4">
                        <label for="verified" class="inline-block mb-2 text-base font-medium">{{ __('Verify User') }}</label>

                        <select id="verified" name="verified" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200">
                            <option value="0" {{ old('verified', $user->verified ?? 0) == 0 ? 'selected' : '' }}>{{ __('Unverified') }}</option>
                            <option value="1" {{ old('verified', $user->verified ?? 1) == 1 ? 'selected' : '' }}>{{ __('Verified') }}</option>
                        </select>
                        <x-input-error for="verified" />
                    </div>
                    {{-- verified end --}}

                </div>
                @can('user update')
                <div class="flex justify-end gap-2">
                    <a href="{{ route('users.index') }}"
                       class="text-red-500 bg-white btn hover:text-red-500 hover:bg-red-100 focus:text-red-500 focus:bg-red-100 active:text-red-500 active:bg-red-100 dark:bg-zink-700 dark:hover:bg-red-500/10 dark:focus:bg-red-500/10 dark:active:bg-red-500/10">
                        <i data-lucide="x" class="inline-block size-4"></i><span class="align-middle">Cancel</span>
                    </a>
                    <button type="submit"
                            class="text-white transition-all duration-200 ease-linear btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100">
                        Update
                    </button>
                </div>
                @endcan
            </form>
        </div>
    </div>
    {{-- create form end--}}
@endsection

@push('scripts')
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endpush
