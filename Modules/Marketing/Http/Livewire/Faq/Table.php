<?php

namespace Modules\Marketing\Http\Livewire\Faq;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\Marketing\Entities\Faq;
use Modules\Marketing\Services\Faq\FaqQuery;
use Modules\Marketing\Services\Faq\TableConfig;
use Modules\Marketing\Services\Faq\TableFilterActions;
use Modules\Master\Entities\Category;

class Table extends Component
{
    use WithPagination, TableConfig, TableFilterActions;

    /**
     * Define query string props
     *
     * @var string
     */
    public $sort = 'position', $order = 'asc', $category, $is_show, $search, $destroyId, $perPage = 10;

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
        'is_show',
        'sort',
        'order',
        'search',
    ];

    /**
     * Get all faqs from database
     *
     * @return void
     */
    public function getAllFaqs()
    {
        return (new FaqQuery())->filters((object) [
            'category' => $this->category,
            'is_show' => $this->is_show,
            'search' => $this->search,
            'sort' => $this->sort,
            'order' => $this->order,
        ], $this->perPage);
    }

    /**
     * Change faq status bocome show or hide
     *
     * @param  mixed $id
     * @return void
     */
    public function showOrHide($id)
    {

        $faq = Faq::find($id);

        // Check if faq not null
        if ($faq) {

            $faqStatus = $faq->is_show ? 'disembunyikan dari' : 'ditampilkan di';
            $faq->update([
                'is_show' => $faq->is_show ? 0 : 1,
            ]);
            return session()->flash('success', 'Faq berhasil ' . $faqStatus . ' halaman publik.');

        }

        return session()->flash('failed', 'Faq tidak ditemukan, pengubahan visibilitas gagal.');
    }

    /**
     * Destroy faq from database
     *
     * @return void
     */
    public function destroy()
    {
        $faq = Faq::where('id', $this->destroyId)->first();

        // Check if faq have a thumbnail
        if ($faq) {

            $faq->delete();
            return session()->flash('success', 'Faq berhasil dihapus.');
        }

        return session()->flash('failed', 'Faq tidak ditemukan.');
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
            Faq::find($item['value'])->update([
                'position' => $item['order'],
            ]);
        }
    }

    public function render()
    {
        return view('marketing::livewire.faq.table', [
            'faqs' => $this->getAllFaqs(),
            'categories' => Category::where('table_reference', 'faqs')->get(),
        ]);
    }
}