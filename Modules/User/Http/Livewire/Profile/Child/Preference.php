<?php

namespace Modules\User\Http\Livewire\Profile\Child;

use Livewire\Component;
use Modules\User\Models\Entities\UsersSetting;

class Preference extends Component
{
    public $setting, $preferences = [
        'theme' => null,
        'header' => null,
        'sidebar' => null,
    ];

    public function mount()
    {
        $setting = UsersSetting::where('user_id', auth()->id())->first();
        $this->setting = $setting;
        $this->preferences['theme'] = !$setting ? null : $setting->general_theme;
        $this->preferences['header'] = !$setting ? null : $setting->navbar_theme;
        $this->preferences['sidebar'] = !$setting ? null : $setting->sidebar_theme;
    }

    public function changeTheme($theme)
    {
        $this->preferences['theme'] = $theme;

        $setting = $this->setting;
        $setting->general_theme = $theme;
        $setting->save();

        $this->dispatchBrowserEvent('preferences', ['theme' => implode(' ', $this->preferences)]);
    }

    public function changeHeader($header)
    {
        $this->preferences['header'] = $header ? 'color-header ' . $header : null;

        $setting = $this->setting;
        $setting->navbar_theme = $header ? 'color-header ' . $header : null;
        $setting->save();

        $this->dispatchBrowserEvent('preferences', ['theme' => implode(' ', $this->preferences)]);
    }

    public function changeSidebar($sidebar)
    {
        if ($sidebar) {
            $this->preferences['theme'] = null;
            $this->preferences['sidebar'] = 'color-sidebar ' . $sidebar;
        } else {
            $this->preferences['sidebar'] = null;
        }

        $setting = $this->setting;
        !$sidebar ?: $setting->general_theme = null;
        $setting->sidebar_theme = !$sidebar ? null : 'color-sidebar ' . $sidebar;
        $setting->save();

        $this->dispatchBrowserEvent('preferences', ['theme' => implode(' ', $this->preferences)]);
    }

    public function render()
    {
        return view('user::livewire.profile.child.preference');
    }
}