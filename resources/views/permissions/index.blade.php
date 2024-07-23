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
    <x-page-title title="Permissions List" :breadcrumbs="$breadcrumbs" />
    {{-- breadcrumb end --}}

    {{-- message start  --}}
    <x-message :message="session('message')" />
    {{-- message end --}}
    <div class="card" id="customerList">
        <div class="card-body">

                       {{-- search, add customer and belete button start --}}
                       <div class="flex flex-col items-start justify-between gap-5 mb-5 md:flex-row md:items-center">
                        <div class="relative md:w-3/6">
                            <form id="searchForm" method="get" action="{{ route('permissions.index') }}">
                            <input type="text" id="searchInput"
                                class="ltr:pl-8 rtl:pr-8 search form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                placeholder="Search for ..." autocomplete="off" name="q" value="{{ request()->q }}" />
                            <i data-lucide="search"
                                class="inline-block size-4 absolute ltr:left-2.5 rtl:right-2.5 top-2.5 text-slate-500 dark:text-zink-200 fill-slate-100 dark:fill-zink-600"></i>
                            </form>
                        </div>
                        @can('permission create')
                            <div class="flex space-x-2 md:ml-auto">
                                <a href="{{ route('permissions.create') }}"
                                    class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20 add-btn"
                                    id="create-btn">
                                    <i class="align-bottom ri-add-line me-1"></i> Add Permission
                                </a>
                            </div>
                        @endcan
                    </div>
                    {{-- search, add customer and belete button end --}}

                    {{-- table start --}}
                    <div class="overflow-x-auto">
                        <table class="w-full whitespace-nowrap" id="customerTable">
                            {{-- table heading start --}}
                            <thead class="bg-slate-100 dark:bg-zink-600 ">
                                <tr>
                                    <th class="sort px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 ltr:text-left rtl:text-right">
                                        Name
                                    </th>
                                    <th class="sort px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 ltr:text-left rtl:text-right">
                                        Module Name
                                    </th>
                                    <th class="sort px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 ltr:text-left rtl:text-right">
                                        Created At
                                    </th>
                                    <th class="sort px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 ltr:text-left rtl:text-right">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            {{-- table heading end --}}

                            <tbody class="list form-check-all">
                                @forelse($permissions as $permission)
                                    <tr>
                                        <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 first_name">
                                            {{ Str::limit($permission->name, 20) }}
                                        </td>
                                        <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 email">
                                            {{ Str::limit($permission->module_name, 20) }}
                                        </td>
                                        <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 whatsapp_no">
                                            {{ Str::limit($permission->created_at->format('M d Y'), 15) }}
                                        </td>

                                        <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500">
                                            <div class="flex gap-2">

                                              {{--  edit permission --}}
                                        @can('permission update')
                                        <div class="edit">
                                            <a href="{{ route('permissions.edit', $permission) }}"
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
                                    {{-- edit permission end --}}

                                        {{-- delete permission --}}
                                        @can('permission delete')
                                            <div class="remove">
                                                <form id="deleteForm{{ $permission->id }}" method="POST"
                                                    action="{{ route('permissions.destroy', $permission) }}"
                                                    class="py-1 text-xs text-white bg-red-500 border-red-500 btn hover:text-white hover:bg-red-600 hover:border-red-600 focus:text-white focus:bg-red-600 focus:border-red-600 focus:ring focus:ring-red-100 active:text-white active:bg-red-600 active:border-red-600 active:ring active:ring-red-100 dark:ring-custom-400/20 remove-item-btn">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a class="cursor-pointer action-btn"
                                                        onclick="sweetAlertDelete(event, 'deleteForm{{ $permission->id }}')">
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
                                        {{-- delete permission end --}}
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>Not Found</tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

            {{-- table end --}}

            {{-- Pagination links --}}
            <div class="flex justify-end mt-4">
                <div class="flex gap-2 pagination-wrap">
                    {{ $permissions->onEachSide(1)->links('pagination.custom-tailwind') }}
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
        {{--  delete permission  start --}}
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
        {{--  delete permission end --}}
    @endpush
