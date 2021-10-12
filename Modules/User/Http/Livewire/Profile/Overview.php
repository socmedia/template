<?php

namespace Modules\User\Http\Livewire\Profile;

use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Livewire\WithFileUploads;

class Overview extends Component
{
    use WithFileUploads;

    public $avatar;

    public function mount()
    {
        //
    }

    public function updateProfilePhoto()
    {
        $this->validate([
            'avatar' => 'image|mimes:png,jpg,jpeg|max:256',
        ]);

        $user = auth()->user();
        // $user->avatar_url =
    }

    public function render()
    {
        return view('user::livewire.profile.overview');
    }
}