<div>
    @if (session()->has('success'))
    <x-alert state="primary" color="white" title="Sukses !" :message="session('success')" />
    @endif

    <hr>
    <form wire:submit.prevent="update">
        <div class="row">
            <div class="col-md-3 mb-3 mb-md-0">
                <ul class="list-group sidebar">
                    <li class="list-group-item d-flex">
                        <i class="bx bx-user-circle font-18 align-middle me-2"></i>
                        <div>
                            <p>Data User</p>
                            <small>Isikan data pribadi user, dan tidak perlu di isi jika memang tidak dibutuhkan
                                sistem.</small>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body p-4">

                        <div class="form-group">
                            <div class="avatar lg mb-3 d-flex">
                                @if ($avatar)
                                <img src="{{ $avatar->temporaryUrl() }}">
                                @else
                                <img src="{{ user('avatar_url') }}">
                                @endif
                                <div class="avatar-button">
                                    <label for="avatar-upload" class="d-inline-block">Perbarui</label>
                                    <input type="file" class="d-flex" style="opacity: 0; height: 0; width: 0"
                                        wire:model="avatar" id="avatar-upload">
                                </div>
                            </div>

                            <div wire:loading wire:target="avatar">
                                Sedang mengupload...
                            </div>

                            @error('avatar')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="personal.name">Nama lengkap</label>
                            <input type="text" class="form-control" name="personal.name" id="personal.name"
                                wire:model.lazy="personal.name">
                            @error('personal.name')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="personal.gender">Jenis Kelamin</label>
                            <div class="d-flex flex-column flex-sm-row">
                                <label class="me-0 me-sm-3">
                                    <input type="radio" name="personal.gender" id="personal.gender" value="Male"
                                        wire:model.lazy="personal.gender">
                                    Pria
                                </label>
                                <label class="me-0 me-sm-3">
                                    <input type="radio" name="personal.gender" id="personal.gender" value="Female"
                                        wire:model.lazy="personal.gender">
                                    Wanita
                                </label>
                                <label class="">
                                    <input type="radio" name="personal.gender" id="personal.gender" value="-"
                                        wire:model.lazy="personal.gender">
                                    Lebih baik tidak mengatakan
                                </label>
                            </div>
                            @error('personal.gender')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 mb-3 mb-md-0">
                                <label for="personal.place_of_birth">Tempat Lahir</label>
                                <input type="text" class="form-control" name="personal.place_of_birth"
                                    id="personal.place_of_birth" wire:model.lazy="personal.place_of_birth">
                                @error('personal.place_of_birth')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="personal.date_of_birth">Tanggal Lahir</label>
                                <input type="date" class="form-control" name="personal.date_of_birth"
                                    id="personal.date_of_birth" wire:model.lazy="personal.date_of_birth">
                                @error('personal.date_of_birth')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                        </div>

                        <div class="form-group">
                            <label for="personal.address">Alamat lengkap</label>
                            <textarea class="form-control" name="personal.address" id="personal.address"
                                wire:model.lazy="personal.address"></textarea>
                            @error('personal.address')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3 mb-3 mb-md-0">
                <ul class="list-group sidebar">
                    <li class="list-group-item d-flex">
                        <i class="bx bx-envelope font-18 align-middle me-2"></i>
                        <div>
                            <p>Akun</p>
                            <small>Akun yang akan digunakan user untuk login, dan kontak dari pemegang akun.</small>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body p-4">
                        <div class="form-group row">
                            <div class="col-md-7 mb-3 mb-md-0">
                                <label for="account.email">Email</label>
                                <input type="text" class="form-control" name="account.email" id="account.email"
                                    wire:model.defer="account.email">

                                @error('account.email')
                                <small class="text-danger">{{ $message }}</small>
                                @else

                                @if ($account['email'] == $user->dealer_code . '@satelithondajateng.com')
                                <small class="text-muted">
                                    <em>Masukkan email aktif untuk mengaktifkan fitur lupa password.</em>
                                </small>
                                @endif

                                @enderror
                            </div>
                            <div class="col-md-5">
                                <label for="account.phone">Phone</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">+62</span>
                                    </div>
                                    <input type="text" class="form-control" name="account.phone" id="account.phone"
                                        wire:model.defer="account.phone">
                                </div>
                                @error('account.phone')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3 mb-3 mb-md-0">
                <ul class="list-group sidebar">
                    <li class="list-group-item d-flex">
                        <i class="bx bx-lock-alt font-18 align-middle me-2"></i>
                        <div>
                            <p>Keamanan</p>
                            <small>Pengaturan kata sandi yang akan digunakan untuk otentikasi user ketika login ke
                                sistem.</small>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body p-4">
                        <div class="form-group row">
                            <div class="col-md-6 mb-3 mb-md-0">
                                <label for="security.password">Password</label>
                                <input type="password" class="form-control" name="security.password"
                                    id="security.password" wire:model.lazy="security.password">

                                @error('security.password')
                                <small class="text-danger">{{ $message }}</small>
                                @else

                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="security.password_confirmation">Konfirmasi Password</label>
                                <input type="password" class="form-control" name="security.password_confirmation"
                                    id="security.password_confirmation"
                                    wire:model.lazy="security.password_confirmation">

                                @error('security.password_confirmation')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-end">
                    <x-button state="dark" loadingState="true" wireTarget="update" text="Simpan" />
                </div>
            </div>
        </div>
    </form>
</div>
