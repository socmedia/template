<?php

namespace Modules\Marketing\Http\Livewire\Faq;

use Livewire\Component;
use Modules\Marketing\Entities\Faq;
use Modules\Master\Entities\Category;

class Edit extends Component
{
    public $faq, $categories = [], $pluckCategories, $question, $answer, $category, $is_show = true;

    public function mount($faq)
    {
        $categories = $this->getAllCategories();
        $this->categories = $categories;
        $this->pluckCategories = implode(',', $categories->pluck('id')->toArray());

        $this->faq = $faq;
        $this->category = $faq->category_id;
        $this->question = $faq->question;
        $this->answer = $faq->answer;
        $this->is_show = $faq->is_show ? true : false;
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

    public function update()
    {
        $this->validate();

        $this->faq->update([
            'category_id' => $this->category,
            'question' => $this->question,
            'answer' => $this->answer,
            'is_show' => $this->is_show ? 1 : 0,
        ]);

        return session()->flash('success', 'FAQ berhasil ditambahkan');
    }

    public function render()
    {
        return view('marketing::livewire.faq.edit');
    }
}