@extends('layouts.master')
@section('title')
    {{ __('Create Role') }}
@endsection

@section('content')
    {{-- breadcrumbs start --}}
    <x-page-title title="Create" :breadcrumbs="$breadcrumbs"/>
    {{-- breadcrumbs end --}}

    {{-- create form start --}}
    <div class="card">
        <div class="card-body">
            <h6 class="mb-4 text-15">Create Role</h6>
            <form method="POST" action="{{ route('roles.store') }}" >
                @csrf
                <div class="grid grid-cols-1 gap-x-5 md:grid-cols-2 xl:grid-cols-3">
                    {{-- name --}}
                    <div class="mb-4 col-span-1">
                        <label for="name" class="inline-block mb-2 text-base font-medium">{{ __('Name') }}
                            <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="name" name="name"
                               class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                               placeholder="Enter Role Name" value="{{ old('name') }}" required>
                        <x-input-error for="name" />
                    </div>
                    {{-- name end --}}
                </div>

                <div class="grid grid-cols-1 gap-5 md:grid-cols-2 xl:grid-cols-2">
                    {{-- permissions --}}
                    @foreach ($permissionModules as $key => $permissionModule)
                        <div class="mb-4 col-span-1">
                            <div class="card border border-slate-200">
                                <div class="card-header bg-slate-100 !p-3">
                                    <h4 class="p-0 text-lg uppercase">{{ __($key) }}</h4>
                                </div>
                                <!-- Card Body Start -->
                                <div class="p-4">
                                    <ul>
                                        @foreach ($permissionModule as $permission)
                                            <li @class(['permissionCardList', 'singlePermissionCardList' => ($loop->count == 1)])>
                                                <div class="flex items-center justify-between gap-x-3">
                                                    <div class="flex items-center">
                                                        <input name="permissions[]"
                                                               @empty(!old('permissions'))
                                                                   @checked(in_array($permission->id, old('permissions')))
                                                               @endempty
                                                               id="{{$permission->name}}"
                                                               value="{{ $permission->id }}"
                                                               type="checkbox"
                                                               class="form-checkbox">
                                                        <label for="{{$permission->name}}" class="capitalize ml-2">
                                                            {{ __($permission->name) }}
                                                        </label>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <!-- Card Body End -->
                            </div>
                        </div>
                    @endforeach
                    {{-- permissions end --}}
                </div>

                @can('role create')
                    <div class="flex justify-end gap-2">
                        <a href="{{ route('roles.index') }}"
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
