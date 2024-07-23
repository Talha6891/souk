@extends('layouts.master')
@section('title')
    {{ __('Order Show') }}
@endsection
@section('content')
    <!-- page title -->
    <x-page-title title="Order Details" pagetitle="Invoice" />

    <div class="card">
        <div class="card-body">
            <form action="javascript:void(0)">
                <h6 class="my-5 underline text-16">Customer Info:</h6>
                <div class="grid grid-cols-1 gap-5 xl:grid-cols-12 changeAddress mt-3">
{{-- customer_name--}}
                    <div class="xl:col-span-3">
                        <label for="customer_name" class="inline-block mb-2 text-base font-medium">Customer Name</label>
                        <input type="text" id="customer_name" name="customer_name"
                               class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                               placeholder="Customer Name" value="{{ old('customer_name', $order->customer_name) }}" readonly>
                    </div>
                    {{-- customer_name end --}}

                    <div class="xl:col-span-3">
                        <label for="email"
                               class="inline-block mb-2 text-base font-medium">Email</label>
                        <input type="email" id="email" name="email"
                               class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                              value="{{ old('email', $order->email) }}" readonly>
                    </div>
                    <!--end col-->
                    <div class="xl:col-span-3">
                        <label for="contact_no" class="inline-block mb-2 text-base font-medium">Contact No</label>
                        <input type="text" id="contact_no" name="contact_no"
                               class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                              value="{{ old('contact_no', $order->contact_no) }}" readonly>
                    </div>
                    <!--end col-->

                    <div class="xl:col-span-3">
                        <label for="city" class="inline-block mb-2 text-base font-medium">City</label>
                        <input type="text" id="city" name="city"
                               class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                               value="{{ old('city', $order->city) }}" readonly>
                    </div>
                    <!--end col-->

                    <div class="xl:col-span-3">
                        <label for="country_id" class="inline-block mb-2 text-base font-medium">Country</label>
                        <input type="text" id="country_id" name="country_id"
                               class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                               value="{{ old('country_id', $order->country->name) }}" readonly>
                    </div>
                    <!--end col-->

                    <div class="xl:col-span-12">
                        <label for="shipping_address" class="inline-block mb-2 text-base font-medium">Shipping Address</label>
                        <textarea
                            class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                            placeholder="Address" id="shipping_address" name="shipping_address" rows="3">{{ old('shipping_address',$order->shipping_address) }}</textarea>
                    </div><!--end col-->
                </div><!--end grid-->

