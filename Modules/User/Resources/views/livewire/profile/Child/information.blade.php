<div class="row">
    <div class="col-md-10">

        @if (session()->has('personal_data_sucess'))
        <x-alert state="success" icon="check-circle" color="white" title="Success !">
            @slot('message')
            {{ session()->get('personal_data_sucess') }}
            @endslot
        </x-alert>
        @endif

        <x-form-card title="Personal Data">
            <form wire:submit.prevent="savePersonalData">

                <div class="form-group">
                    <label for="fullname">Fullname</label>
                    <input type="text" class="form-control" name="fullname" id="fullname" wire:model.defer="fullname">
                    @error('fullname')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="gender">Gender</label>
                    <div class="d-flex flex-column flex-sm-row">
                        <label class="me-0 me-sm-3">
                            <input type="radio" name="gender" id="gender" value="Male" wire:model.defer="gender">
                            Male
                        </label>
                        <label class="me-0 me-sm-3">
                            <input type="radio" name="gender" id="gender" value="Female" wire:model.defer="gender">
                            Female
                        </label>
                        <label class="">
                            <input type="radio" name="gender" id="gender" value="-" wire:model.defer="gender">
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
                            wire:model.defer="place_of_birth">
                        @error('place_of_birth')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="date_of_birth">Date Of Birth</label>
                        <input type="date" class="form-control" name="date_of_birth" id="date_of_birth"
                            wire:model.defer="date_of_birth">
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
                        <select name="regency" id="regency" class="form-control text-capitalize" wire:model="regency">
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
                    <textarea class="form-control" name="address" id="address" wire:model.defer="address"></textarea>
                    @error('address')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>

                <div class="text-end">
                    <x-button state="dark" loadingState="true" wireTarget="savePersonalData" text="Save changes" />
                </div>
            </form>
        </x-form-card>

        @if (session()->has('additional_information_sucess'))
        <x-alert state="success" icon="check-circle" color="white" title="Success !">
            @slot('message')
            {{ session()->get('additional_information_sucess') }}
            @endslot
        </x-alert>
        @endif

        <x-form-card title="Information">
            <form wire:submit.prevent="saveAdditionalInformation">
                <div class="form-group">
                    <label for="bio">Bio</label>
                    <div id="editor">{!! $bio !!}</div>
                    @error('bio')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>

                <div class="text-end">
                    <x-button state="dark" loadingState="true" wireTarget="saveAdditionalInformation"
                        text="Save changes" />
                </div>
            </form>
        </x-form-card>

    </div>
    <script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
    <script>
        const editor = async () => {
            ClassicEditor
                .create(document.querySelector('#editor'))
                .then(editor => {
                    editor.ui.focusTracker.on( 'change:isFocused', ( evt, name, isFocused ) => {
                        if ( !isFocused ) {
                            @this.set('bio', editor.getData());
                        }
                    });
                })
                .then(() => {
                    if($('.ck.ck-editor').length > 1){
                        $('.ck.ck-editor')[0].remove()
                    }
                })
                .catch(error => {
                    console.error(error);
                });
        }

        editor()

        $(document).ready(function() {
            document.addEventListener('init-editor', () => {
                editor()
            })
        })
    </script>
</div>
