<x-form-section submit="updateBankDetails">
    <x-slot name="title">
        {{ __('Bank Details') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Ensure your account is using a long, random password to stay secure.') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-label for="bank_name" value="{{ __('Bank Name') }}" />
            <x-input id="bank_name" type="text" class="block w-full mt-1" wire:model="bank_name" />
            <x-input-error for="bank_name" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="branch_code" value="{{ __('Branch Code') }}" />
            <x-input id="branch_code" type="text" class="block w-full mt-1" wire:model="branch_code" />
            <x-input-error for="branch_code" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="account_title" value="{{ __('Account Title') }}" />
            <x-input id="account_title" type="text" class="block w-full mt-1" wire:model="account_title" />
            <x-input-error for="account_title" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="iban_number" value="{{ __('IBAN Number') }}" />
            <x-input id="iban_number" type="text" class="block w-full mt-1" wire:model="iban_number" />
            <x-input-error for="iban_number" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="me-3" on="saved">
            {{ __('Saved.') }}
        </x-action-message>

        <x-button wire:loading.attr="disabled" variant="green">
            {{ __('Save') }}
        </x-button>
    </x-slot>
</x-form-section>
