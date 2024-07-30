@extends('layouts.master')
@section('title')
    {{ __('Orders') }}
@endsection

@push('css')
    <!-- Sweet Alert css-->
    <link href="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css">
@endpush

@section('content')
    {{-- breadcrumbs start --}}
    <x-page-title title="Orders List" :breadcrumbs="$breadcrumbs" />
    {{-- breadcrumb end --}}

    {{-- message start  --}}
    <x-message :message="session('message')" />
    {{-- message end --}}

    <div class="card" id="orderList">
        <div class="card-body">

            {{-- search, add order button start --}}
            <div class="flex flex-col items-start justify-between gap-5 mb-5 md:flex-row md:items-center md:space-x-4">
                <!-- Search Form -->
                <div class="relative flex-1 md:w-3/6">
                    <form id="searchForm" method="get" action="{{ route('orders.index') }}">
                        <input type="text" id="searchInput"
                            class="w-full ltr:pl-8 rtl:pr-8 search form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                            placeholder="Search for ..." autocomplete="off" name="q" value="{{ request()->q }}" />
                        <i data-lucide="search"
                            class="inline-block size-4 absolute ltr:left-2.5 rtl:right-2.5 top-2.5 text-slate-500 dark:text-zink-200 fill-slate-100 dark:fill-zink-600"></i>
                    </form>
                </div>


                <!-- Action Buttons -->
                <div class="flex flex-wrap items-center space-x-2 md:space-x-4">
                    <select
                        class="text-white bg-green-500 border-green-500 btn hover:text-white hover:bg-green-600 hover:border-green-600 focus:text-white focus:bg-green-600 focus:border-green-600 focus:ring focus:ring-green-100 active:text-white active:bg-green-600 active:border-green-600 active:ring active:ring-green-100 dark:ring-green-400/20"
                        id="warehouseSelect">
                        <option value="">Select Warehouse</option>
                        @foreach ($warehouses as $warehouse)
                            <option value="{{ $warehouse->id }}">{{ $warehouse->name }}</option>
                        @endforeach
                    </select>

                    <button type="button" id="applyButton"
                        class="text-white bg-red-500 border-red-500 btn hover:text-white hover:bg-red-600 hover:border-red-600 focus:text-white focus:bg-red-600 focus:border-red-600 focus:ring focus:ring-red-100 active:text-white active:bg-red-600 active:border-red-600 active:ring active:ring-red-100 dark:ring-custom-400/20">
                        Apply
                    </button>

                    @can('order create')
                        <a href="{{ route('orders.create') }}"
                            class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">
                            <i class="align-bottom ri-add-line me-1"></i> Add Order
                        </a>
                    @endcan
                </div>
            </div>
            {{-- search, add order button end --}}

           {{-- status start --}}
