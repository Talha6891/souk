@extends('layouts.master')
@section('title')
    {{ __('Create Client') }}
@endsection

@section('content')
    {{-- breadcrumbs start --}}
    <x-page-title title="Create Order" :breadcrumbs="$breadcrumbs" />
    {{-- breadcrumb end --}}

    {{-- create form start --}}
    <div class="card">
        <div class="card-body">
            <h6 class="mb-4 text-15">Create User</h6>
            <form method="POST" action="{{ route('orders.store') }}">
                @csrf
                <div class="grid grid-cols-1 gap-x-5 md:grid-cols-2 xl:grid-cols-3">
                    @if (Auth::user()->hasRole('super-admin'))
                        {{-- user_id list --}}
                        <div class="mb-4">
                            <label for="user_id" class="inline-block mb-2 text-base font-medium">{{ __('Select User') }}<span
                                    class="text-red-500">*</span></label>
                            <select id="user_id" name="user_id"
                                class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200">
                                <option value="">{{ __('Select User') }}</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">
                                        {{ $user->first_name . ' ' . $user->last_name }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error for="user_id" />
                        </div>
                        {{-- user_id list end --}}
                    @else
                        {{-- user_id --}}
                        <div class="mb-4">
                            <label for="user_id" class="inline-block mb-2 text-base font-medium">{{ __('User Name') }}
                                <span class="text-red-500">*</span></label>
                                <input type="text" id="user_id_display"
                                class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                placeholder="Enter Name"
                                value="{{ old('user_id', $users->first_name . ' ' . $users->last_name) }}" disabled>

                         <!-- Hidden input field to ensure user_id is submitted -->
                         <input type="hidden" name="user_id" value="{{ $users->id }}">
    
                            <x-input-error for="user_id" />

                        </div>
                        {{-- user_id end --}}
                    @endif

                    {{-- order_name --}}
                    <div class="mb-4">
                        <label for="order_name" class="inline-block mb-2 text-base font-medium">{{ __('Order Name') }}<span
                                class="text-red-500">*</span></label>
                        <input type="text" id="order_name" name="order_name"
                            class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                            placeholder="Enter Order Name" value="{{ old('order_name') }}">
                        <x-input-error for="order_name" />
                    </div>
                    {{-- order_name end --}}

                    {{-- status --}}
                    <div class="mb-4">
                        <label for="status" class="inline-block mb-2 text-base font-medium">{{ __('Status') }}<span
                                class="text-red-500">*</span></label>
                        <select id="status" name="status"
                            class="form-select border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200">
                            <option value="pending" {{ old('status') === 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="processing" {{ old('status') === 'processing' ? 'selected' : '' }}>Processing
                            </option>
                            <option value="delivered" {{ old('status') === 'delivered' ? 'selected' : '' }}>Delivered
                            </option>
                            <option value="cancelled" {{ old('status') === 'cancelled' ? 'selected' : '' }}>Cancelled
                            </option>
                            <option value="refunded" {{ old('status') === 'refunded' ? 'selected' : '' }}>Refunded</option>
                            <option value="returned" {{ old('status') === 'returned' ? 'selected' : '' }}>Returned</option>
                        </select>
                        <x-input-error for="status" />
                    </div>
                    {{-- status end --}}


                    {{-- product_id --}}
                    <div class="mb-4">
                        <label for="product_id" class="inline-block mb-2 text-base font-medium">{{ __('Product') }}</label>
                        <input type="text" id="product_id" name="product_id"
                            class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                            placeholder="Enter Product ID" value="{{ old('product_id') }}">
                        <x-input-error for="custom_order_id" />
                    </div>
                    {{-- product_id end --}}

                    {{-- custom_order_id --}}
                    <div class="mb-4">
                        <label for="custom_order_id"
                            class="inline-block mb-2 text-base font-medium">{{ __('Custom Order ID') }}<span
                                class="text-red-500">*</span></label>
                        <input type="text" id="custom_order_id" name="custom_order_id"
                            class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                            placeholder="Enter Custom Order ID" value="{{ old('custom_order_id') }}" required>
                        <x-input-error for="custom_order_id" />
                    </div>
                    {{-- custom_order_id end --}}

                    {{-- customer_name --}}
                    <div class="mb-4">
                        <label for="customer_name"
                            class="inline-block mb-2 text-base font-medium">{{ __('Customer Name') }}<span
                                class="text-red-500">*</span></label>
                        <input type="text" id="customer_name" name="customer_name"
                            class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                            placeholder="Enter Customer Name" value="{{ old('customer_name') }}" required>
                        <x-input-error for="customer_name" />
                    </div>
                    {{-- customer_name end --}}

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

                    {{-- contact_no --}}
                    <div class="mb-4">
                        <label for="contact_no" class="inline-block mb-2 text-base font-medium">{{ __('Contact No') }}<span
                                class="text-red-500">*</span></label>
                        <input type="text" id="contact_no" name="contact_no"
                            class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                            minlength="10" maxlength="15" placeholder="Enter Contact No"
                            value="{{ old('contact_no') }}" required>
                        <x-input-error for="contact_no" />
                    </div>
                    {{-- contact_no end --}}

                    {{-- city --}}
                    <div class="mb-4">
                        <label for="city" class="inline-block mb-2 text-base font-medium">{{ __('City') }}<span
                                class="text-red-500">*</span></label>
                        <input type="text" id="city" name="city"
                            class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                            placeholder="Enter City" value="{{ old('city') }}" required>
                        <x-input-error for="city" />
                    </div>
                    {{-- city end --}}

                    {{-- country --}}
                    <div class="mb-4">
                        <label for="country_id"
                            class="inline-block mb-2 text-base font-medium">{{ __('Select Country') }}<span
                                class="text-red-500">*</span></label>
                        <select id="country_id" name="country_id"
                            class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200">
                            <option value="">{{ __('Select Country') }}</option>
                            @foreach ($countries as $country)
                                <option value="{{ $country->id }}" data-code="{{ strtolower($country->code) }}">
                                    {{ $country->name }}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error for="country_id" />
                    </div>
                    {{-- country end --}}

                    {{-- quantity --}}
                    <div class="mb-4">
                        <label for="quantity" class="inline-block mb-2 text-base font-medium">{{ __('Quantity') }}<span
                                class="text-red-500">*</span></label>
                        <input type="number" id="quantity" name="quantity"
                            class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                            placeholder="Enter Quantity" value="{{ old('quantity') }}" required>
                        <x-input-error for="quantity" />
                    </div>
                    {{-- quantity end --}}

                    {{-- total_price --}}
                    <div class="mb-4">
                        <label for="total_price"
                            class="inline-block mb-2 text-base font-medium">{{ __('Total Price') }}<span
                                class="text-red-500">*</span></label>
                        <input type="number" id="total_price" name="total_price"
                            class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                            placeholder="Enter Total Price" value="{{ old('total_price') }}" step="0.01"
                            min="0" required>
                        <x-input-error for="total_price" />
                    </div>
                    {{-- total_price end --}}

                    {{-- shipping_address --}}
                    <div class="mb-4">
                        <label for="shipping_address"
                            class="inline-block mb-2 text-base font-medium">{{ __('Shipping Address') }}<span
                                class="text-red-500">*</span></label>
                        <textarea id="shipping_address" name="shipping_address"
                            class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                            placeholder="Enter Shipping Address" required>{{ old('shipping_address') }}</textarea>
                        <x-input-error for="shipping_address" />
                    </div>
                    {{-- shipping_address end --}}

                </div>
                @can('order create')
                    <div class="flex justify-end gap-2">
                        <a href="{{ route('users.index') }}"
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
    {{-- create form end --}}
@endsection

@push('scripts')
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endpush
