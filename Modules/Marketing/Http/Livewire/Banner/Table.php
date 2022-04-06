<?php

namespace Modules\Marketing\Http\Livewire\Banner;

use App\Services\ImageService;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Marketing\Entities\Banner;
use Modules\Marketing\Services\Banner\BannerQuery;
use Modules\Marketing\Services\Banner\TableConfig;
use Modules\Marketing\Services\Banner\TableFilterActions;

class Table extends Component
{
    use WithPagination, TableConfig, TableFilterActions;

    /**
     * Define query string props
     *
     * @var string
     */
    public $sort = 'position', $order = 'asc', $is_show, $search, $destroyId, $perPage = 10;

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
        'is_show',
        'order',
        'search',
    ];

    /**
     * Get all banners from database
     *
     * @return void
     */
    public function getAllBanners()
    {
        return (new BannerQuery())->filters((object) [
            'sort' => $this->sort,
            'order' => $this->order,
            'is_show' => $this->is_show,
            'search' => $this->search,
        ], $this->perPage);
    }

    /**
     * Change banner status bocome show or hide
     *
     * @param  mixed $id
     * @return void
     */
    public function showOrHide($id)
    {

        $banner = Banner::find($id);

        // Check if banner not null
        if ($banner) {

            $bannerStatus = $banner->is_active ? 'disembunyikan dari' : 'ditampilkan di';
            $banner->update([
                'is_active' => $banner->is_active ? 0 : 1,
            ]);
            return session()->flash('success', 'Banner berhasil ' . $bannerStatus . ' halaman publik.');

        }

        return session()->flash('failed', 'Banner tidak ditemukan, pengubahan visibilitas gagal.');
    }

    /**
     * Destroy banner from database
     *
     * @return void
     */
    public function destroy()
    {
        $banner = Banner::where('id', $this->destroyId)->first();
        $service = new ImageService();

        // Check if banner have a thumbnail
        if ($banner) {

            // Remove existing thumbnail
            $path = explode('/', $banner->media_path);
            $shortPath = implode('/', array_slice($path, -2, 2));
            $service->removeImage('images', $shortPath);

            $banner->delete();
            return session()->flash('success', 'Banner berhasil dihapus.');
        }

        return session()->flash('failed', 'Banner tidak ditemukan.');
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
            Banner::find($item['value'])->update([
                'position' => $item['order'],
            ]);
        }
    }

    public function render()
    {
        return view('marketing::livewire.banner.table', [
            'banners' => $this->getAllBanners(),
        ]);
    }
}