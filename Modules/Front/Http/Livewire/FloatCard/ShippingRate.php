<?php

namespace Modules\Front\Http\Livewire\FloatCard;

use Exception;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class ShippingRate extends Component
{
    /**
     * Form properties
     *
     * @var array
     */
    public $form = [
        'from_city' => null,
        'to_city' => null,
        'service' => null,
        'package' => null,
        'weight' => 1,
        'length' => 1,
        'width' => 1,
        'height' => 1,
    ];

    public $rateResult, $isHomePage;

    /**
     * Validation rules
     *
     * @var array
     */
    protected $rules = [
        'form.from_city' => 'required',
        'form.to_city' => 'required',
        'form.service' => 'required',
        'form.package' => 'required',
        'form.weight' => 'required|max:2|regex:/^[0-9]+$/',
        'form.length' => 'required|max:4|regex:/^[0-9]+$/',
        'form.width' => 'required|max:4|regex:/^[0-9]+$/',
        'form.height' => 'required|max:4|regex:/^[0-9]+$/',
    ];

    /**
     * Validation messages
     *
     * @var array
     */
    protected $messages = [
        'form.*.required' => ':attribute tidak boleh kosong.',
        'form.*.max' => ':attribute maks. :max karakter.',
        'form.*.regex' => 'Format tidak sesuai, :attribute hanya diperbolehkan angka.',
    ];

    /**
     * Validation attributes
     *
     * @var array
     */
    protected $attr = [
        'form.from_city' => 'kota asal',
        'form.to_city' => 'tujuan pengiriman',
        'form.service' => 'layanan',
        'form.package' => 'paket',
        'form.weight' => 'berat',
        'form.length' => 'panjang',
        'form.width' => 'lebar',
        'form.height' => 'tinggi',
    ];

    /**
     * Livewire event listeners
     *
     * @var array
     */
    protected $listeners = [
        'updatedDropdown',
    ];

    /**
     * Run this function while component redered
     *
     * @return void
     */
    public function mount($isHomePage)
    {
        if (!cache('cities')) {
            $this->updateCitiesCache();
        }

        if (!cache('services')) {
            $this->updateServicesCache();
        }

        if (!cache('packages')) {
            $this->updatePackagesCache();
        }

        $this->rateResult = collect([]);
        $this->isHomePage = $isHomePage;
    }

    /**
     * Updated dropdown event
     *
     * @param  array $value
     * @return void
     */
    public function updatedDropdown($value)
    {
        if (count($value) == 2) {
            if (array_key_exists('component', $value)) {
                $expComponent = explode('.', $value['component']);

                if (count($expComponent) != 2 || !array_key_exists('value', $value)) {
                    return;
                }

                if (array_key_exists($expComponent[1], $this->form)) {
                    $this->form[$expComponent[1]] = $value['value'];
                }
            }
        }

        $this->resetRateResult();
    }

    /**
     * Get all cities from another server
     *
     * @return Cache
     */
    public function updateCitiesCache()
    {
        $res = Http::get('https://ica.rosin-group.com/olive/public_api/kota_json');
        $mapped = array_map(function ($array) {
            return (object) $array;
        }, $res->json());

        $collected = collect($mapped);

        return Cache::remember('cities', 28800, function () use ($collected) {
            return $collected->where('aktif', 'Aktif');
        });
    }

    /**
     * Get all services from another server
     *
     * @return Cache
     */
    public function updateServicesCache()
    {
        $res = Http::get('https://ica.rosin-group.com/olive_training/public_api/json_jenis_service');
        $mapped = array_map(function ($array) {
            return (object) $array;
        }, $res->json());

        $collected = collect($mapped);

        return Cache::remember('services', 28800, function () use ($collected) {
            return $collected->where('aktif', 'Aktif')->where('jenis_service', '!=', 'PETRUK');
        });
    }

    /**
     * Get all packages from another server
     *
     * @return Cache
     */
    public function updatePackagesCache()
    {
        $res = Http::get('https://ica.rosin-group.com/olive/public_api/json_jenis_paket');
        $mapped = array_map(function ($array) {
            return (object) $array;
        }, $res->json());

        $collected = collect($mapped);

        return Cache::remember('packages', 28800, function () use ($collected) {
            return $collected->where('aktif', 'Aktif');
        });
    }

    /**
     * Get and collect all cities
     *
     * @return collection
     */
    public function getAllCities()
    {
        return collect(cache('cities'));
    }

    /**
     * Get and collect all services
     *
     * @return collection
     */
    public function getAllServices()
    {
        return collect(cache('services'));
    }

    /**
     * Get and collect all packages
     *
     * @return collection
     */
    public function getAllPackages()
    {
        return collect(cache('packages'));
    }

    /**
     * Get shipping rate
     *
     * @return void
     */
    public function getRate()
    {
        $this->dispatchBrowserEvent('init-select');
        $this->validate($this->rules, $this->messages, $this->attr);

        $from = $this->form['from_city'];
        $to = $this->form['to_city'];
        $service = $this->form['service'];
        $package = $this->form['package'];
        $weight = $this->form['weight'];
        $length = $this->form['length'];
        $width = $this->form['width'];
        $height = $this->form['height'];

        try {
            $res = Http::get("https://ica.rosin-group.com/olive/public_api/get_biaya_json_by_kota/$from/$to/$package/$service/$weight/$length/$width/$height");
            $mapped = array_map(function ($array) {
                return (object) $array;
            }, $res->json());

            $collectedRes = collect($mapped);

            if ($collectedRes->isEmpty()) {
                $this->rateResult = collect([]);
                return session()->flash('failed', 'Data tidak ditemukan.');
            }

            $fromData = $this->getAllCities()->where('tlc', $from)->first();
            $toData = $this->getAllCities()->where('tlc', $to)->first();
            $serviceData = $service != 'all' ? $this->getAllServices()->where('kode_service', $service)->first() : 'Semua layanan';
            $packageData = $this->getAllPackages()->where('kode_paket', $package)->first();

            $collectedRes = $collectedRes->map(function ($res) use ($weight) {
                $res->calculated_price = ($weight <= 5) ? $res->biaya_awal : $res->biaya_awal + (($weight - 5) * $res->biaya_berikut);
                return $res;
            });

            $data = (object) [
                'form' => (object) [
                    'from_city' => '(' . $fromData->tlc . ') ' . $fromData->nama_kota,
                    'to_city' => '(' . $toData->tlc . ') ' . $toData->nama_kota,
                    'service' => $serviceData == 'Semua layanan' ? 'Semua layanan' : $serviceData->jenis_service,
                    'package' => $packageData->jenis_paket,
                    'weight' => $weight . ' Kg',
                    'length' => $length . 'cm',
                    'width' => $width . 'cm',
                    'height' => $height . 'cm',
                ],
                'results' => $collectedRes,
            ];

            $this->rateResult = collect($data);
            return $this->dispatchBrowserEvent('show-modal');

        } catch (Exception $exception) {
            return session()->flash('failed', $exception->getMessage());
        }
    }

    /**
     * Reset rate result
     *
     * @return void
     */
    public function resetRateResult()
    {
        return $this->rateResult = collect([]);
    }

    public function render()
    {
        return view('front::livewire.float-card.shipping-rate', [
            'cities' => $this->getAllCities(),
            'services' => $this->getAllServices(),
            'packages' => $this->getAllPackages(),
        ]);
    }
}