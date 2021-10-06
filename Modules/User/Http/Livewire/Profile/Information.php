<?php

namespace Modules\User\Http\Livewire\Profile;

use App\Models\District;
use App\Models\Province;
use App\Models\Regency;
use Livewire\Component;

class Information extends Component
{
    public $fullname, $province, $regency, $regencies = [], $district, $districts = [], $address, $place_of_birth, $date_of_birth, $gender, $bio;

    public function updatedProvince($val)
    {
        $this->regencies = Regency::where('province_id', $val)->get(['id', 'name']);
    }

    public function updatedRegency($val)
    {
        $this->districts = District::where('regency_id', $val)->get(['id', 'name']);
    }

    public function render()
    {
        return view('user::livewire.profile.information', [
            'provinces' => Province::get(['id', 'name']),
        ]);
    }
}