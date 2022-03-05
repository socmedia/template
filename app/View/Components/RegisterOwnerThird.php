<?php

namespace App\View\Components;

use Illuminate\View\Component;

class RegisterOwnerThird extends Component
{
    public $errors, $register;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($errors, $register)
    {
        $this->errors = $errors;
        $this->register = $register;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.register-owner-third');
    }
}