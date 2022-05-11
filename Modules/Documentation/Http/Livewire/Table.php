<?php

namespace Modules\Documentation\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\Documentation\Entities\Documentation;
use Modules\Documentation\Services\DocumentationQuery;
use Modules\Documentation\Services\TableConfig;
use Modules\Documentation\Services\TableFilterActions;

class Table extends Component
{
    use WithPagination, TableConfig, TableFilterActions;

    /**
     * Devine props for livewire query string
     *
     * @var mixed
     */
    public $sort = 'position', $order = 'asc', $search, $perPage = 10, $childs, $modalTitle;

    /**
     * Define component main props
     *
     * @var bool
     */
    public $destroyId, $onlyTrashed = false;

    /**
     * Define livewire query string
     *
     * @var array
     */
    protected $queryString = [
        'sort',
        'order',
        'search',
        'page',
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
     * Get all Documentations
     * Showing Documentations data from database
     *
     * @return void
     */
    public function getAll()
    {
        return (new DocumentationQuery())->filters((object) [
            'search' => $this->search,
            'sort' => $this->sort,
            'order' => $this->order,
            'onlyTrashed' => $this->onlyTrashed,
        ], $this->perPage);
    }

    /**
     * Show slected sub category
     *
     * @param  mixed $id
     * @return void
     */
    public function show($id)
    {
        $this->childs = (new DocumentationQuery())->getChilds((object) [
            'parent_id' => $id,
        ]);

        $documentation = Documentation::find($id);
        $this->modalTitle = $documentation ? $documentation->page_title : null;
    }

    /**
     * Reset modal action
     *
     * @return void
     */
    public function resetModal()
    {
        $this->modalTitle = null;
        $this->childs = null;
    }

    /**
     * Restore documentation from the trash
     *
     * @param  string $id
     * @return void
     */
    public function restore($id)
    {
        $documentation = Documentation::where('id', $id)->withTrashed()->first();

        if (!$documentation) {
            return session()->flash('failed', 'Dokumentasi tidak ditemukan.');
        }

        $documentation->restore();
        return session()->flash('success', 'Dokumentasi berhasil dipulihkan.');
    }

    /**
     * Bring selected documentation to trash
     *
     * @param  string $id
     * @return void
     */
    public function trash($id)
    {
        $documentation = Documentation::find($id);
        $documentation->delete();

        if (!$documentation) {
            // Flash message
            return session()->flash('failed', 'Dokumentasi tidak ditemukan.');
        }

        // Flash message
        return session()->flash('success', 'Dokumentasi berhasil dipindahkan ke tong sampah.');
    }

    /**
     * Remove existing data from database at Documentations table
     *
     * @return void
     */
    public function destroy()
    {
        $documentation = Documentation::where('id', $this->destroyId)->withTrashed()->firstOrFail();

        if ($documentation) {
            $documentation->forceDelete();

            // Flash message
            $this->reset('destroyId');
            return session()->flash('success', 'Dokumentasi berhasil dihapus.');
        }

        // Flash message
        $this->reset('destroyId');
        return session()->flash('failed', 'Penghapusan dokumentasi gagal, karena dokumentasi tidak ditemukan.');
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
            Documentation::find($item['value'])->update([
                'position' => $item['order'],
            ]);
        }
    }

    public function render()
    {
        return view('documentation::livewire.table', [
            'documentations' => $this->getAll(),
        ]);
    }
}
