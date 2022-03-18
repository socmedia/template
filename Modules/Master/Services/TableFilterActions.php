<?php

namespace Modules\Master\Services;

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
        $this->filters['search']['query'] = $value;
    }

    /**
     * To handle category dropdown
     * Update filters property value
     *
     * @param  string $value
     * @return void
     */
    public function filterCategory($value)
    {
        $this->resetPage();
        $this->category = $value;
        $this->filters['category']['query'] = str_replace('-', ' ', $value);
    }

    /**
     * To handle type dropdown
     * Update filters property value
     *
     * @param  string $value
     * @return void
     */
    public function filterType($value)
    {
        $this->resetPage();
        $this->type = $value;
        $this->filters['type']['query'] = str_replace('-', ' ', $value);
    }

    /**
     * To handle status dropdown
     * Update filters property value
     *
     * @param  string $value
     * @return void
     */
    public function filterStatus($value)
    {
        $this->resetPage();
        $this->status = $value;
        $this->filters['status']['query'] = str_replace('-', ' ', $value);
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
        $this->filters['sort']['query'] = [$this->sort, $this->order];
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
            $this->filters['sort']['query'] = [$this->sort, $order];
        } else {
            $this->order = null;
            $this->filters['sort']['query'] = [$this->sort, null];
        }
    }

    //=====================================//
    //=========== Reset Actions ===========//
    //=====================================//

    /**
     * To handle reset category property
     * When button with attribute wire:click={resetCategory}
     * This method will be running
     *
     * @return void
     */
    public function resetCategory()
    {
        $this->reset('category');
        $this->filters['category']['query '] = null;
    }

    /**
     * To handle reset type property
     * When button with attribute wire:click={resetType}
     * This method will be running
     *
     * @return void
     */

    public function resetType()
    {
        $this->reset('type');
        $this->filters['type']['query'] = null;
    }

    /**
     * To handle reset status property
     * When button with attribute wire:click={resetStatus}
     * This method will be running
     *
     * @return void
     */
    public function resetStatus()
    {
        $this->reset('status');
        $this->filters['status']['query'] = null;
    }

    /**
     * To handle reset search property
     * When button with attribute wire:click={resetSearch}
     * This method will be running
     *
     * @return void
     */
    public function resetSearch()
    {
        $this->reset('search');
        $this->filters['search']['query'] = null;
    }

    /**
     * To handle reset filter property
     * When button with attribute wire:click={resetFilter}
     * This method will be running
     *
     * @return void
     */
    public function resetFilter()
    {
        $this->reset('sort', 'order');
        $this->filters['sort']['query'] = [null, null];
    }
}