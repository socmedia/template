<?php

namespace App\Http\Livewire;

use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ConfirmPasswordModal extends Component
{
    public $text, $email, $password, $error;

    public function mount()
    {
        $this->email = auth()->user()->email;
    }

    public function confirm()
    {
        $validate = Auth::guard('web')->validate([
            'email' => $this->email,
            'password' => $this->password,
        ]);

        if (!$validate) {
            return $this->error = 'The provided password is incorrect.';
        }

        session()->put('auth.password_confirmed_at', time());

        return redirect()->intended(RouteServiceProvider::HOME);

    }

    public function render()
    {
        return view('livewire.confirm-password-modal');
    }
}