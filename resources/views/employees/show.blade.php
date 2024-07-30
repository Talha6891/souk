@extends('layouts.master')
@section('title')
    {{ __('Create Employee') }}
@endsection

@section('content')
    {{-- breadcrumbs start --}}
    <x-page-title title="Show" :breadcrumbs="$breadcrumbs"/>
    {{-- breadcrumb end --}}

    {{-- create form start --}}
    <div class="card">
        <div class="card-body">
            <h6 class="mb-4 text-15">Show Employee Details</h6>
            <form>
                <div class="grid grid-cols-1 gap-x-5 md:grid-cols-2 xl:grid-cols-3">
                    {{-- first name --}}
                    <div class="mb-4">
                        <label for="first_name" class="inline-block mb-2 text-base font-medium">{{ __('First Name') }} <span
                                class="text-red-500">*</span></label>
                        <input type="text" id="first_name" name="first_name"
                               class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                               value="{{ old('first_name',$employee->first_name) }}" readonly>
                    </div>
                    {{-- first name end --}}

                    {{-- last name --}}
                    <div class="mb-4">
                        <label for="last_name" class="inline-block mb-2 text-base font-medium">{{ __('Last Name') }}</label>
                        <input type="text" id="last_name" name="last_name"
                               class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                               placeholder="Enter Last Name" value="{{ old('last_name', $employee->last_name ?? 'N/A') }}" readonly>
                    </div>
                    {{--  last name end  --}}

                    {{-- email --}}
                    <div class="mb-4">
                        <label for="email" class="inline-block mb-2 text-base font-medium">{{ __('Email') }}<span
                                class="text-red-500">*</span></label>
                        <input type="email" id="email" name="email"
                               class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                               placeholder="Enter Email" value="{{ old('email', $employee->email) }}" readonly>
                    </div>
                    {{-- email end --}}

                    {{-- gender --}}
                    <div class="mb-4">
                        <label for="gender" class="inline-block mb-2 text-base font-medium">Gender<span
                                class="text-red-500">*</span></label>
                        <input type="text" id="gender" name="gender"
                               class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                               placeholder="Enter Gender" value="{{ old('gender',$employee->gender) }}" readonly>
                    </div>
                    {{-- gender end --}}

                    {{-- religion --}}
                    <div class="mb-4">
                        <label for="religion" class="inline-block mb-2 text-base font-medium">{{ __('Religion') }}<span
                                class="text-red-500">*</span></label>
                        <input type="text" id="religion" name="religion"
                               class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                               placeholder="Enter Religion" value="{{ old('religion',$employee->religion) }}" readonly>
                    </div>
                    {{-- religion end --}}

                    {{-- blood_group --}}
                    <div class="mb-4">
                        <label for="blood_group" class="inline-block mb-2 text-base font-medium">{{ __('Blood Group') }}</label>
                        <input type="text" id="blood_group" name="blood_group"
                               class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                               value="{{ old('blood_group',$employee->blood_group ?? 'N/A') }}" readonly>
                    </div>
                    {{-- blood_group end --}}

                    {{-- dob --}}
                    <div class="mb-4">
                        <label for="dob" class="inline-block mb-2 text-base font-medium">{{ __('Date of Birth') }}<span
                                class="text-red-500">*</span></label>
                        <input type="text" id="dob" name="dob"
                               class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                               value="{{ old('dob', $employee->dob) }}" readonly>
                    </div>
                    {{-- dob end --}}

                    {{-- joining_date --}}
                    <div class="mb-4">
                        <label for="joining_date" class="inline-block mb-2 text-base font-medium">{{ __('Joining Date') }}<span
                                class="text-red-500">*</span></label>
                        <input type="text" id="joining_date" name="joining_date"
                               class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                               value="{{ old('joining_date', $employee->joining_date) }}" readonly>
                    </div>
                    {{-- joining_date end --}}

                    {{-- department_id --}}
                    <div class="mb-4">
                        <label for="department_id" class="inline-block mb-2 text-base font-medium">{{ __('Department') }}<span
                                class="text-red-500">*</span></label>
                        <input type="text" id="department_id" name="department_id"
                               class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                               value="{{ old('department_id',$employee->department->name ?? 'N/A') }}" readonly>
                    </div>
                    {{-- department_id end --}}

                    {{-- designation_id --}}
                    <div class="mb-4">
                        <label for="designation_id" class="inline-block mb-2 text-base font-medium">{{ __('Designation') }}<span
                                class="text-red-500">*</span></label>
                        <input type="text" id="designation_id" name="designation_id"
                               class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                               value="{{ old('designation_id', $employee->designation->name) }}" required>
                    </div>
                    {{-- designation_id end --}}


                    {{--  role --}}
                    <div class="mb-4">
                        <label for="role_id" class="inline-block mb-2 text-base font-medium">{{ __('employee Role') }}</label>
                        <input type="text" id="role_id" name="role_id"
                               class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                               value="{{ old(' role_id', $employee->user->roles->first()->name) ?? 'N/A' }}" readonly>
                    </div>
                    {{--  role end --}}

                    {{-- address --}}
                <div class="mb-4">
                    <label for="address" class="inline-block mb-2 text-base font-medium">{{ __('Address') }}<span
                            class="text-red-500">*</span></label>
                    <textarea id="address" name="address"
                           class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                              placeholder="Enter address"  readonly>{{ old('address',$employee->address) }}</textarea>
                </div>
                {{-- address end --}}

                </div>
                <div class="flex justify-end gap-3">
                    <a href="{{ route('employees.index') }}"
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
