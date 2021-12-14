<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Filter extends Component
{
    public $filters, $showFilterText, $button;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($filters = [])
    {
        $this->filters = $filters;
        $this->showFilterText = $this->countFilter();
    }

    public function countFilter()
    {
        $value = false;

        foreach ($this->filters as $index => $filter) {
            if (is_array($filter['query'])) {
                if (!in_array(null, $filter['query'])) {
                    $value = true;
                }
            } else {
                if ($filter['query']) {
                    $value = true;
                }
            }
        }

        return $value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.filter');
    }
}