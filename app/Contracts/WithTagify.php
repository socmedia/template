<?php

namespace App\Contracts;

trait WithTagify
{
    /**
     * Hooks for description property
     * Reset tagify ediotor to null value
     *
     * @return void
     */
    public function resetTagify()
    {
        return $this->emitTo('tagify', 'reset_tagify');
    }
}
