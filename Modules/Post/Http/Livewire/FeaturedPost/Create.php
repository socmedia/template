<?php

namespace Modules\Post\Http\Livewire\FeaturedPost;

use Livewire\Component;
use Modules\Post\Entities\FeaturedPost;
use Modules\Post\Entities\Post;

class Create extends Component
{
    public $lists = [], $choosenList = [], $search;

    public function mount()
    {
        $posts = FeaturedPost::select('posts_id')->get()->pluck('posts_id')->toArray();
        $this->lists = $posts;
    }

    public function search()
    {
        $posts = Post::select(['id', 'title', 'thumbnail', 'subject'])->published()->limit(5);

        // Merge choosen lists with featured posts data
        $array = array_merge($this->lists, array_column($this->choosenList, 'id'));
        $posts->whereNotIn('id', $array);

        if ($this->search) {
            $posts->search((object) [
                'search' => $this->search,
            ]);

            return $posts->orderBy('published_at', 'desc')->get();
        }

        return collect([]);
    }

    public function addPost($id)
    {
        $post = Post::find($id);
        if ($post) {
            array_push($this->choosenList, [
                'id' => $post->id,
                'title' => $post->title,
                'thumbnail' => $post->thumbnail,
                'subject' => $post->subject,
            ]);
            $this->reset('search');
        }
    }

    public function removePost($index)
    {
        unset($this->choosenList[$index]);
    }

    public function store()
    {
        foreach (array_column($this->choosenList, 'id') as $id) {
            FeaturedPost::create([
                'posts_id' => $id,
            ]);
        }

        $this->reset();

        $posts = FeaturedPost::select('posts_id')->get()->pluck('posts_id')->toArray();
        $this->lists = $posts;

        session()->flash('success', 'Postingan berhasil ditambahkan.');
    }

    public function render()
    {
        return view('post::livewire.featured-post.create', [
            'result' => $this->search(),
        ]);
    }
}