{{--                <div class="flex items-center mt-5">--}}
{{--                    <div class="relative inline-block w-10 mr-2 align-middle transition duration-200 ease-in">--}}
{{--                        <input type="checkbox" name="customSoftSwitch" id="customSoftSwitch"--}}
{{--                               class="absolute block size-5 transition duration-300 ease-linear border-2 rounded-full appearance-none cursor-pointer border-slate-200 dark:border-zink-600 bg-white/80 dark:bg-zink-400 peer/published checked:bg-custom-500 dark:checked:bg-custom-500 ltr:checked:right-0 rtl:checked:left-0 checked:border-custom-100 dark:checked:border-custom-900 arrow-none checked:bg-none">--}}
{{--                        <label for="customSoftSwitch"--}}
{{--                               class="block h-5 overflow-hidden duration-300 ease-linear border rounded-full cursor-pointer cursor-pointertransition border-slate-200 dark:border-zink-500 bg-slate-200 dark:bg-zink-600 peer-checked/published:bg-custom-100 dark:peer-checked/published:bg-custom-900 peer-checked/published:border-custom-100 dark:peer-checked/published:border-custom-900"></label>--}}
{{--                    </div>--}}
{{--                    <label for="customSoftSwitch" class="inline-block text-base font-medium">Will your Shipping & Billing--}}
{{--                        address same?</label>--}}
{{--                </div>--}}

                <h6 class="my-5 mt-6 underline text-16">Order(s) Info:</h6>
                <div class="grid grid-cols-1 gap-5 xl:grid-cols-12 mt-3">

                    <div class="xl:col-span-3">
                        <label for="user_id" class="inline-block mb-2 text-base font-medium">Store Name</label>
                        <input type="text" id="user_id" name="user_id"
                               class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                               placeholder="Enter custom order id" value="{{ old('order_id',$order->user->store_name) }}" readonly>
                    </div>

                    <div class="xl:col-span-3">
                        <label for="order_name" class="inline-block mb-2 text-base font-medium">Order Name</label>
                        <input type="text" id="order_name" name="order_name"
                               class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                               value="{{ old('order_name',$order->order_name) }}" readonly>
                    </div>

                    {{--  order_id--}}
                    <div class="xl:col-span-3">
                        <label for="order_id" class="inline-block mb-2 text-base font-medium">Order ID</label>
                        <input type="text" id="order_id" name="order_id"
                               class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                               placeholder="Enter custom order id" value="{{ old('order_id',$order->id) }}" readonly>
                    </div>
                    {{-- customer_name--}}
                    <div class="xl:col-span-3">
                        <label for="custom_order_id" class="inline-block mb-2 text-base font-medium">Custom Order Id</label>
                        <input type="text" id="custom_order_id" name="custom_order_id"
                               class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                               value="{{ old('custom_order_id',$order->custom_order_id) }}" readonly>
                    </div>
                    <!--end col-->
                    <div class="xl:col-span-3">
                        <label for="quantity" class="inline-block mb-2 text-base font-medium">Quantity</label>
                        <input type="text" id="quantity" name="quantity"
                               class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                               value="{{ old('quantity',$order->quantity) }}" readonly>
                    </div>
                    <!--end col-->
                    <div class="xl:col-span-3">
                        <label for="total_price" class="inline-block mb-2 text-base font-medium">Total Price
                            </label>
                        <input type="text" id="total_price" name="total_price"
                               class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                               value="{{ old('total_price', number_format($order->total_price,2)) }}" readonly>
                    </div><!--end col-->
                </div><!--end grid-->

{{--                <h6 class="my-5 underline text-16">Products Info:</h6>--}}

