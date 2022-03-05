<div class="row g-3 mb-5">

    {{-- Description --}}
    @if (!$register)

    <div class="col-12">
        <p class="text-muted mb-4">
            Jika kamu belum memiliki akun kamu bisa membuat akun terlebih dahulu disini <a href="javascript:void(0)"
                wire:click="$set('register', true)">Daftar Akun</a>.
        </p>
    </div>

    {{-- Name --}}
    <div class="col-12">
        <label for="form.user.name" class="form-label">Nama Lengkap</label>
        <input type="text" class="form-control" id="form.user.name" placeholder="Masukkan nama lengkap kamu"
            name="form.user.name" wire:model.lazy="form.user.name">

        @error('form.user.name')
        <small class="text-danger">{{$message}}</small>
        @enderror
    </div>

    {{-- Email --}}
    <div class="col-12">
        <label for="form.user.email" class="form-label">Email kamu yang terdaftar</label>
        <input type="text" class="form-control" id="form.user.email" placeholder="Masukkan email kamu"
            name="form.user.email" wire:model.lazy="form.user.email">

        @error('form.user.email')
        <small class="text-danger">{{$message}}</small>
        @enderror
    </div>

    @else

    <div class="col-12">
        <p class="text-muted mb-4">
            Sudah punya akun yang terdaftar disini sebelumnya? Verifikasi disini <a href="javascript:void(0)"
                wire:click="$set('register', false)">Verifikasi Akun</a>.
        </p>
    </div>

    {{-- Name --}}
    <div class="col-12">
        <label for="form.user.email" class="form-label">Email</label>
        <input type="text" class="form-control" id="form.user.email" placeholder="Masukkan email kamu"
            name="form.user.email" wire:model.lazy="form.user.email">

        @error('form.user.email')
        <small class="text-danger">{{$message}}</small>
        @enderror
    </div>

    {{-- Password --}}
    <div class="col-12">
        <label for="form.user.password" class="form-label">Kata sandi</label>

        <div class="input-group">
            <input type="password" class="form-control border-end-0" id="form.user.password"
                wire:model.lazy="form.user.password" name="form.user.password" placeholder="Masukkan kata sandi">
            <div class="input-group-prepend">
                <button class="btn btn-search show-password" type="button">
                    <i class='bx bx-hide fs-6'></i>
                </button>
            </div>
        </div>

        @error('form.user.password')
        <small class="text-danger">{{$message}}</small>
        @enderror
    </div>

    {{-- Password Confirmation --}}
    <div class="col-12">
        <label for="form.user.password_confirmation" class="form-label">Ulangi kata sandi</label>

        <div class="input-group">
            <input type="password" class="form-control border-end-0" id="form.user.password_confirmation"
                wire:model.lazy="form.user.password_confirmation" name="form.user.password_confirmation"
                placeholder="Ulangi kata sandi">

            <div class="input-group-prepend">
                <button class="btn btn-search show-password" type="button">
                    <i class='bx bx-hide fs-6'></i>
                </button>
            </div>
        </div>
    </div>

    @endif
</div>