<div class="flex flex-col items-start justify-between gap-5 mb-5 md:flex-row md:items-center md:space-x-4">
    <ul class="flex flex-wrap w-full mt-5 text-sm font-medium text-center text-gray-500 nav-tabs">
        <!-- All Orders Button -->
        <li class="group {{ $status === 'all' ? 'active' : '' }}">
            <a href="{{ route('orders.index', ['status' => 'all', 'q' => request()->get('q'), 'per_page' => request()->get('per_page'), 'sort' => request()->get('sort')]) }}"
                class="inline-block px-4 py-1.5 text-base transition-all duration-300 ease-linear rounded-md text-slate-500 dark:text-zink-200 border border-transparent group-[.active]:bg-custom-500 group-[.active]:text-white dark:group-[.active]:text-white hover:text-custom-500 dark:hover:text-custom-500 active:text-custom-500 dark:active:text-custom-500 -mb-[1px]">
                <i data-lucide="boxes" class="inline-block size-4 ltr:mr-1 rtl:ml-1"></i>
                <span class="align-middle">All Orders</span>
            </a>
        </li>
        <!-- Pending Orders Button -->
        <li class="group {{ $status === 'pending' ? 'active' : '' }}">
            <a href="{{ route('orders.index', ['status' => 'pending', 'q' => request()->get('q'), 'per_page' => request()->get('per_page'), 'sort' => request()->get('sort')]) }}"
                class="inline-block px-4 py-1.5 text-base transition-all duration-300 ease-linear rounded-md text-slate-500 dark:text-zink-200 border border-transparent group-[.active]:bg-custom-500 group-[.active]:text-white dark:group-[.active]:text-white hover:text-custom-500 dark:hover:text-custom-500 active:text-custom-500 dark:active:text-custom-500 -mb-[1px]">
                <i data-lucide="loader" class="inline-block size-4 ltr:mr-1 rtl:ml-1"></i>
                <span class="align-middle">Pending</span>
            </a>
        </li>
        <!-- Delivered Orders Button -->
        <li class="group {{ $status === 'delivered' ? 'active' : '' }}">
            <a href="{{ route('orders.index', ['status' => 'delivered', 'q' => request()->get('q'), 'per_page' => request()->get('per_page'), 'sort' => request()->get('sort')]) }}"
                class="inline-block px-4 py-1.5 text-base transition-all duration-300 ease-linear rounded-md text-slate-500 dark:text-zink-200 border border-transparent group-[.active]:bg-custom-500 group-[.active]:text-white dark:group-[.active]:text-white hover:text-custom-500 dark:hover:text-custom-500 active:text-custom-500 dark:active:text-custom-500 -mb-[1px]">
                <i data-lucide="package-check" class="inline-block size-4 ltr:mr-1 rtl:ml-1"></i>
                <span class="align-middle">Delivered</span>
            </a>
        </li>
        <!-- Returns Orders Button -->
        <li class="group {{ $status === 'returns' ? 'active' : '' }}">
            <a href="{{ route('orders.index', ['status' => 'returns', 'q' => request()->get('q'), 'per_page' => request()->get('per_page'), 'sort' => request()->get('sort')]) }}"
                class="inline-block px-4 py-1.5 text-base transition-all duration-300 ease-linear rounded-md text-slate-500 dark:text-zink-200 border border-transparent group-[.active]:bg-custom-500 group-[.active]:text-white dark:group-[.active]:text-white hover:text-custom-500 dark:hover:text-custom-500 active:text-custom-500 dark:active:text-custom-500 -mb-[1px]">
                <i data-lucide="refresh-ccw" class="inline-block size-4 ltr:mr-1 rtl:ml-1"></i>
                <span class="align-middle">Returns</span>
            </a>
        </li>
        <!-- Cancelled Orders Button -->
        <li class="group {{ $status === 'cancelled' ? 'active' : '' }}">
            <a href="{{ route('orders.index', ['status' => 'cancelled', 'q' => request()->get('q'), 'per_page' => request()->get('per_page'), 'sort' => request()->get('sort')]) }}"
                class="inline-block px-4 py-1.5 text-base transition-all duration-300 ease-linear rounded-md text-slate-500 dark:text-zink-200 border border-transparent group-[.active]:bg-custom-500 group-[.active]:text-white dark:group-[.active]:text-white hover:text-custom-500 dark:hover:text-custom-500 active:text-custom-500 dark:active:text-custom-500 -mb-[1px]">
                <i data-lucide="package-x" class="inline-block size-4 ltr:mr-1 rtl:ml-1"></i>
                <span class="align-middle">Cancelled</span>
            </a>
        </li>
    </ul>
