@extends('layouts.master')

@section('title')
    {{ __('Role Details') }}
@endsection

@section('content')
    {{-- breadcrumbs start --}}
    <x-page-title title="Role Details" :breadcrumbs="$breadcrumbs"/>
    {{-- breadcrumbs end --}}

    {{-- readonly form start --}}
    <div class="card">
        <div class="card-body">
            <h6 class="mb-4 text-15">Role Details</h6>
            <form>
                @csrf
                <div class="grid grid-cols-1 gap-x-5 md:grid-cols-2 xl:grid-cols-3">
                    {{-- name --}}
                    <div class="mb-4 col-span-1">
                        <label for="name" class="inline-block mb-2 text-base font-medium">{{ __('Name') }}
                            <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="name" name="name"
                               class="form-input border-slate-200 dark:border-zink-500 bg-slate-100 dark:bg-zink-600 text-slate-500 dark:text-zink-200"
                               value="{{ $role->name }}" readonly>
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
                                                               id="{{$permission->name}}"
                                                               value="{{ $permission->id }}"
                                                               type="checkbox"
                                                               class="form-checkbox"
                                                               @checked(in_array($permission->id, $rolePermissions))
                                                               disabled>
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

                <div class="flex justify-end gap-2">
                    <a href="{{ route('roles.index') }}"
                       class="text-red-500 bg-white btn hover:text-red-500 hover:bg-red-100 focus:text-red-500 focus:bg-red-100 active:text-red-500 active:bg-red-100 dark:bg-zink-700 dark:hover:bg-red-500/10 dark:focus:bg-red-500/10 dark:active:bg-red-500/10">
                        <i data-lucide="arrow-left" class="inline-block size-4"></i><span class="align-middle">Back</span>
                    </a>
                </div>
            </form>
        </div>
    </div>
    {{-- readonly form end --}}
@endsection

@push('scripts')
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endpush
