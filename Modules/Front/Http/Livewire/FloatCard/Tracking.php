<?php

namespace Modules\Front\Http\Livewire\FloatCard;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Tracking extends Component
{
    /**
     * Form properties
     *
     * @var mixed
     */
    public $receipt, $receiptResult, $isHomePage;

    /**
     * Validation rules
     *
     * @var array
     */
    protected $rules = [
        'receipt' => 'required|max:12|regex:/^[0-9]+$/',
    ];

    /**
     * Validation messages
     *
     * @var array
     */
    protected $messages = [
        'required' => ':attribute tidak boleh kosong.',
        'max' => ':attribute maks. :max karakter.',
        'regex' => 'Format tidak sesuai, No. SP hanya diperbolehkan angka.',
    ];

    /**
     * Validation attributes
     *
     * @var array
     */
    protected $attr = [
        'receipt' => 'No. Surat pengiriman',
    ];

    /**
     * Run this function while component redered
     *
     * @return void
     */
    public function mount($isHomePage)
    {
        $this->receiptResult = collect([]);

        $this->isHomePage = $isHomePage;
    }

    /**
     * Check receipt to main server
     *
     * @return void
     */
    public function checkReceipts()
    {
        $this->validate($this->rules, $this->messages, $this->attr);

        $receipt = Http::get('https://ica.rosin-group.com/reica/sp_history/get_history_json/' . $this->receipt);
        $receipt = $receipt->json();
        $histories = array_key_exists('history', $receipt) ? $receipt['history'] : null;
        $mappedHistory = null;

        // Check histories response and convert to object
        if (is_array($histories)) {
            $mappedHistory = array_map(function ($data) {
                return (object) [
                    'keterangan' => $data['keterangan'],
                    'no' => $data['no'],
                    'posisi' => $data['posisi'],
                    'proses' => $data['proses'],
                    'waktu' => dateTimeTranslated($data['waktu'], 'D d, M Y. H:i:s'),
                ];
            }, $histories);
        }

        // Check if receipt info is available
        if ($receipt['info']) {
            $this->dispatchBrowserEvent('show-modal');
            return $this->receiptResult = collect($mappedHistory);
        }

        $this->receiptResult = collect([]);
        return session()->flash('failed', 'Nomor surat pengiriman yang anda masukkan tidak kami temukan.');
    }

    /**
     * Reset receipt result
     *
     * @return void
     */
    public function resetReceiptResult()
    {
        return $this->receiptResult = collect([]);
    }

    public function render()
    {
        return view('front::livewire.float-card.tracking');
    }
}