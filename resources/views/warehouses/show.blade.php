@extends('layouts.master')
@section('title')
    {{ __('Create Client') }}
@endsection

@section('content')
    {{-- breadcrumbs start --}}
    <x-page-title title="Create" :breadcrumbs="$breadcrumbs"/>
    {{-- breadcrumb end --}}

    {{-- create form start --}}
    <div class="card">
        <div class="card-body">
            <h6 class="mb-4 text-15">Create User</h6>
            <form >
                <div class="grid grid-cols-1 gap-x-5 md:grid-cols-2 xl:grid-cols-3">
                    {{-- name --}}
                    <div class="mb-4">
                        <label for="name" class="inline-block mb-2 text-base font-medium">{{ __('Warehouse Name') }} <span
                                class="text-red-500">*</span></label>
                        <input type="text" id="name" name="name"
                               class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                               placeholder="Enter WarehouseName" value="{{ old('name', $warehouse->name) }}" readonly>
                    </div>
                    {{-- name end --}}

                    {{-- contact_no  --}}
                    <div class="mb-4">
                        <label for="contact_no" class="inline-block mb-2 text-base font-medium">{{ __('Contact No') }}
                            <span class="text-red-500">*</span></label>
                        <input type="text" id="contact_no" name="contact_no"
                               class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                               minlength="10" max="15" placeholder="Enter contact no" value="{{ old('contact_no', $warehouse->contact_no) }}" readonly >
                    </div>
                    {{--  contact_no end  --}}

                    {{-- address --}}
                    <div class="mb-4">
                        <label for="address" class="inline-block mb-2 text-base font-medium">{{ __('Address') }}<span
                                class="text-red-500">*</span></label>
                        <textarea id="address" name="address"
                                  class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                  placeholder="Enter Address" readonly>{{ old('address', $warehouse->address) }}</textarea>
                    </div>
                    {{-- address end --}}

                    {{-- city --}}
                    <div class="mb-4">
                        <label for="city" class="inline-block mb-2 text-base font-medium">{{ __('City') }}<span
                                class="text-red-500">*</span></label>
                        <input type="text" id="city" name="city"
                               class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                               placeholder="Enter city" value="{{ old('city', $warehouse->city) }}" readonly>
                    </div>
                    {{-- city end --}}

                    {{--  user_id for supervisior --}}
                    <div class="mb-4">
                        <label for="user_id" class="inline-block mb-2 text-base font-medium">{{ __('Supervisor') }}
                            <span class="text-red-500">*</span></label>
                        <input type="text" id="user_id" name="user_id"
                               class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                               placeholder="Enter Supervisor" value="{{ old('user_id', $warehouse->user->first_name.' '. $warehouse->user->last_name) }}" readonly>
                    </div>
                    {{--  user_id for supervisior end --}}


                    {{--  country --}}
                    <div class="mb-4">
                        <label for="country_id" class="inline-block mb-2 text-base font-medium">{{ __('Country') }}<span
                                class="text-red-500">*</span></label>
                        <input type="text" id="country_id" name="country_id"
                               class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                               placeholder="Enter Country" value="{{ old('user_id', $warehouse->country->name) }}" readonly>
                    </div>
                    {{--  country end --}}

                </div>
                <div class="flex justify-end gap-3">
                    <a href="{{ route('warehouses.index') }}"
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
