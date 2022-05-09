<?php

namespace Modules\AppSetting\Http\Livewire\Seo;

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
    public $filters, $group, $sort = 'created_at', $order = 'desc', $search, $destroyId, $perPage = 10;

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
        return (new SettingsQuery())->filtersSeo((object) [
            'sort' => $this->sort,
            'order' => $this->order,
            'search' => $this->search,
        ], $this->perPage);
    }

    public function render()
    {
        return view('appsetting::livewire.seo.table', [
            'settings' => $this->getAllSettings(),
        ]);
    }
}