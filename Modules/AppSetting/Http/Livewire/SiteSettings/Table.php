<?php

namespace Modules\AppSetting\Http\Livewire\SiteSettings;

use App\Services\ImageService;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\AppSetting\Entities\AppSetting;

class Table extends Component
{
    use WithFileUploads;

    /**
     * Define available props in the component
     *
     * @var array
     */
    public $groups, $activeTabs, $settingsByGroup, $images = [];

    /**
     * Define props default value before component rendered
     *
     * @return void
     */
    public function mount()
    {
        $groups = $this->getAllGroups();
        $this->groups = $groups;
        $this->settingsByGroup = $this->getSettingsByGroup();

        foreach ($groups as $i => $group) {
            if ($i == 0) {
                $this->activeTabs = $group;
            }
        }
    }

    /**
     * Get all groups from database
     *
     * @return void
     */
    public function getAllGroups(): array
    {
        return AppSetting::select('group')
            ->groupBy('group')
            ->get()
            ->pluck('group')
            ->toArray();
    }

    /**
     * Get setting datas by group name
     *
     * @return void
     */
    public function getSettingsByGroup()
    {
        $groupbBySettings = [];

        if (count($this->getAllGroups()) > 0) {
            foreach ($this->getAllGroups() as $group) {
                $settings = AppSetting::where('group', $group)->get(['id', 'key', 'value', 'type', 'form_type'])->toArray();
                $groupbBySettings[$group] = $settings;
            }
        }

        return $groupbBySettings;
    }

    public function updated($prop)
    {
        // $this->validateOnly([
        //     $prop => 'required|max:191',
        // ]);
    }

    /**
     * Update existing data to database
     *
     * @param  int $id
     * @param  string $pattern | settingsByGroup.{$groupIndex}.{$settingIndex}.value
     * @return void
     */
    public function update($id, $pattern, $imagePattern)
    {
        $setting = AppSetting::find($id);

        $explode = explode('.', $pattern);
        $target = count($explode) == 4 ? $this->settingsByGroup[$explode[1]][$explode[2]] : null;

        // Validation
        if ($target['type'] == 'image') {
            $this->validate([
                $imagePattern => 'required|image|mimes:png,jpg|max:256',
            ], [
                'required' => 'This field is required.',
                'mimes' => 'Alowed type is only .png and .jpg',
                'max' => 'Image max size is 256kb.',
            ]);
        } else {
            $this->validate([
                $pattern => 'required|max:500',
            ], [
                'required' => 'This field is required.',
                'max' => 'Allowed character length is 500.',
            ]);
        }

        $setting = AppSetting::find($id);

        // Check if target is not null
        if ($target) {

            // If target type is image
            if ($target['type'] == 'image') {

                $service = new ImageService();

                // Move image to storage
                foreach ($this->images as $i => $groups) {
                    foreach ($groups as $j => $images) {
                        foreach ($images as $h => $image) {

                            // Remove old image
                            if ($target['value']) {
                                $path = explode('/', $target['value']);
                                if (count($path) >= 4) {
                                    $shortPath = implode('/', array_slice($path, 3, 2));
                                    $service->removeImage('images', $shortPath);
                                }
                            }

                            // Set target value with image url
                            $target['value'] = url($service->storeImage($image));
                        }

                    }
                }
            }

            // Update image
            $setting->update($target);

            Cache::forget($target['key']);
            Cache::forever($target['key'], $target['value']);

            return session()->flash('success', 'Perubahan berhasil disimpan');
        }

        return session()->flash('failed', 'Sayang sekali, data tidak ditemukan.');
    }

    public function render()
    {
        return view('appsetting::livewire.site-settings.table');
    }
}