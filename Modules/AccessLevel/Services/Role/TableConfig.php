<?php

namespace Modules\AccessLevel\Services\Role;

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
        $this->role = request('role');
        $this->email_verified = request('email_verified');
        request()->segment(3) != 'sampah' ? false : $this->onlyTrashed = true;

    }
}