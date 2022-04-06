<?php

namespace Modules\AccessLevel\Services\User;

trait TableFilterActions
{
    //=====================================//
    //============ Hook Actions ===========//
    //=====================================//

    /**
     * Livewire hooks, when search props has been updated
     *
     * @param  string $value
     * @return void
     */
    public function updatedSearch($value)
    {
        $this->search = $value;
    }

    /**
     * Livewire hooks, when search props has been updated
     *
     * @param  mixed $value
     * @return void
     */
    public function updatedRole($value)
    {
        $this->role = $value;

        if (!$value) {
            $this->role = null;
        }
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

        if (!$this->order) {
            $this->order = 'asc';
        } elseif ($this->order == 'asc') {
            $this->order = 'desc';
        } elseif ($this->order == 'desc') {
            $this->sort = null;
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
        $this->reset('search', 'role', 'sort', 'order');
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