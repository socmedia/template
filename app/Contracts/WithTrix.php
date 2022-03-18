<?php

namespace App\Contracts;

use App\Http\Livewire\Trix;

trait WithTrix
{
    /**
     * Hooks for description property
     * Reset trix ediotor to null value
     *
     * @return void
     */
    public function resetTrix()
    {
        return $this->emitTo('trix', 'reset_trix');
    }
}