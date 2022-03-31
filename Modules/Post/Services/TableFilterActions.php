<?php

namespace Modules\Post\Services;

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
     * To handle reset search property
     * When button with attribute wire:click={resetSearch}
     * This method will be running
     *
     * @return void
     */
    public function resetSearch()
    {
        $this->reset('search');
    }

    /**
     * To handle reset filter property
     * When button with attribute wire:click={resetFilter}
     * This method will be running
     *
     * @return void
     */
    public function resetFilters()
    {
        $this->reset('search', 'type', 'category', 'status', 'sort', 'order');
    }

    public function searchFilters()
    {
        $this->resetPage();

        if (!$this->type) {
            $this->reset('type');
        }
    }
}