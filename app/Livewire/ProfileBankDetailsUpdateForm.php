<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProfileBankDetailsUpdateForm extends Component
{
    public $bank_name;
    public $branch_code;
    public $account_title;
    public $iban_number;

    public function mount()
    {
        // Load the user's bank details
        $user = Auth::user();
        $this->bank_name = $user->bank_name;
        $this->branch_code = $user->branch_code;
        $this->account_title = $user->account_title;
        $this->iban_number = $user->iban_number;
    }

    public function updateBankDetails()
    {
        $this->validate([
            'bank_name' => 'required|string|max:100',
            'branch_code' => 'required|string|max:20',
            'account_title' => 'required|string|max:100',
            'iban_number' => 'required|string|max:40',
        ]);

        $user = Auth::user();
        $user->forceFill([
            'bank_name' => $this->bank_name,
            'branch_code' => $this->branch_code,
            'account_title' => $this->account_title,
            'iban_number' => $this->iban_number,
        ])->save();
    }

    public function render()
    {
        return view('profile.profile-bank-details-update-form');
    }
}
