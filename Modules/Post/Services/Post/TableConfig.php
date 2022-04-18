<?php

namespace Modules\Post\Services\Post;

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
        $this->sort = request('sort') ?: 'created_at';
        $this->order = request('order') ?: 'desc';
        $this->search = request('search');
        $this->category = request('category');
        $this->type = request('type');
        $this->status = request('status');
    }
}