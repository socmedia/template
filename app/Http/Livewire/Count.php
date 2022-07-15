<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\Lead\Entities\Lead;
use Modules\Master\Entities\Category;
use Modules\Post\Entities\Post;

class Count extends Component
{
    public function totalPosts()
    {
        return Post::count();
    }

    public function totalCategories()
    {
        return Category::count();
    }

    public function totalPublicQuestions()
    {
        return Lead::count();
    }

    public function totalUnseenPublicQuestions()
    {
        return Lead::where('is_readed', 0)->count();
    }

    public function render()
    {
        return view('livewire.count', [
            'total_posts' => numberShortner($this->totalPosts()),
            'total_categories' => numberShortner($this->totalCategories()),
            'total_leads' => numberShortner($this->totalPublicQuestions()),
            'total_unseen_leads' => numberShortner($this->totalUnseenPublicQuestions()),
        ]);
    }
}