</div>
{{-- status end --}}



            {{-- table start --}}
            <div class="overflow-x-auto">
                <table class="w-full whitespace-nowrap" id="orderTable">
                    {{-- table heading start --}}
                    <thead class="bg-slate-100 dark:bg-zink-600">
                        <tr>
                            <th class="px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500"
                                scope="col" style="width: 50px;">
                                <input
                                    class="border rounded-sm appearance-none cursor-pointer size-4 bg-slate-100 border-slate-200 dark:bg-zink-600 dark:border-zink-500 checked:bg-custom-500 checked:border-custom-500 dark:checked:bg-custom-500 dark:checked:border-custom-500 checked:disabled:bg-custom-400 checked:disabled:border-custom-400"
                                    type="checkbox" id="checkAll" value="option">
                            </th>
                            <th
                                class="sort px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 ltr:text-left rtl:text-right">
                                #ID
                            </th>
                            <th class="sort px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 ltr:text-left rtl:text-right"
                                data-sort="custom_order_id">Order Name
                            </th>
                            <th class="sort px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 ltr:text-left rtl:text-right"
                                data-sort="custom_order_id">Custom Order ID
                            </th>
                            <th class="sort px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 ltr:text-left rtl:text-right"
                                data-sort="custom_order_id">Order Status
                            </th>
                            <th class="sort px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 ltr:text-left rtl:text-right"
                                data-sort="custom_order_id">Warehouse Assigned
                            </th>

                            <th class="sort px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 ltr:text-left rtl:text-right"
                                data-sort="created_at">Created At
                            </th>
                            <th class="sort px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 ltr:text-left rtl:text-right"
                                data-sort="action">Action
                            </th>
                        </tr>
                    </thead>
                    {{-- table heading end --}}

                    <tbody class="list form-check-all">
                        @forelse($orders as $order)
                            <tr>
                                <th class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500" scope="row">
                                    <input
                                        class="border rounded-sm appearance-none cursor-pointer size-4 bg-slate-100 border-slate-200 dark:bg-zink-600 dark:border-zink-500 checked:bg-custom-500 checked:border-custom-500 dark:checked:bg-custom-500 dark:checked:border-custom-500 checked:disabled:bg-custom-400 checked:disabled:border-custom-400"
                                        type="checkbox" name="chk_child">
                                </th>
                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 custom_order_id">
                                    {{ $order->id }}</td>
                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 custom_order_id">
                                    {{ $order->order_name }}</td>
                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 custom_order_id">
                                    {{ $order->custom_order_id }}</td>
                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 status">
                                    <span
                                        class="px-2.5 py-0.5 inline-block text-xs font-medium rounded border bg-green-100 border-transparent text-green-500 dark:bg-green-500/20 dark:border-transparent text-uppercase">
                                        {{ $order->status }}
                                    </span>
                                </td>
                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 status">
                                    @if ($order->warehouse && $order->warehouse->name)
                                        <span
                                            class="px-2.5 py-0.5 inline-block text-xs font-medium rounded border bg-green-100 border-transparent text-green-500 dark:bg-green-500/20 dark:border-transparent text-uppercase">
                                            {{ $order->warehouse->name }}
                                        </span>
                                    @else
                                        <span
                                            class="px-2.5 py-0.5 inline-block text-xs font-medium rounded border bg-red-100 border-transparent text-red-500 dark:bg-red-500/20 dark:border-transparent text-uppercase">
                                            {{ __('Not Assigned') }}
                                        </span>
                                    @endif
                                </td>

                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 created_at">
                                    {{ $order->created_at->format('M d Y, h:i A') }}
                                </td>
                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500">
                                    <div class="flex gap-2">
                                        {{-- show order --}}
                                        @can('order show')
                                            <div class="edit">
                                                <a href="{{ route('orders.show', $order) }}"
                                                    class="py-1 text-xs text-white bg-yellow-500 border-yellow-500 btn hover:text-white hover:bg-yellow-600 hover:border-yellow-600 focus:text-white focus:bg-yellow-600 focus:border-yellow-600 focus:ring focus:ring-yellow-100 active:text-white active:bg-yellow-600 active:border-yellow-600 active:ring active:ring-yellow-100 dark:ring-yellow-400/20 edit-item-btn">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="lucide lucide-eye">
                                                        <path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z" />
                                                        <circle cx="12" cy="12" r="3" />
                                                    </svg>
                                                </a>
                                            </div>
                                        @endcan
                                        {{-- show order end --}}

                                        {{-- edit order --}}
                                        {{-- @can('order update')
                                            <div class="edit">
                                                <a href="{{ route('orders.edit', $order) }}"
                                                    class="py-1 text-xs text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20 edit-item-btn">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="lucide lucide-user-round-pen">
                                                        <path d="M2 21a8 8 0 0 1 10.821-7.487" />
                                                        <path
                                                            d="M21.378 16.626a1 1 0 0 0-3.004-3.004l-4.01 4.012a2 2 0 0 0-.506.854l-.837 2.87a.5.5 0 0 0 .62.62l2.87-.837a2 2 0 0 0 .854-.506z" />
                                                        <circle cx="10" cy="8" r="5" />
                                                    </svg>
                                                </a>
                                            </div>
                                        @endcan --}}
                                        {{-- edit order end --}}

                                        {{-- delete order --}}
                                        @can('order delete')
                                            <div class="remove">
                                                <form id="deleteForm{{ $order->id }}" method="POST"
                                                    action="{{ route('orders.destroy', $order) }}"
                                                    class="py-1 text-xs text-white bg-red-500 border-red-500 btn hover:text-white hover:bg-red-600 hover:border-red-600 focus:text-white focus:bg-red-600 focus:border-red-600 focus:ring focus:ring-red-100 active:text-white active:bg-red-600 active:border-red-600 active:ring active:ring-red-100 dark:ring-custom-400/20 remove-item-btn">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a class="cursor-pointer action-btn"
                                                        onclick="sweetAlertDelete(event, 'deleteForm{{ $order->id }}')">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                            class="lucide lucide-trash-2">
                                                            <path d="M3 6h18" />
                                                            <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6" />
                                                            <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2" />
                                                            <line x1="10" x2="10" y1="11"
                                                                y2="17" />
                                                            <line x1="14" x2="14" y1="11"
                                                                y2="17" />
                                                        </svg>
                                                    </a>
                                                </form>
                                            </div>
                                        @endcan
                                        {{-- delete order end --}}
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="11" class="py-4 text-center">No Orders Found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Pagination links --}}
            <div class="flex justify-end mt-4">
                <div class="flex gap-2 pagination-wrap">
                    {{ $orders->onEachSide(1)->links('pagination.custom-tailwind') }}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ URL::asset('build/libs/flatpickr/flatpickr.min.js') }}"></script>
    <!-- Sweet Alerts js -->
    <script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <!-- App js -->
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
    {{-- delete order start --}}
    <script>
        function sweetAlertDelete(event, formId) {
            event.preventDefault();
            let form = document.getElementById(formId);
            Swal.fire({
                title: '@lang('Are you sure ? ')',
                icon: 'question',
                showDenyButton: true,
                confirmButtonText: '@lang('Delete ')',
                denyButtonText: '@lang('Cancel ')',
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            })
        }
    </script>
    {{-- delete order end --}}

    {{-- check all --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const checkAll = document.getElementById('checkAll');
            const checkboxes = document.querySelectorAll('input[name="chk_child"]');

            checkAll.addEventListener('change', function() {
                checkboxes.forEach(checkbox => {
                    checkbox.checked = checkAll.checked;
                });
            });
        });
    </script>
    {{-- check all end --}}

    {{-- specific check update --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const applyButton = document.getElementById('applyButton');
            const warehouseSelect = document.getElementById('warehouseSelect');

            applyButton.addEventListener('click', function() {
                const selectedWarehouseId = warehouseSelect.value;
                const selectedOrders = [];

                // Get all checked checkboxes and their corresponding order IDs
                document.querySelectorAll('input[name="chk_child"]:checked').forEach(checkbox => {
                    const row = checkbox.closest('tr');
                    const orderId = row.querySelector('td.custom_order_id').textContent.trim();
                    selectedOrders.push(orderId);
                });

                // Check if a warehouse is selected and if there are selected orders
                if (selectedWarehouseId && selectedOrders.length > 0) {
                    const form = document.createElement('form');
                    form.method = 'POST';
                    form.action = '{{ route('orders.updateWarehouse') }}';

                    // CSRF Token
                    const csrfInput = document.createElement('input');
                    csrfInput.type = 'hidden';
                    csrfInput.name = '_token';
                    csrfInput.value = document.querySelector('meta[name="csrf-token"]').getAttribute(
                        'content');
                    form.appendChild(csrfInput);

                    // Warehouse ID
                    const warehouseInput = document.createElement('input');
                    warehouseInput.type = 'hidden';
                    warehouseInput.name = 'warehouse_id';
                    warehouseInput.value = selectedWarehouseId;
                    form.appendChild(warehouseInput);

                    // Order IDs
                    selectedOrders.forEach(orderId => {
                        const ordersInput = document.createElement('input');
                        ordersInput.type = 'hidden';
                        ordersInput.name = 'order_ids[]';
                        ordersInput.value = orderId;
                        form.appendChild(ordersInput);
                    });

                    document.body.appendChild(form);
                    form.submit();
                } else {
                    alert('Please select a warehouse and/or orders.');
                }
            });
        });
    </script>
    {{--    end --}}
@endpush
