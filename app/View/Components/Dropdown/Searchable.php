<?php

namespace App\View\Components\Dropdown;

use Illuminate\View\Component;

class Searchable extends Component
{
    public $datas, $prop, $activeDropdown, $text, $withNullValue;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($datas = [], $prop = '', $activeDropdown = null, $text = '', $withNullValue = true)
    {
        $this->datas = $datas;
        $this->prop = $prop;
        $this->activeDropdown = $activeDropdown;
        $this->text = $text;
        $this->withNullValue = $withNullValue;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dropdown.searchable');
    }
}