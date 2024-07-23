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
                <div class="grid grid-cols-1 gap-5 mt-3 xl:grid-cols-12 changeAddress">
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


                <h6 class="my-5 mt-6 underline text-16">Order(s) Info:</h6>
                <div class="grid grid-cols-1 gap-5 mt-3 xl:grid-cols-12">

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


                <div class="flex justify-end gap-2 mt-5">
                    <a href="{{ route('orders.index') }}"
                            class="text-slate-500 btn bg-slate-200 border-slate-200 hover:text-slate-600 hover:bg-slate-300 hover:border-slate-300 focus:text-slate-600 focus:bg-slate-300 focus:border-slate-300 focus:ring focus:ring-slate-100 active:text-slate-600 active:bg-slate-300 active:border-slate-300 active:ring active:ring-slate-100 dark:bg-zink-600 dark:hover:bg-zink-500 dark:border-zink-600 dark:hover:border-zink-500 dark:text-zink-200 dark:ring-zink-400/50"><i
                            data-lucide="arrow-left" class="inline-block mr-1 size-4"></i> <span
                            class="align-middle">Reset</span></a>

                    {{-- <button type="button"
                            class="text-white bg-green-500 border-green-500 btn hover:text-white hover:bg-green-600 hover:border-green-600 focus:text-white focus:bg-green-600 focus:border-green-600 focus:ring focus:ring-green-100 active:text-white active:bg-green-600 active:border-green-600 active:ring active:ring-green-100 dark:ring-green-400/10"><i
                            data-lucide="download" class="inline-block mr-1 size-4"></i> <span
                            class="align-middle">Download</span></button> --}}
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
