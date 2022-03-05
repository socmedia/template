<?php

namespace App\View\Components;

use Illuminate\View\Component;

class RegisterOwnerSecond extends Component
{
    public $errors, $form, $categories = [], $subCategories = [], $label = [];

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($errors, $form, $categories, $subCategories, $label)
    {
        $this->errors = $errors;
        $this->form = $form;
        $this->categories = $categories;
        $this->subCategories = $subCategories;
        $this->label = $label;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.register-owner-second');
    }
}