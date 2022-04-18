<?php

namespace Modules\Service\Services\Service;

trait TableConfig
{
    /**
     * Set all properties default values based on query string value
     *
     * @return void
     */
    public function mountDefaultValues()
    {
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
        $this->sort = request('sort') ?: 'position';
        $this->order = request('order') ?: 'asc';
        $this->table_reference = request('table_reference');
        $this->search = request('search');

        request()->segment(4) != 'sampah' ? false : $this->onlyTrashed = true;

    }
}