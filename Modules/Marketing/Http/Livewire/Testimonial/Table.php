<?php

namespace Modules\Marketing\Http\Livewire\Testimonial;

use App\Services\ImageService;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Marketing\Entities\Testimonial;
use Modules\Marketing\Services\Testimonial\TableConfig;
use Modules\Marketing\Services\Testimonial\TableFilterActions;
use Modules\Marketing\Services\Testimonial\TestimonialQuery;
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
     * Get all testimonials from database
     *
     * @return void
     */
    public function getAllTestimonials()
    {
        return (new TestimonialQuery())->filters((object) [
            'category' => $this->category,
            'is_active' => $this->is_active,
            'search' => $this->search,
            'sort' => $this->sort,
            'order' => $this->order,
        ], $this->perPage);
    }

    /**
     * Change testimonial status bocome show or hide
     *
     * @param  mixed $id
     * @return void
     */
    public function showOrHide($id)
    {

        $testimonial = Testimonial::find($id);

        // Check if testimonial not null
        if ($testimonial) {

            $testimonialStatus = $testimonial->is_active ? 'disembunyikan dari' : 'ditampilkan di';
            $testimonial->update([
                'is_active' => $testimonial->is_active ? 0 : 1,
            ]);
            return session()->flash('success', 'Testimonial berhasil ' . $testimonialStatus . ' halaman publik.');

        }

        return session()->flash('failed', 'Testimonial tidak ditemukan, pengubahan visibilitas gagal.');
    }

    /**
     * Destroy testimonial from database
     *
     * @return void
     */
    public function destroy()
    {
        $testimonial = Testimonial::where('id', $this->destroyId)->first();

        // Check if testimonial have a thumbnail
        if ($testimonial) {
            $service = new ImageService();
            // Check if post have a thumbnail
            if ($testimonial->media_path) {
                // Remove existing thumbnail
                $path = explode('/', $testimonial->media_path);
                $shortPath = implode('/', array_slice($path, -2, 2));
                $service->removeImage('images', $shortPath);
            }

            $testimonial->delete();
            return session()->flash('success', 'Testimonial berhasil dihapus.');
        }

        return session()->flash('failed', 'Testimonial tidak ditemukan.');
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
            Testimonial::find($item['value'])->update([
                'position' => $item['order'],
            ]);
        }
    }

    public function render()
    {
        return view('marketing::livewire.testimonial.table', [
            'testimonials' => $this->getAllTestimonials(),
        ]);
    }
}