{{--                <div class="overflow-x-auto">--}}
{{--                    <table class="w-full whitespace-nowrap">--}}
{{--                        <thead>--}}
{{--                        <tr>--}}
{{--                            <th--}}
{{--                                class="px-3.5 py-2.5 font-medium text-sm text-slate-500 uppercase border border-slate-200 dark:text-zink-200 dark:border-zink-500">--}}
{{--                                Item Name</th>--}}
{{--                            <th--}}
{{--                                class="px-3.5 py-2.5 font-medium text-sm text-slate-500 uppercase border border-slate-200 dark:text-zink-200 dark:border-zink-500">--}}
{{--                                Quantity</th>--}}
{{--                            <th--}}
{{--                                class="px-3.5 py-2.5 font-medium text-sm text-slate-500 uppercase border border-slate-200 dark:text-zink-200 dark:border-zink-500">--}}
{{--                                Price</th>--}}
{{--                            <th--}}
{{--                                class="px-3.5 py-2.5 font-medium text-sm text-slate-500 uppercase border border-slate-200 dark:text-zink-200 dark:border-zink-500">--}}
{{--                                Discount</th>--}}
{{--                            <th--}}
{{--                                class="px-3.5 py-2.5 font-medium text-sm text-slate-500 uppercase border border-slate-200 dark:text-zink-200 dark:border-zink-500">--}}
{{--                                TAX</th>--}}
{{--                            <th--}}
{{--                                class="px-3.5 py-2.5 font-medium text-sm text-slate-500 uppercase border border-slate-200 dark:text-zink-200 dark:border-zink-500 w-44">--}}
{{--                                Total</th>--}}
{{--                        </tr>--}}
{{--                        </thead>--}}
{{--                        <tbody class="before:block before:h-3 item-list">--}}
{{--                        <tr class="item">--}}
{{--                            <td class="border border-slate-200 dark:border-zink-500">--}}
{{--                                <input type="text" id="itemName1"--}}
{{--                                       class="px-3.5 py-2.5 border-none form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"--}}
{{--                                       placeholder="Item Name" required>--}}
{{--                            </td>--}}
{{--                            <td class="w-40 border border-slate-200 dark:border-zink-500">--}}
{{--                                <div class="flex justify-center text-center input-step">--}}
{{--                                    <button type="button"--}}
{{--                                            class="border size-9 leading-[15px] btn-minus bg-white dark:bg-zink-700 dark:border-zink-500 ltr:rounded-l rtl:rounded-r transition-all duration-200 ease-linear border-slate-200 text-slate-500 dark:text-zink-200 hover:bg-custom-500 dark:hover:bg-custom-500 hover:text-custom-50 dark:hover:text-custom-50 hover:border-custom-500 dark:hover:border-custom-500 focus:bg-custom-500 dark:focus:bg-custom-500 focus:border-custom-500 dark:focus:border-custom-500 focus:text-custom-50 dark:focus:text-custom-50"><i--}}
{{--                                            data-lucide="minus" class="inline-block size-4"></i></button>--}}
{{--                                    <input type="number"--}}
{{--                                           class="w-12 text-center ltr:pl-2 rtl:pr-2 h-9 border-y product-quantity dark:bg-zink-700 focus:shadow-none dark:border-zink-500 item-quantity"--}}
{{--                                           value="0" min="0" max="100" readonly="">--}}
{{--                                    <button type="button"--}}
{{--                                            class="transition-all duration-200 ease-linear bg-white border dark:bg-zink-700 dark:border-zink-500 ltr:rounded-r rtl:rounded-l size-9 border-slate-200 btn-plus text-slate-500 dark:text-zink-200 hover:bg-custom-500 dark:hover:bg-custom-500 hover:text-custom-50 dark:hover:text-custom-50 hover:border-custom-500 dark:hover:border-custom-500 focus:bg-custom-500 dark:focus:bg-custom-500 focus:border-custom-500 dark:focus:border-custom-500 focus:text-custom-50 dark:focus:text-custom-50"><i--}}
{{--                                            data-lucide="plus" class="inline-block size-4"></i></button>--}}
{{--                                </div>--}}
{{--                            </td>--}}
{{--                            <td class="w-40 border border-slate-200 dark:border-zink-500">--}}
{{--                                <input type="number" id="itemName1"--}}
{{--                                       class="px-3.5 py-2.5 border-none form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200 item-price"--}}
{{--                                       placeholder="$00.00" required>--}}
{{--                            </td>--}}
{{--                            <td class="w-40 border border-slate-200 dark:border-zink-500">--}}
{{--                                <input type="text" id="itemName1"--}}
{{--                                       class="px-3.5 py-2.5 border-none form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200 item-discount"--}}
{{--                                       placeholder="0%" required>--}}
{{--                            </td>--}}
{{--                            <td class="w-40 border border-slate-200 dark:border-zink-500">--}}
{{--                                <input type="text" id="itemName1"--}}
{{--                                       class="px-3.5 py-2.5 border-none form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200 item-text"--}}
{{--                                       placeholder="0%" required>--}}
{{--                            </td>--}}
{{--                            <td class="border border-slate-200 dark:border-zink-500" rowspan="2">--}}
{{--                                <div class="mb-1">--}}
{{--                                    <input type="text" id="ItemTotal"--}}
{{--                                           class="px-3.5 py-2.5 border-none form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200 item-line-price"--}}
{{--                                           placeholder="$00.00" readonly>--}}
{{--                                </div>--}}
{{--                                <input type="text" id="itemDiscountsInput"--}}
{{--                                       class="px-3.5 pb-2.5 pt-0 border-none form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200 cart-discount"--}}
{{--                                       placeholder="-$00.00" readonly>--}}
{{--                            </td>--}}
{{--                        </tr>--}}
{{--                        <tr>--}}
{{--                            <td class="border border-slate-200 dark:border-zink-500">--}}
{{--                                <input type="text" id="itemdescription1"--}}
{{--                                       class="px-3.5 py-2.5 border-none form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"--}}
{{--                                       placeholder="Enter Description (Optional)" required>--}}
{{--                            </td>--}}
{{--                            <td class="border border-slate-200 px-3.5 py-1.5 text-center dark:border-zink-500">--}}
{{--                                <button type="button"--}}
{{--                                        class="px-2 py-1.5 text-xs text-red-500 bg-red-100 btn hover:text-white hover:bg-red-600 focus:text-white focus:bg-red-600 focus:ring focus:ring-red-100 active:text-white active:bg-red-600 active:ring active:ring-red-100 dark:bg-red-500/20 dark:text-red-500 dark:hover:bg-red-500 dark:hover:text-white dark:focus:bg-red-500 dark:focus:text-white dark:active:bg-red-500 dark:active:text-white dark:ring-red-400/20 product-removal"><i--}}
{{--                                        data-lucide="trash-2" class="inline-block size-3 mr-1 align-middle"></i>--}}
{{--                                    <span class="align-middle">Delete</span></button>--}}
{{--                            </td>--}}
{{--                            <td colspan="3" class="border border-slate-200 dark:border-zink-500"></td>--}}
{{--                        </tr>--}}
{{--                        </tbody>--}}
{{--                        <tbody class="before:block before:h-3 item-list">--}}
{{--                        <tr class="item">--}}
{{--                            <td class="border border-slate-200 dark:border-zink-500">--}}
{{--                                <input type="text" id="itemName1"--}}
{{--                                       class="px-3.5 py-2.5 border-none form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"--}}
{{--                                       placeholder="Item Name" required>--}}
{{--                            </td>--}}
{{--                            <td class="w-40 border border-slate-200 dark:border-zink-500">--}}
{{--                                <div class="flex justify-center text-center input-step">--}}
{{--                                    <button type="button"--}}
{{--                                            class="border size-9 leading-[15px] btn-minus bg-white dark:bg-zink-700 dark:border-zink-500 ltr:rounded-l rtl:rounded-r transition-all duration-200 ease-linear border-slate-200 text-slate-500 dark:text-zink-200 hover:bg-custom-500 dark:hover:bg-custom-500 hover:text-custom-50 dark:hover:text-custom-50 hover:border-custom-500 dark:hover:border-custom-500 focus:bg-custom-500 dark:focus:bg-custom-500 focus:border-custom-500 dark:focus:border-custom-500 focus:text-custom-50 dark:focus:text-custom-50"><i--}}
{{--                                            data-lucide="minus" class="inline-block size-4"></i></button>--}}
{{--                                    <input type="number"--}}
{{--                                           class="w-12 text-center ltr:pl-2 rtl:pr-2 h-9 border-y product-quantity dark:bg-zink-700 focus:shadow-none dark:border-zink-500 item-quantity"--}}
{{--                                           value="0" min="0" max="100" readonly="">--}}
{{--                                    <button type="button"--}}
{{--                                            class="transition-all duration-200 ease-linear bg-white border dark:bg-zink-700 dark:border-zink-500 ltr:rounded-r rtl:rounded-l size-9 border-slate-200 btn-plus text-slate-500 dark:text-zink-200 hover:bg-custom-500 dark:hover:bg-custom-500 hover:text-custom-50 dark:hover:text-custom-50 hover:border-custom-500 dark:hover:border-custom-500 focus:bg-custom-500 dark:focus:bg-custom-500 focus:border-custom-500 dark:focus:border-custom-500 focus:text-custom-50 dark:focus:text-custom-50"><i--}}
{{--                                            data-lucide="plus" class="inline-block size-4"></i></button>--}}
{{--                                </div>--}}
{{--                            </td>--}}
{{--                            <td class="w-40 border border-slate-200 dark:border-zink-500">--}}
{{--                                <input type="number" id="itemName1"--}}
{{--                                       class="px-3.5 py-2.5 border-none form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200 item-price"--}}
{{--                                       placeholder="$00.00" required>--}}
{{--                            </td>--}}
{{--                            <td class="w-40 border border-slate-200 dark:border-zink-500">--}}
{{--                                <input type="text" id="itemName1"--}}
{{--                                       class="px-3.5 py-2.5 border-none form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200 item-discount"--}}
{{--                                       placeholder="0%" required>--}}
{{--                            </td>--}}
{{--                            <td class="w-40 border border-slate-200 dark:border-zink-500">--}}
{{--                                <input type="text" id="itemName1"--}}
{{--                                       class="px-3.5 py-2.5 border-none form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200 item-text"--}}
{{--                                       placeholder="0%" required>--}}
{{--                            </td>--}}
{{--                            <td class="border border-slate-200 dark:border-zink-500" rowspan="2">--}}
{{--                                <div class="mb-1">--}}
{{--                                    <input type="text" id="ItemTotal"--}}
{{--                                           class="px-3.5 py-2.5 border-none form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200 item-line-price"--}}
{{--                                           placeholder="$00.00" readonly>--}}
{{--                                </div>--}}
{{--                                <input type="text" id="itemDiscountsInput"--}}
{{--                                       class="px-3.5 pb-2.5 pt-0 border-none form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200 cart-discount"--}}
{{--                                       placeholder="-$00.00" readonly>--}}
{{--                            </td>--}}
{{--                        </tr>--}}
{{--                        <tr>--}}
{{--                            <td class="border border-slate-200 dark:border-zink-500">--}}
{{--                                <input type="text" id="itemdescription1"--}}
{{--                                       class="px-3.5 py-2.5 border-none form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"--}}
{{--                                       placeholder="Enter Description (Optional)" required>--}}
{{--                            </td>--}}
{{--                            <td class="border border-slate-200 px-3.5 py-1.5 text-center dark:border-zink-500">--}}
{{--                                <button type="button"--}}
{{--                                        class="px-2 py-1.5 text-xs text-red-500 bg-red-100 btn hover:text-white hover:bg-red-600 focus:text-white focus:bg-red-600 focus:ring focus:ring-red-100 active:text-white active:bg-red-600 active:ring active:ring-red-100 dark:bg-red-500/20 dark:text-red-500 dark:hover:bg-red-500 dark:hover:text-white dark:focus:bg-red-500 dark:focus:text-white dark:active:bg-red-500 dark:active:text-white dark:ring-red-400/20 product-removal"><i--}}
{{--                                        data-lucide="trash-2" class="inline-block size-3 mr-1 align-middle"></i>--}}
{{--                                    <span class="align-middle">Delete</span></button>--}}
{{--                            </td>--}}
{{--                            <td colspan="3" class="border border-slate-200 dark:border-zink-500"></td>--}}
{{--                        </tr>--}}
{{--                        </tbody>--}}

