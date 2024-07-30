@extends('layouts.master')
@section('title')
    {{ __('Create Employee') }}
@endsection

@section('content')
    {{-- breadcrumbs start --}}
    <x-page-title title="Create" :breadcrumbs="$breadcrumbs"/>
    {{-- breadcrumb end --}}

    {{-- create form start --}}
    <div class="card">
        <div class="card-body">
            <h6 class="mb-4 text-15">Create Employee</h6>
            <form method="POST" action="{{ route('employees.store') }}" >
                @csrf
                <div class="grid grid-cols-1 gap-x-5 md:grid-cols-2 xl:grid-cols-3">
                    {{-- first name --}}
                    <div class="mb-4">
                        <label for="first_name" class="inline-block mb-2 text-base font-medium">{{ __('First Name') }} <span
                                class="text-red-500">*</span></label>
                        <input type="text" id="first_name" name="first_name"
                               class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                               placeholder="Enter First Name" value="{{ old('first_name') }}" required>
                        <x-input-error for="first_name" />

                    </div>
                    {{-- first name end --}}

                    {{-- last name --}}
                    <div class="mb-4">
                        <label for="last_name" class="inline-block mb-2 text-base font-medium">{{ __('Last Name') }}</label>
                        <input type="text" id="last_name" name="last_name"
                               class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                               placeholder="Enter Last Name" value="{{ old('last_name') }}" >
                        <x-input-error for="last_name" />
                    </div>
                    {{--  last name end  --}}

                    {{-- email --}}
                    <div class="mb-4">
                        <label for="email" class="inline-block mb-2 text-base font-medium">{{ __('Email') }}<span
                                class="text-red-500">*</span></label>
                        <input type="email" id="email" name="email"
                               class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                               placeholder="Enter Email" value="{{ old('email') }}" required>
                        <x-input-error for="email" />
                    </div>
                    {{-- email end --}}

                    {{-- password --}}
                    <div class="mb-4">
                        <label for="password" class="inline-block mb-2 text-base font-medium">Password<span
                                class="text-red-500">*</span></label>
                        <input type="password" id="password" name="password"
                               class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                               placeholder="Enter password" required>
                        <x-input-error for="password" />
                    </div>
                    {{-- password end --}}

                      {{-- password confirmation --}}
                      <div class="mb-4">
                        <label for="password_confirmation" class="inline-block mb-2 text-base font-medium">Password Confirmation<span
                                class="text-red-500">*</span></label>
                        <input type="password" id="password_confirmation" name="password_confirmation"
                               class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                               placeholder="Enter confirm password" required>
                        <x-input-error for="password_confirmation" />
                    </div>
                    {{-- password confirmation end --}}

                    {{-- dob --}}
                    <div class="mb-4">
                        <label for="dob" class="inline-block mb-2 text-base font-medium">{{ __('Date of Birth') }}<span
                                class="text-red-500">*</span></label>
                        <input type="date" id="dob" name="dob"
                               class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                               placeholder="Enter date of birth" value="{{ old('dob') }}" required>
                        <x-input-error for="dob" />
                    </div>
                    {{-- dob end --}}

                    {{-- gender --}}
                      <div class="mb-4">
                        <label for="gender" class="inline-block mb-2 text-base font-medium">{{ __('Select Gender') }}<span
                                class="text-red-500">*</span></label>

                        <select id="gender" name="gender" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200">
                            <option value="">{{ __('Select Gender') }}</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                        </select>
                        <x-input-error for="gender" />
                    </div>
                    {{-- gender end --}}

                    {{-- blood group --}}
                    <div class="mb-4">
                        <label for="blood_group" class="inline-block mb-2 text-base font-medium">
                            {{ __('Select Blood Group') }}
                        </label>

                        <select id="blood_group" name="blood_group"
                                class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200">
                            <option value="">{{ __('Select Blood Group') }}</option>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                        </select>
                        <x-input-error for="blood_group" />
                    </div>
                    {{-- blood group end --}}

                    {{-- religion --}}
                    <div class="mb-4">
                        <label for="religion" class="inline-block mb-2 text-base font-medium">{{ __('religion') }}</label>
                        <input type="text" id="religion" name="religion"
                               class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                               placeholder="Enter religion" value="{{ old('religion') }}">
                        <x-input-error for="religion" />
                    </div>
                    {{-- religion end --}}

                    {{-- joining_date --}}
                    <div class="mb-4">
                        <label for="joining_date" class="inline-block mb-2 text-base font-medium">{{ __('Joining Date') }}<span
                                class="text-red-500">*</span></label>
                        <input type="date" id="joining_date" name="joining_date"
                               class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                               placeholder="Enter joining date" value="{{ old('dob') }}" required>
                        <x-input-error for="dob" />
                    </div>
                    {{-- joining_date end --}}

                    {{--  department_id --}}
                    <div class="mb-4">
                        <label for="department_id" class="inline-block mb-2 text-base font-medium">{{ __('Select Department') }}<span
                                class="text-red-500">*</span></label>

                        <select id="department_id" name="department_id" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200">
                            <option value="">{{ __('Select department') }}</option>
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}">
                                    {{ $department->name }}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error for="department_id" />
                    </div>
                    {{--  department end --}}

                    {{--  designation_id --}}
                    <div class="mb-4">
                        <label for="designation_id" class="inline-block mb-2 text-base font-medium">{{ __('Select Designation') }}<span
                                class="text-red-500">*</span></label>

                        <select id="designation_id" name="designation_id" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200">
                            <option value="">{{ __('Select designation') }}</option>
                            @foreach ($designations as $designation)
                                <option value="{{ $designation->id }}">
                                    {{ $designation->name }}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error for="designation_id" />
                    </div>
                    {{--  designation end --}}

                    {{--  role_id --}}
                    <div class="mb-4">
                        <label for="role_id" class="inline-block mb-2 text-base font-medium">{{ __('Select Role') }}<span
                                class="text-red-500">*</span></label>
                        <select id="role_id" name="role_id" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200">
                            <option value="">{{ __('Select role') }}</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">
                                    {{ $role->name }}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error for="designation_id" />
                    </div>
                    {{--  role_id end --}}

                    {{-- address --}}
                    <div class="mb-4">
                        <label for="address" class="inline-block mb-2 text-base font-medium">{{ __('Address') }}<span
                                class="text-red-500">*</span></label>
                        <textarea  id="address" name="address"
                               class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                               placeholder="Enter address" required>{{ old('address') }}</textarea>
                        <x-input-error for="address" />
                    </div>
                    {{-- address end --}}


                </div>
                @can('employee create')
                <div class="flex justify-end gap-2">
                    <a href="{{ route('employees.index') }}"
                            class="text-red-500 bg-white btn hover:text-red-500 hover:bg-red-100 focus:text-red-500 focus:bg-red-100 active:text-red-500 active:bg-red-100 dark:bg-zink-700 dark:hover:bg-red-500/10 dark:focus:bg-red-500/10 dark:active:bg-red-500/10">
                        <i data-lucide="x" class="inline-block size-4"></i><span class="align-middle">Cancel</span>
                    </a>
                    <button type="submit"
                            class="text-white transition-all duration-200 ease-linear btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100">
                        Create
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
