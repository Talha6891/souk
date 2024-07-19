@extends('layouts.master')
@section('title')
    {{ __('Clients') }}
@endsection
@push('css')
    <!-- Sweet Alert css-->
    <link href="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css">
@endpush
@section('content')
    {{-- breadcrumbs start --}}
    <x-page-title title="Clients List" :breadcrumbs="$breadcrumbs" />
    {{-- breadcrumb end --}}

    {{-- message start  --}}
    <x-message :message="session('message')" />
    {{-- message end --}}
    <div class="card" id="customerList">
        <div class="card-body">

            {{-- search, add customer and belete button start --}}
            <div class="flex flex-col items-start justify-between gap-5 mb-5 md:flex-row md:items-center">
                <div class="relative md:w-3/6">
                    <input type="text" id="searchInput"
                        class="ltr:pl-8 rtl:pr-8 search form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                        placeholder="Search for ..." autocomplete="off" />
                    <i data-lucide="search"
                        class="inline-block size-4 absolute ltr:left-2.5 rtl:right-2.5 top-2.5 text-slate-500 dark:text-zink-200 fill-slate-100 dark:fill-zink-600"></i>
                </div>
                @can('user create')
                    <div class="flex space-x-2 md:ml-auto">
                        <a href="{{ route('users.create') }}"
                            class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20 add-btn"
                            id="create-btn">
                            <i class="align-bottom ri-add-line me-1"></i> Add Customer
                        </a>
                        {{--                    <button type="button" --}}
                        {{--                            class="text-white bg-red-500 border-red-500 btn hover:text-white hover:bg-red-600 hover:border-red-600 focus:text-white focus:bg-red-600 focus:border-red-600 focus:ring focus:ring-red-100 active:text-white active:bg-red-600 active:border-red-600 active:ring active:ring-red-100 dark:ring-custom-400/20" --}}
                        {{--                            > --}}
                        {{--                        <i class="ri-delete-bin-2-line"></i> --}}
                        {{--                    </button> --}}
                    </div>
                @endcan
            </div>
            {{-- search, add customer and belete button start --}}

            {{-- table start --}}
            <div class="overflow-x-auto">
                <table class="w-full whitespace-nowrap" id="customerTable">
                    {{-- table heading start --}}
                    <thead class="bg-slate-100 dark:bg-zink-600 ">
                        <tr>
                            {{--                        <th class="px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500" --}}
                            {{--                            scope="col" style="width: 50px;"> --}}
                            {{--                            <input --}}
                            {{--                                class="border rounded-sm appearance-none cursor-pointer size-4 bg-slate-100 border-slate-200 dark:bg-zink-600 dark:border-zink-500 checked:bg-custom-500 checked:border-custom-500 dark:checked:bg-custom-500 dark:checked:border-custom-500 checked:disabled:bg-custom-400 checked:disabled:border-custom-400" --}}
                            {{--                                type="checkbox" id="checkAll" value="option"> --}}
                            {{--                        </th> --}}
                            <th class="sort px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 ltr:text-left rtl:text-right"
                                data-sort="first_name">Name
                            </th>
                            <th class="sort px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 ltr:text-left rtl:text-right"
                                data-sort="email">Email
                            </th>
                            <th class="sort px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 ltr:text-left rtl:text-right"
                                data-sort="whatsapp_no">WhatsApp No
                            </th>
                            <th class="sort px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 ltr:text-left rtl:text-right"
                                data-sort="country_id">Country
                            </th>
                            <th class="sort px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 ltr:text-left rtl:text-right"
                                data-sort="status">Status
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
                        @foreach ($users as $user)
                            <tr>
                                {{--                            <th class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500" scope="row"> --}}
                                {{--                                <input --}}
                                {{--                                    class="border rounded-sm appearance-none cursor-pointer size-4 bg-slate-100 border-slate-200 dark:bg-zink-600 dark:border-zink-500 checked:bg-custom-500 checked:border-custom-500 dark:checked:bg-custom-500 dark:checked:border-custom-500 checked:disabled:bg-custom-400 checked:disabled:border-custom-400" --}}
                                {{--                                    type="checkbox" name="chk_child"> --}}
                                {{--                            </th> --}}
                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 first_name">
                                    {{ Str::limit($user->first_name . ' ' . $user->last_name ?? ' ', 20) }}</td>
                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 email">
                                    {{ Str::limit($user->email, 20) }}</td>
                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 whatsapp_no">
                                    {{ Str::limit($user->whatsapp_no, 15) }}</td>
                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 country_id">
                                    {{ Str::limit($user->country->name, 10) }}</td>
                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 status">
                                    @if ($user->verified)
                                        <span
                                            class="px-2.5 py-0.5 inline-block text-xs font-medium rounded border bg-green-100 border-transparent
                                 text-green-500 dark:bg-green-500/20 dark:border-transparent text-uppercase">Verified</span>
                                    @else
                                        <span
                                            class="px-2.5 py-0.5 inline-block text-xs font-medium rounded border bg-red-100 border-transparent
                                 text-red-500 dark:bg-red-500/20 dark:border-transparent text-uppercase">Unverified</span>
                                    @endif
                                </td>
                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 is_email_verified">
                                    {{ $user->created_at->diffForHumans() }}
                                </td>
                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500">
                                    <div class="flex gap-2">
                                        {{--  show user --}}
                                        @can('user show')
                                            <div class="edit">
                                                <a href="{{ route('users.show', $user) }}"
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
                                        {{-- show user end --}}

                                        {{--  edit user --}}
                                        @can('user update')
                                            <div class="edit">
                                                <a href="{{ route('users.edit', $user) }}"
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
                                        @endcan
                                        {{-- edit user end --}}

                                        {{-- delete user --}}
                                        @can('user delete')
                                            <div class="remove">
                                                <form id="deleteForm{{ $user->id }}" method="POST"
                                                    action="{{ route('users.destroy', $user) }}"
                                                    class="py-1 text-xs text-white bg-red-500 border-red-500 btn hover:text-white hover:bg-red-600 hover:border-red-600 focus:text-white focus:bg-red-600 focus:border-red-600 focus:ring focus:ring-red-100 active:text-white active:bg-red-600 active:border-red-600 active:ring active:ring-red-100 dark:ring-custom-400/20 remove-item-btn">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a class="cursor-pointer action-btn"
                                                        onclick="sweetAlertDelete(event, 'deleteForm{{ $user->id }}')">
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
                                        {{-- delete user end --}}
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="noresult" style="display: none">
                    <div class="text-center p-7">
                        <h5 class="mb-2">Sorry! No Result Found</h5>
                        <p class="mb-0 text-slate-500 dark:text-zink-200">
                            We did not find any orders for you search.</p>
                    </div>
                </div>
            </div>
            {{-- table end --}}

            {{-- Pagination links --}}
            <div class="flex justify-end mt-4">
                <div class="flex gap-2 pagination-wrap">
                    {{ $users->onEachSide(1)->links('pagination.custom-tailwind') }}
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
        {{-- search implementation start --}}
        <script>
            // Wait for the DOM to be fully loaded
            document.addEventListener('DOMContentLoaded', function() {
                // Get the input element
                const searchInput = document.getElementById('searchInput');

                // Add an event listener for input on the search input
                searchInput.addEventListener('input', function() {
                    const searchTerm = searchInput.value.trim().toLowerCase();

                    // Get all table rows from the table body
                    const rows = document.querySelectorAll('#customerTable tbody tr');

                    // Loop through each row and hide/show based on search term
                    rows.forEach(row => {
                        const nameColumn = row.querySelector('.first_name').textContent.toLowerCase();
                        const emailColumn = row.querySelector('.email').textContent.toLowerCase();
                        const whatsappColumn = row.querySelector('.whatsapp_no').textContent
                            .toLowerCase();
                        const cityColumn = row.querySelector('.created_at').textContent.toLowerCase();
                        const countryColumn = row.querySelector('.country_id').textContent
                    .toLowerCase();

                        // Check if any column contains the search term
                        if (nameColumn.includes(searchTerm) || emailColumn.includes(searchTerm) ||
                            whatsappColumn.includes(searchTerm) || cityColumn.includes(searchTerm) ||
                            countryColumn.includes(searchTerm)) {
                            row.style.display = '';
                        } else {
                            row.style.display = 'none';
                        }
                    });
                });
            });
        </script>
        {{-- search implementation end --}}

        {{--  delete user  start --}}
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
        {{--  delete user end --}}
    @endpush
