<?php

namespace Modules\Master\Services;

trait TableConfig
{
    /**
     * Return default filters property
     * Result after livewire property not equal to null
     *
     * @return array
     */
    public function filters(): array
    {
        return TableFilters::handle();
    }

    /**
     * Set all properties default values based on query string value
     *
     * @return void
     */
    public function mountDefaultValues()
    {
        $this->filters = $this->filters();
        $this->defaultPropertiesValueBeforeComponentRendered();
    }

    /**
     * Set properties default value before component was rendered
     * Set properties value with query string value
     *
     * @return void
     */
    public function defaultPropertiesValueBeforeComponentRendered()
    {
        $this->sort = request('sort') ?: 'created_at';
        $this->order = request('order') ?: 'desc';
        $this->search = request('search');
        $this->defaultFiltersValueBeforeComponentRendered();
    }

    /**
     * Set default filters property value before component rendered
     *
     * @return void
     */
    public function defaultFiltersValueBeforeComponentRendered()
    {
        $this->filters['search']['query'] = request('search');
        $this->filters['sort']['query'] = [
            request('sort') ?: 'created_at',
            request('order') ?: 'desc',
        ];
    }
}