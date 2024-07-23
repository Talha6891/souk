@props(['message'])

@if($message)
<div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 1500)" class="flex items-center justify-between px-4 py-3 text-base text-green-500 border border-transparent rounded-md bg-green-50 dark:bg-green-400/20">
    <div>
        <span class="font-bold">Success! </span> {{ $message }}
    </div>
    <button @click="show = false" class="ml-3 text-green-600 hover:text-green-800 dark:text-green-400 dark:hover:text-green-200">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
        </svg>
    </button>
</div>
@endif
