<?php

namespace App\Contracts;

trait WithTagifyList
{
    /**
     * Hooks for description property
     * Reset tagify ediotor to null value
     *
     * @return void
     */
    public function resetTagifyList()
    {
        return $this->emitTo('tagify_list', 'reset_tagify_list');
    }
}
