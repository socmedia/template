<div class="card h-100">
    <div class="card-body py-5 px-4">
        <div class="row">
            <div class="col-md-6">
                <form wire:submit.prevent="saveInformation">
                    <div class="form-group">
                        <label for="fullname">Fullname</label>
                        <input type="text" class="form-control" name="fullname" id="fullname" wire:model="fullname">
                        @error('fullname')
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

                        <div class="col-md-6 mb-3 mb-md-0">
                            <label for="date_of_birth">Date Of Birth</label>
                            <input type="date" class="form-control" name="date_of_birth" id="date_of_birth"
                                wire:model="date_of_birth">
                            @error('date_of_birth')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phone">Phone</label>
                        <div class="input-group">
                            <div class="input-group-text">
                                +62
                            </div>
                            <input type="text" class="form-control" name="phone" id="phone" wire:model="phone">
                        </div>
                        @error('phone')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <div class="input-group">
                            <label>
                                <input type="radio" name="gender" id="gender" value="Male" wire:model="gender">
                                Male
                            </label>
                        </div>
                        <div class="input-group">
                            <label>
                                <input type="radio" name="gender" id="gender" value="Female" wire:model="gender">
                                Female
                            </label>
                        </div>
                        <div class="input-group">
                            <label>
                                <input type="radio" name="gender" id="gender" value="-" wire:model="gender">
                                Rather not say
                            </label>
                        </div>

                        @error('gender')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="bio">Bio</label>
                        <textarea class="form-control" name="bio" id="bio" wire:model="bio"></textarea>
                        @error('bio')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
