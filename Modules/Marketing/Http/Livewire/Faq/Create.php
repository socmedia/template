<?php

namespace Modules\Marketing\Http\Livewire\Faq;

use Livewire\Component;
use Modules\Marketing\Entities\Faq;
use Modules\Master\Entities\Category;

class Create extends Component
{
    public $categories = [], $pluckCategories, $question, $answer, $category, $is_show = true;

    public function mount()
    {
        $categories = $this->getAllCategories();
        $this->categories = $categories;
        $this->pluckCategories = implode(',', $categories->pluck('id')->toArray());
    }

    protected function rules()
    {
        return [
            'question' => 'required|max:191',
            'answer' => 'required',
            'category' => 'required|in:' . $this->pluckCategories,
            'is_show' => 'nullable|boolean',
        ];
    }

    public function getAllCategories()
    {
        return Category::where('table_reference', 'faqs')->get();
    }

    public function store()
    {
        $this->validate();

        $latest = Faq::where('category_id', $this->category)->orderBy('position')->latest();

        Faq::create([
            'category_id' => $this->category,
            'question' => $this->question,
            'answer' => $this->answer,
            'is_show' => $this->is_show ? 1 : 0,
            'position' => $latest->first() ? $latest->first()->position + 1 : 1,
        ]);

        $this->reset(
            'question',
            'answer',
            'category'
        );
        return session()->flash('success', 'FAQ berhasil ditambahkan');
    }

    public function render()
    {
        return view('marketing::livewire.faq.create', [
            'categories' => $this->categories,
        ]);
    }
}