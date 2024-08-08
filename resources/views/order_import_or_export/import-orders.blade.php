@extends('layouts.master')

@section('title')
    {{ __('File Upload') }}
@endsection

@section('css')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endsection

@section('content')
    <!-- page title -->
    <x-page-title title="Import File Orders" :breadcrumbs="$breadcrumbs" />

    {{-- message start --}}
    <x-message :message="session('message')" />
    {{-- message end --}}


    {{-- Display additional error details --}}
    @if (session('error'))
    <div class="p-4 mb-4 text-red-800 bg-red-100 rounded">
        <h4 class="font-semibold">Error:</h4>
        <p>{{ session('error') }}</p>
    </div>
@endif

    {{-- instruction start --}}
    <div class="card">
        <div class="card-body">
            <h6 class="mb-4 text-15">Instructions<span class="text-red-500">*</span></h6>
            <div class="grid grid-cols-1 gap-x-5 md:grid-cols-6 xl:grid-cols-6">
                <div class="mb-4">
                    <span class="border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200">
                        File format should be <strong>.xlsx</strong> or <strong>.csv</strong> and any field should not be
                        empty and <strong>custom order Id</strong> must be unique.
                    </span><br>
                    <span>
                        <a href="{{ route('sample.format.download') }}"
                            class="mt-4 mb-2 text-white transition-all duration-200 ease-linear btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100">
                            Download Sample Format
                        </a>
                    </span>
                </div>
            </div>
        </div>
    </div>

    {{-- file upload start --}}
    <form action="{{ route('orders.import.store') }}" method="POST" enctype="multipart/form-data" id="file-upload" class="dropzone">
        @csrf
        <div class="card">
            <div class="card-body">
                <h6 class="mb-4 text-15">Select File</h6>
                <x-input-error for="file" />
                <div class="flex items-center justify-center w-full">
                    <label for="dropzone-file"
                        class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-zinc-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <i data-lucide="upload" class="w-10 h-10 mb-3 text-gray-400"></i>
                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to
                                    upload</span> or drag and drop</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">.xlsx, .csv (MAX. 10MB)</p>
                        </div>
                        <input id="dropzone-file" name="file" type="file" class="hidden" />
                    </label>
                </div>
                @can('order import_file')
                    <ul>
                        <li class="flex justify-end gap-2 mt-4">
                            <a href="{{ route('orders.index') }}"
                                class="text-red-500 bg-white btn hover:text-red-500 hover:bg-red-100 focus:text-red-500 focus:bg-red-100 active:text-red-500 active:bg-red-100 dark:bg-zinc-700 dark:hover:bg-red-500/10 dark:focus:bg-red-500/10 dark:active:bg-red-500/10">
                                <i data-lucide="x" class="inline-block size-4"></i><span class="align-middle">Cancel</span>
                            </a>
                            <button type="submit"
                                class="text-white transition-all duration-200 ease-linear btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100">
                                Upload
                            </button>
                        </li>
                    </ul>
                @endcan
            </div>
        </div>
    </form>
    {{-- file upload end --}}
@endsection

@push('scripts')
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <script type="text/javascript">
        Dropzone.autoDiscover = false;
        var dropzone = new Dropzone('#file-upload', {
            thumbnailWidth: 200,
            maxFilesize: 10,
            acceptedFiles: ".xlsx,.csv",
            addRemoveLinks: true,
            init: function() {
                this.on("error", function(file, response) {
                    var errorMessage = response.message || 'An error occurred.';
                    file.previewElement.classList.add("dz-error");
                    var errorMessages = file.previewElement.querySelectorAll('[data-dz-errormessage]');
                    errorMessages.forEach(function(messageElement) {
                        messageElement.textContent = errorMessage;
                    });
                });
            }
        });
    </script>
    <!-- App js -->
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endpush
