<?php

namespace App\Contracts;

trait WithImageFilepond
{
    /**
     * Hooks for description property
     * Reset trix ediotor to null value
     *
     * @return void
     */
    public function resetImageFilepond()
    {
        return $this->emitTo('filepond.image', 'reset_images');
    }
}
