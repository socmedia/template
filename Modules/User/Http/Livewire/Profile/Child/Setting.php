<?php

namespace Modules\User\Http\Livewire\Profile\Child;

use Livewire\Component;

class Setting extends Component
{
    public $user, $userId, $facebook, $instagram, $linkedin, $tiktok;

    public function mount()
    {
        $user = user();
        $this->user = $user;
        $this->userId = $user->id;
        $this->facebook = $user->facebook;
        $this->instagram = $user->instagram;
        $this->linkedin = $user->linkedin;
        $this->tiktok = $user->tiktok;
    }

    public function saveSettings()
    {
        $this->user->update([
            'facebook' => $this->facebook,
            'instagram' => $this->instagram,
            'linkedin' => $this->linkedin,
            'tiktok' => $this->tiktok,
        ]);

        session()->flash('settings', 'Your personal data updated successfully.');

    }

    public function render()
    {
        return view('user::livewire.profile.child.setting');
    }
}