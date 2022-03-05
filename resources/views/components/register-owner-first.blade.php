<div class="row g-3 mb-5">

    {{-- Description --}}
    <div class="col-12">
        <p class="text-muted">
            Coba jelaskan bagaimana usaha yang kamu miliki sekarang.
        </p>
    </div>

    {{-- Name --}}
    <div class="col-12">
        <label for="form.bussiness.name" class="form-label">Nama usaha</label>
        <input type="text" class="form-control" id="form.bussiness.name" placeholder="Nama usaha kamu"
            name="form.bussiness.name" wire:model.lazy="form.bussiness.name">

        @error('form.bussiness.name')
        <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    {{-- Description --}}
    <div class="col-12">
        <label for="form.bussiness.description" class="form-label">Gambaran usaha</label>
        <textarea type="text" class="form-control" id="form.bussiness.description" style="height: 150px"
            placeholder="Jelaskan bagaimana usahamu saat ini..." name="form.bussiness.description"
            wire:model.lazy="form.bussiness.description"></textarea>

        @error('form.bussiness.description')
        <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

</div>
