<?php

namespace Modules\Marketing\Services\Testimonial;

trait TableFilterActions
{
    //=====================================//
    //============ Hook Actions ===========//
    //=====================================//

    /**
     * Livewire hooks, when search props has been updated
     * This method will be running
     *
     * @param  string $value
     * @return void
     */
    public function updatedSearch($value)
    {
        $this->resetPage();
        $this->search = $value;
    }

    /**
     * To handle sort dropdown
     * Update filters property value
     *
     * @param  string $value
     * @return void
     */
    public function sort($column)
    {
        $this->resetPage();
        $this->sort = $column;
    }

    /**
     * To handle order dropdown
     * Update filters property value
     *
     * @param  string $value
     * @return void
     */
    public function order($order)
    {
        $this->resetPage();
        $orders = ['asc', 'desc'];
        if (in_array($order, $orders)) {
            $this->order = $order;
        } else {
            $this->order = null;
        }
    }

    /**
     * To handle perpage pagination
     *
     * @param  mixed $total
     * @return void
     */
    public function perPage($total)
    {
        $this->resetPage();
        $this->perPage = $total;
    }

    //=====================================//
    //=========== Reset Actions ===========//
    //=====================================//

    /**
     * To handle reset filter property
     * When button with attribute wire:click={resetFilters}
     * This method will be running
     *
     * @return void
     */
    public function resetFilters()
    {
        $this->reset('search', 'is_active', 'sort', 'order');
    }

    /**
     * To handle reset search action
     * When button with attribute wire:click={searchFilter}
     * This method will be running
     *
     * @return void
     */
    public function searchFilters()
    {
        $this->resetPage();
    }
}