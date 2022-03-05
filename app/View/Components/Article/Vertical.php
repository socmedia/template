<?php

namespace App\View\Components\Article;

use Illuminate\View\Component;

class Vertical extends Component
{
    public $post, $archive;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($post, $archive)
    {
        $this->post = $post;
        $this->archive = $archive;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.article.vertical');
    }
}