<?php

namespace Modules\Service\Http\Livewire\Service;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\Service\Entities\Service;
use Modules\Service\Services\Service\ServiceQuery;
use Modules\Service\Services\Service\TableConfig;
use Modules\Service\Services\Service\TableFilterActions;

class Table extends Component
{
    use WithPagination, TableConfig, TableFilterActions;

    /**
     * Define table headers
     *
     * @var array
     */
    public $headers = [
        [
            'cell_name' => 'Nama',
            'column_name' => 'name',
            'sortable' => true,
            'order' => null,
            'additional_class' => null,
        ],
        [
            'cell_name' => 'Slug',
            'column_name' => 'slug_name',
            'sortable' => true,
            'order' => null,
            'additional_class' => null,
        ],
        [
            'cell_name' => 'Posisi',
            'column_name' => 'position',
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
     * Devine props for livewire query string
     *
     * @var mixed
     */
    public $sort = 'position', $order = 'asc', $search, $destroyId, $perPage = 10;

    /**
     * Define livewire query string
     *
     * @var array
     */
    protected $queryString = [
        'sort',
        'order',
        'search',
    ];

    /**
     * Define props before component rendered
     *
     * @return void
     */
    public function mount()
    {
        $this->mountDefaultValues();
    }

    /**
     * Get al Categories
     * Showing Categories data from database
     *
     * @return void
     */
    public function getAll()
    {
        return (new ServiceQuery())->filters((object) [
            'search' => $this->search,
            'sort' => $this->sort,
            'order' => $this->order,
        ], $this->perPage);
    }

    /**
     * Remove existing data from database at categories table
     *
     * @return void
     */
    public function destroy()
    {
        $service = ServiceQuery::find($this->destroyId);

        if ($service) {
            $service->delete();

            // Flash message
            $this->reset('destroyId');
            return session()->flash('success', 'Kategori berhasil dihapus.');
        }

        // Flash message
        $this->reset('destroyId');
        return session()->flash('failed', 'Penghapusan kategori gagal, karena kategori tidak ditemukan.');
    }

    /**
     * Update banner position while drag n drop
     *
     * @param  mixed $list
     * @return void
     */
    public function updateOrder($list)
    {
        foreach ($list as $item) {
            Service::find($item['value'])->update([
                'position' => $item['order'],
            ]);
        }
    }

    public function render()
    {
        return view('service::livewire.service.table', [
            'services' => $this->getAll(),
        ]);
    }
}