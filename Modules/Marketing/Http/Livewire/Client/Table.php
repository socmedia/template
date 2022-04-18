<?php

namespace Modules\Marketing\Http\Livewire\Client;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\Marketing\Entities\Client;
use Modules\Marketing\Services\Client\ClientQuery;
use Modules\Marketing\Services\Client\TableConfig;
use Modules\Marketing\Services\Client\TableFilterActions;
use Modules\Master\Entities\Category;

class Table extends Component
{
    use WithPagination, TableConfig, TableFilterActions;

    /**
     * Define query string props
     *
     * @var string
     */
    public $sort = 'position', $order = 'asc', $category, $is_active, $search, $destroyId, $perPage = 10;

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
        'category',
        'is_active',
        'sort',
        'order',
        'search',
    ];

    /**
     * Get all clients from database
     *
     * @return void
     */
    public function getAllClients()
    {
        return (new ClientQuery())->filters((object) [
            'category' => $this->category,
            'is_active' => $this->is_active,
            'search' => $this->search,
            'sort' => $this->sort,
            'order' => $this->order,
        ], $this->perPage);
    }

    /**
     * Change client status bocome show or hide
     *
     * @param  mixed $id
     * @return void
     */
    public function showOrHide($id)
    {

        $client = Client::find($id);

        // Check if client not null
        if ($client) {

            $clientStatus = $client->is_active ? 'disembunyikan dari' : 'ditampilkan di';
            $client->update([
                'is_active' => $client->is_active ? 0 : 1,
            ]);
            return session()->flash('success', 'Client berhasil ' . $clientStatus . ' halaman publik.');

        }

        return session()->flash('failed', 'Client tidak ditemukan, pengubahan visibilitas gagal.');
    }

    /**
     * Destroy client from database
     *
     * @return void
     */
    public function destroy()
    {
        $client = Client::where('id', $this->destroyId)->first();

        // Check if client have a thumbnail
        if ($client) {

            $client->delete();
            return session()->flash('success', 'Client berhasil dihapus.');
        }

        return session()->flash('failed', 'Client tidak ditemukan.');
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
            Client::find($item['value'])->update([
                'position' => $item['order'],
            ]);
        }
    }

    public function render()
    {
        return view('marketing::livewire.client.table', [
            'clients' => $this->getAllClients(),
            'categories' => Category::where('table_reference', 'clients')->get(),
        ]);
    }
}