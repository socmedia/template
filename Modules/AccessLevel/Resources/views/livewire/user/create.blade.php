<div>
    @if (session()->has('success'))
    <x-alert state="primary" color="white" title="Sukses !" :message="session('success')" />
    @endif

    <x-form-card title="Tambah User">
        <form wire:submit.prevent="store">

            <div class="form-group">
                <label for="name">Nama Lengkap</label>
                <input type="text" class="form-control" name="name" id="name" wire:model.defer="name">
                @error('name')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>

            <div class="form-group row">
                <div class="col-md-6 mb-3 mb-md-0">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email" id="email" wire:model.defer="email">
                    @error('email')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="role">Role</label>
                    <select name="role" id="role" wire:model.defer="role" class="form-select">
                        <option value="">-- Pilih role --</option>
                        @foreach ($roles as $role)
                        <option value="{{$role->name}}">{{$role->name}}</option>
                        @endforeach
                    </select>
                    @error('role')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-6 mb-3 mb-md-0">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password"
                        wire:model.defer="password">
                    @error('password')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="password_confirmation">Konfirmasi Password</label>
                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation"
                        wire:model.defer="password_confirmation">
                    @error('password_confirmation')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>

            <div class="text-end">
                <x-button state="dark" loadingState="true" wireTarget="store" text="Save changes" />
            </div>
        </form>
    </x-form-card>
</div>
