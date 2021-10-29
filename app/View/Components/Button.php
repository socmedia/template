<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Button extends Component
{
    public $state, $type, $text, $loadingState, $wireTarget, $additionalClass, $disabled;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        $state = 'dark',
        $type = 'submit',
        $text = '',
        $loadingState = 'false',
        $wireTarget = '',
        $additionalClass = '',
        $disabled = 'false'
    ) {
        $this->state = $state;
        $this->type = $type;
        $this->text = $text;
        $this->loadingState = $loadingState;
        $this->wireTarget = $wireTarget;
        $this->additionalClass = $additionalClass;
        $this->disabled = $disabled;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.button');
    }
}