{{--                        <tbody class="before:block before:h-4" id="invoiceTable">--}}
{{--                        <tr>--}}
{{--                            <td colspan="6">--}}
{{--                                <a href="javascript:void(0)" id="addBtn"><button type="button"--}}
{{--                                                                                 class="bg-white border-dashed text-custom-500 btn border-custom-500 hover:text-custom-500 hover:bg-custom-50 hover:border-custom-600 focus:text-custom-600 focus:bg-custom-50 focus:border-custom-600 active:text-custom-600 active:bg-custom-50 active:border-custom-600 dark:bg-zink-700 dark:ring-custom-400/20 dark:hover:bg-custom-800/20 dark:focus:bg-custom-800/20 dark:active:bg-custom-800/20"><i--}}
{{--                                            data-lucide="plus" class="inline-block size-3 mr-1 align-middle"></i>--}}
{{--                                        <span class="align-middle">Add Item</span></button></a>--}}
{{--                            </td>--}}
{{--                        </tr>--}}
{{--                        </tbody>--}}
{{--                        <tbody class="before:block before:h-3" id="totalAmount">--}}
{{--                        <tr>--}}
{{--                            <td colspan="4"></td>--}}
{{--                            <td--}}
{{--                                class="border-b border-slate-200 px-3.5 py-2.5 text-slate-500 dark:text-zink-200 dark:border-zink-500">--}}
{{--                                Sub Total--}}
{{--                            </td>--}}
{{--                            <td class="font-medium border-b border-slate-200 dark:border-zink-500">--}}
{{--                                <input type="text" id="subTotale"--}}
{{--                                       class="px-3.5 py-2.5 border-none form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200 cart-subtotal"--}}
{{--                                       placeholder="$00.00" readonly>--}}
{{--                            </td>--}}
{{--                        </tr>--}}
{{--                        <tr>--}}
{{--                            <td colspan="4"></td>--}}
{{--                            <td--}}
{{--                                class="border-b border-slate-200 px-3.5 py-2.5 text-slate-500 dark:text-zink-200 dark:border-zink-500">--}}
{{--                                Estimated Tax (18%)--}}
{{--                            </td>--}}
{{--                            <td class="font-medium border-b border-slate-200 dark:border-zink-500">--}}
{{--                                <input type="text" id="estimatedTax"--}}
{{--                                       class="px-3.5 py-2.5 border-none form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200 cart-tax"--}}
{{--                                       placeholder="$00.00" readonly>--}}
{{--                            </td>--}}
{{--                        </tr>--}}
{{--                        <tr>--}}
{{--                            <td colspan="4"></td>--}}
{{--                            <td--}}
{{--                                class="border-b border-slate-200 px-3.5 py-2.5 text-slate-500 dark:text-zink-200 dark:border-zink-500">--}}
{{--                                Item Discounts--}}
{{--                            </td>--}}
{{--                            <td class="font-medium border-b border-slate-200 dark:border-zink-500 text-slate-500">--}}
{{--                                <input type="text" id="itemDiscounts"--}}
{{--                                       class="px-3.5 py-2.5 border-none form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200 cart-discount"--}}
{{--                                       placeholder="-$00.00" readonly>--}}
{{--                            </td>--}}
{{--                        </tr>--}}
{{--                        <tr>--}}
{{--                            <td colspan="4"></td>--}}
{{--                            <td--}}
{{--                                class="border-b border-slate-200 px-3.5 py-2.5 text-slate-500 dark:text-zink-200 dark:border-zink-500">--}}
{{--                                Shipping Charge--}}
{{--                            </td>--}}
{{--                            <td class="font-medium border-b border-slate-200 dark:border-zink-500">--}}
{{--                                <input type="text" id="shippingCharge"--}}
{{--                                       class="px-3.5 py-2.5 border-none form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200 cart-shipping"--}}
{{--                                       placeholder="$00.00" readonly>--}}
{{--                            </td>--}}
{{--                        </tr>--}}
{{--                        <tr>--}}
{{--                            <td colspan="4"></td>--}}
{{--                            <td--}}
{{--                                class="border-b border-slate-200 px-3.5 py-2.5 text-slate-500 dark:text-zink-200 dark:border-zink-500">--}}
{{--                                Total Amount--}}
{{--                            </td>--}}
{{--                            <td class="font-medium border-b border-slate-200 dark:border-zink-500">--}}
{{--                                <input type="text" id="totalAmount"--}}
{{--                                       class="px-3.5 py-2.5 border-none form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200 cart-total"--}}
{{--                                       placeholder="$00.00" readonly>--}}
{{--                            </td>--}}
{{--                        </tr>--}}
{{--                        </tbody>--}}
{{--                    </table>--}}
{{--                </div>--}}

