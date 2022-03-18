<?php

namespace App\Contracts;

trait WithImageUpload
{
    /**
     * Hooks for description property
     * Reset trix ediotor to null value
     *
     * @return void
     */
    public function resetImageUpload()
    {
        return $this->emitTo('image-upload', 'reset_image');
    }
}