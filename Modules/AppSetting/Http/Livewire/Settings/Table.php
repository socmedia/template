<?php

namespace Modules\AppSetting\Http\Livewire\Settings;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\AppSetting\Entities\AppSetting;
use Modules\AppSetting\Services\SettingsQuery;
use Modules\AppSetting\Services\TableConfig;
use Modules\AppSetting\Services\TableFilterActions;

class Table extends Component
{
    use WithPagination, TableConfig, TableFilterActions;

    /**
     * Define query string props
     *
     * @var string
     */
    public $filters, $group, $sort = 'created_at', $order = 'desc', $search, $destroyId, $perPage = 25;

    /**
     * Define table headers
     *
     * @var array
     */
    public $headers = [
        [
            'cell_name' => 'Group',
            'column_name' => 'group',
            'sortable' => true,
            'order' => null,
            'additional_class' => null,
        ],
        [
            'cell_name' => 'Key - Value',
            'column_name' => 'key',
            'sortable' => true,
            'order' => null,
            'additional_class' => null,
        ],
        [
            'cell_name' => 'Type',
            'column_name' => 'type',
            'sortable' => true,
            'order' => null,
            'additional_class' => null,
        ],
        [
            'cell_name' => 'Form Type',
            'column_name' => 'form_type',
            'sortable' => true,
            'order' => null,
            'additional_class' => null,
        ],
        [
            'cell_name' => 'Aksi',
            'column_name' => null,
            'sortable' => false,
            'order' => null,
            'additional_class' => null,
        ],
    ];

    /**
     * Define props value before component rendered
     *
     * @return void
     */
    public function mount()
    {
        $this->mountDefaultValues();
    }

    /**
     * Define livewire query string
     *
     * @var array
     */
    protected $queryString = [
        'sort',
        'order',
        'search',
        'group',
    ];

    /**
     * Get all settings from database
     *
     * @return void
     */
    public function getAllSettings()
    {
        return (new SettingsQuery())->filters((object) [
            'group' => $this->group,
            'sort' => $this->sort,
            'order' => $this->order,
            'search' => $this->search,
        ], $this->perPage);
    }

    /**
     * Get all groups from database
     *
     * @return void
     */
    public function getGroups()
    {
        return (new SettingsQuery())->getGroupField();
    }

    /**
     * Destroy setting from database
     *
     * @return void
     */
    public function destroy()
    {
        $setting = AppSetting::find($this->destroyId);

        if ($setting->type == 'image') {
            $path = explode('/', $setting->value);
            $shortPath = implode('/', array_slice($path, -2, 2));
            removeFromStorage('images', $shortPath);
        }

        // delete
        $setting->delete();
        return session()->flash('success', 'Setting berhasil dihapus.');
    }

    public function render()
    {
        return view('appsetting::livewire.settings.table', [
            'settings' => $this->getAllSettings(),
            'groups' => $this->getGroups(),
        ]);
    }
}