{{--                <h6 class="my-5 underline text-16">Payments Details:</h6>--}}
{{--                <div class="grid grid-cols-1 gap-5 xl:grid-cols-12">--}}
{{--                    <div class="xl:col-span-3">--}}
{{--                        <label for="paymentMethod" class="inline-block mb-2 text-base font-medium">Full Name</label>--}}
{{--                        <select class="form-input border-slate-300 focus:outline-none focus:border-custom-500" data-choices--}}
{{--                                data-choices-search-false name="paymentMethod" id="paymentMethod">--}}
{{--                            <option value="">Select Method</option>--}}
{{--                            <option value="Credit Card">Credit Card</option>--}}
{{--                            <option value="Paypal">Paypal</option>--}}
{{--                            <option value="Paypal">Paypal</option>--}}
{{--                            <option value="American Express">American Express</option>--}}
{{--                        </select>--}}
{{--                    </div><!--end col-->--}}
{{--                    <div class="xl:col-span-3">--}}
{{--                        <label for="cardHolderName" class="inline-block mb-2 text-base font-medium">Card Holder--}}
{{--                            Name</label>--}}
{{--                        <input type="number" id="cardHolderName" inputmode="numeric" pattern="[0-9\s]{13,19}"--}}
{{--                               autocomplete="cc-number" maxlength="19"--}}
{{--                               class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"--}}
{{--                               placeholder="Full Name" required>--}}
{{--                    </div><!--end col-->--}}
{{--                    <div class="xl:col-span-3">--}}
{{--                        <label for="cardNumber" class="inline-block mb-2 text-base font-medium">Card Number</label>--}}
{{--                        <input type="text" id="cardNumber"--}}
{{--                               class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"--}}
{{--                               placeholder="xxxx xxxx xxxx xxxx" required>--}}
{{--                    </div><!--end col-->--}}
{{--                    <div class="xl:col-span-3">--}}
{{--                        <label for="totalPayment" class="inline-block mb-2 text-base font-medium ">Total Payment</label>--}}
{{--                        <input type="text" id="totalPayment"--}}
{{--                               class=" tform-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200otalPaymentinput"--}}
{{--                               placeholder="$00.00" required>--}}
{{--                    </div><!--end col-->--}}
{{--                    <div class="xl:col-span-12">--}}
{{--                        <label for="taxBillingInput" class="inline-block mb-2 text-base font-medium">Notes</label>--}}
{{--                        <textarea--}}
{{--                            class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"--}}
{{--                            placeholder="Enter notes pertaining to the customer or payment" id="taxBillingInput" rows="3"></textarea>--}}
{{--                    </div><!--end col-->--}}
{{--                </div><!--end grid-->--}}

                <div class="flex justify-end gap-2 mt-5">
                    <a href="{{ route('orders.index') }}"
                            class="text-slate-500 btn bg-slate-200 border-slate-200 hover:text-slate-600 hover:bg-slate-300 hover:border-slate-300 focus:text-slate-600 focus:bg-slate-300 focus:border-slate-300 focus:ring focus:ring-slate-100 active:text-slate-600 active:bg-slate-300 active:border-slate-300 active:ring active:ring-slate-100 dark:bg-zink-600 dark:hover:bg-zink-500 dark:border-zink-600 dark:hover:border-zink-500 dark:text-zink-200 dark:ring-zink-400/50"><i
                            data-lucide="arrow-left" class="inline-block size-4 mr-1"></i> <span
                            class="align-middle">Reset</span></a>
{{--                    <button type="button"--}}
{{--                            class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20"><i--}}
{{--                            data-lucide="save" class="inline-block size-4 mr-1"></i> <span--}}
{{--                            class="align-middle">Save</span></button>--}}
                    <button type="button"
                            class="text-white bg-green-500 border-green-500 btn hover:text-white hover:bg-green-600 hover:border-green-600 focus:text-white focus:bg-green-600 focus:border-green-600 focus:ring focus:ring-green-100 active:text-white active:bg-green-600 active:border-green-600 active:ring active:ring-green-100 dark:ring-green-400/10"><i
                            data-lucide="download" class="inline-block size-4 mr-1"></i> <span
                            class="align-middle">Download</span></button>
                </div>
            </form>
        </div>
    </div><!--end card-->
@endsection
@push('scripts')
    <script src="{{ URL::asset('build/js/pages/invoice-create.init.js') }}"></script>
    <!-- App js -->
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endpush
