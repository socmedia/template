<?php

namespace Modules\User\Http\Livewire\Profile\Child;

use App\Models\District;
use App\Models\Province;
use App\Models\Regency;
use App\Models\User;
use Livewire\Component;

class Information extends Component
{
    public $user, $userId, $fullname, $province, $regency, $regencies = [], $district, $districts = [],
    $address, $place_of_birth, $date_of_birth, $gender, $bio;

    protected $listeners = [
        'updatedBio',
    ];

    public function mount()
    {
        $user = auth()->user();
        $this->user = $user;
        $this->userId = $user->id;
        $this->fullname = $user->name;
        $this->province = $user->province_id;

        if ($user->regency_id) {
            $regency = Regency::find($user->regency_id);
            $this->regency = !$regency ?: $regency->id;
            $this->regencies = Regency::where('province_id', $user->province_id)->get();
        }

        if ($user->district_id) {
            $district = District::find($user->district_id);
            $this->district = !$district ?: $district->id;
            $this->districts = District::where('regency_id', $this->regency)->get();
        }

        $this->district = $user->district_id;
        $this->address = $user->address;
        $this->place_of_birth = $user->place_of_birth;
        $this->date_of_birth = $user->date_of_birth;
        $this->gender = $user->gender;
        $this->bio = $user->bio;
    }

    public function updatedProvince($val)
    {
        $this->reset('regencies', 'districts');
        $this->regencies = Regency::where('province_id', $val)->get(['id', 'name']);
        $this->dispatchBrowserEvent('init-editor');
    }

    public function updatedRegency($val)
    {
        $this->reset('districts');
        $this->districts = District::where('regency_id', $val)->get(['id', 'name']);
        $this->dispatchBrowserEvent('init-editor');
    }

    public function updatedBio($val)
    {
        $this->bio = $val;
        $this->dispatchBrowserEvent('init-editor');
    }

    public function updated()
    {
        $this->dispatchBrowserEvent('init-editor');
    }

    public function savePersonalData()
    {
        $this->validate([
            'fullname' => 'required|min:3|max:199',
            'gender' => 'nullable|in:Male,Female,-',
            'place_of_birth' => 'nullable|min:3|max:199',
            'date_of_birth' => 'nullable|date_format:Y-m-d|before:' . now()->subYears(5)->endOfYear()->toDateString(),
            'address' => 'nullable|min:5|max:191',
        ]);

        $user = User::where('id', $this->userId)->first();
        $user->name = $this->fullname;
        $user->gender = $this->gender;
        $user->province_id = $this->province;
        $user->regency_id = $this->regency;
        $user->district_id = $this->district;
        $user->place_of_birth = $this->place_of_birth;
        $user->date_of_birth = $this->date_of_birth;
        $user->address = $this->address;
        $user->save();

        $this->dispatchBrowserEvent('init-editor');
        session()->flash('personal_data_sucess', 'Your personal data updated successfully.');
    }

    public function saveAdditionalInformation()
    {
        $this->validate([
            'bio' => 'nullable|min:10|max:1000',
        ]);

        $this->user->update([
            'bio' => $this->bio,
        ]);

        $this->dispatchBrowserEvent('init-editor');
        session()->flash('additional_information_sucess', 'Your information updated successfully.');
    }

    public function render()
    {
        return view('user::livewire.profile.child.information', [
            'provinces' => Province::get(['id', 'name']),
        ]);
    }
}