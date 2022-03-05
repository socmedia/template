<?php

namespace Modules\User\Http\Livewire\Profile\Child;

use App\Services\ImageService;
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

    public function updatedAvatar()
    {
        $this->validate([
            'avatar' => 'image|mimes:png,jpg,jpeg|max:256',
        ]);

        $service = new ImageService();
        $user = user();

        // remove old avatar
        if ($user->avatar_url) {
            $path = explode('/', $user->avatar_url);
            if (count($path) >= 4) {
                $shortPath = implode('/', array_slice($path, 3, 2));
                $service->removeImage('images', $shortPath);
            }
        }

        $user->avatar_url = $service->storeImage($this->avatar);
        $user->save();

        session()->flash('success', 'Avatar updated successfully.');
        return $this->dispatchBrowserEvent('avatar-changed', ['url' => $user->avatar_url]);
    }

    public function render()
    {
        return view('user::livewire.profile.child.overview');
    }
}
