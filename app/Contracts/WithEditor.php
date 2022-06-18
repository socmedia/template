<?php

namespace App\Contracts;

use App\Http\Livewire\Editor;

trait WithEditor
{
    /**
     * Hooks for description property
     * Reset editor ediotor to null value
     *
     * @return void
     */
    public function resetEditor()
    {
        return $this->emitTo('editor', 'reset_editor');
    }
}