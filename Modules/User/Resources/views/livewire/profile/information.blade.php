<div class="row">
    <div class="col-md-10">

        <h6 class="text-uppercase text-secondary">Personal Data</h6>
        <hr>
        <div class="card">
            <div class="card-body p-4">
                <form wire:submit.prevent="saveInformation">

                    <div class="form-group">
                        <label for="fullname">Fullname</label>
                        <input type="text" class="form-control" name="fullname" id="fullname" wire:model="fullname">
                        @error('fullname')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <div class="d-flex">
                            <label class="me-3">
                                <input type="radio" name="gender" id="gender" value="Male" wire:model="gender">
                                Male
                            </label>
                            <label class="me-3">
                                <input type="radio" name="gender" id="gender" value="Female" wire:model="gender">
                                Female
                            </label>
                            <label class="me-3">
                                <input type="radio" name="gender" id="gender" value="-" wire:model="gender">
                                Rather not say
                            </label>
                        </div>
                        @error('gender')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <label for="place_of_birth">Place Of Birth</label>
                            <input type="text" class="form-control" name="place_of_birth" id="place_of_birth"
                                wire:model="place_of_birth">
                            @error('place_of_birth')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="date_of_birth">Date Of Birth</label>
                            <input type="date" class="form-control" name="date_of_birth" id="date_of_birth"
                                wire:model="date_of_birth">
                            @error('date_of_birth')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                    </div>

                    <div class="form-group row">
                        <div class="col-md-4 mb-3 mb-md-0">
                            <label for="province">Province</label>
                            <select name="province" id="province" class="form-control text-capitalize"
                                wire:model="province">
                                <option value="">Choose Province</option>
                                @foreach ($provinces as $province)
                                <option class="text-capitalize" value="{{$province->id}}">{{$province->name}}
                                </option>
                                @endforeach
                            </select>
                            @error('province')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="col-md-4 mb-3 mb-md-0">
                            <label for="regency">Regency</label>
                            <select name="regency" id="regency" class="form-control text-capitalize"
                                wire:model="regency">
                                <option value="">Choose regency</option>
                                @foreach ($regencies as $regency)
                                <option class="text-capitalize" value="{{$regency->id}}">{{$regency->name}}</option>
                                @endforeach
                            </select>
                            @error('regency')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="col-md-4 mb-3 mb-md-0">
                            <label for="district">District</label>
                            <select name="district" id="district" class="form-control text-capitalize"
                                wire:model="district">
                                <option value="">Choose district</option>
                                @foreach ($districts as $district)
                                <option class="text-capitalize" value="{{$district->id}}">{{$district->name}}
                                </option>
                                @endforeach
                            </select>
                            @error('district')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea class="form-control" name="address" id="address" wire:model="address"></textarea>
                        @error('address')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="text-end">
                        <button class="btn btn-dark">Save changes</button>
                    </div>
                </form>
            </div>

        </div>

        <h6 class="text-uppercase text-secondary">Information</h6>
        <hr>
        <div class="card">
            <div class="card-body p-4">
                <form wire:submit.prevent="saveAdditionalInformation">
                    <div class="form-group">
                        <label for="bio">Bio</label>
                        <textarea class="form-control" name="bio" id="bio" wire:model="bio"></textarea>
                        @error('bio')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="text-end">
                        <button class="btn btn-dark">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
