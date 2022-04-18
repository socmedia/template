<?php

namespace Modules\Front\Http\Livewire\Front\Contact;

use Livewire\Component;
use Modules\Lead\Entities\Lead;

class Form extends Component
{
    public $form = [
        'nama_lengkap',
        'email',
        'whatsapp',
        'pertanyaan',
    ];

    protected $rules = [
        'form.nama_lengkap' => 'required|min:3|max:191|regex:~^[\p{L}\p{Z}]+$~u',
        'form.whatsapp' => 'nullable|min:10|max:15|regex:/^[0-9 +-]/',
        'form.email' => 'required|email|max:191',
        'form.pertanyaan' => 'required|min:10',
    ];

    protected $messages = [
        'form.*.required' => ':attribute tidak boleh kosong.',
        'form.*.min' => ':attribute min. :min karakter.',
        'form.*.max' => ':attribute maks. :max karakter.',
        'form.*.email' => ':attribute harus berupa alamat email yang valid.',
        'form.nama_lengkap.regex' => ':attribute hanya diperbolehkan karakter A-Z, a-z.',
        'form.whatsapp.regex' => 'Format :attribute tidak sesuai. karakter yang diperbolehkan (0-9,+,-).',
    ];

    public function attributes()
    {
        return [
            'form.nama_lengkap' => 'nama lengkap',
            'form.email' => 'email',
            'form.whatsapp' => 'whatsapp',
            'form.pertanyaan' => 'pertanyaan',
        ];
    }

    public function store()
    {
        $this->validate($this->rules, $this->messages, $this->attributes());

        Lead::create([
            'name' => $this->form['nama_lengkap'],
            'email' => $this->form['email'],
            'phone' => $this->form['whatsapp'],
            'question' => $this->form['pertanyaan'],
            'status' => 'Belum Diproses',
        ]);

        $this->reset('form');

        return session()->flash('success', 'Pertanyaan yang Anda kirimkan telah Kami terima. Tunggu balasan dari Kami yang akan Kami sampaikan melalui kontak yang anda kirimkan.');
    }

    public function render()
    {
        return view('front::livewire.front.contact.form');
    }
}