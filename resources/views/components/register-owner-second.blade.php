<div class="row g-3 mb-5">
    <div class="col-12">
        <p class="text-muted">
            Berikan kami gambaran situasi seputar usaha yang kamu ajukan kepada kami.
        </p>
    </div>

    <div class="col-12">
        <label for="form.bussiness.image" class="d-inline-block">Gambar usaha kamu</label>
        <livewire:image-upload :images="$form['bussiness']['image']" />

        @error('form.bussiness.image')
        <small class="text-danger">{{$message}}</small>
        @enderror
    </div>

    <div class="col-12">
        <label for="form.bussiness.category" class="form-label">Kategori Usaha</label>
        <div class="dropdown">
            <button class="dropdown-toggle" type="button" id="category" data-bs-toggle="dropdown" aria-expanded="false">
                {{ $label['category'] ? $label['category'] : 'Kategori' }}
            </button>
            <ul class="dropdown-menu" aria-labelledby="category">
                @foreach ($categories as $category)
                <x-dropdown.item class="{{ $category->id == $form['bussiness']['category'] ? 'active' : ''}}"
                    wire:click="category('{{ $category->id }}')">{{ $category->name }}</x-dropdown.item>
                @endforeach
            </ul>
        </div>

        @error('form.bussiness.category')
        <small class="text-danger">{{$message}}</small>
        @enderror
    </div>

    @if ($form['bussiness']['category'] && !$subCategories->isEmpty())
    <div class="col-12">
        <label for="form.bussiness.subCategory" class="form-label">Sub Kategori</label>
        <div class="dropdown">
            <button class="dropdown-toggle" type="button" id="subCategory" data-bs-toggle="dropdown"
                aria-expanded="false">
                {{ $label['subCategory'] ? $label['subCategory'] : 'Sub Kategori' }}
            </button>
            <ul class="dropdown-menu" aria-labelledby="subCategory">
                @foreach ($subCategories as $subCategory)
                <x-dropdown.item class="{{ $subCategory->id == $form['bussiness']['subCategory'] ? 'active' : ''}}"
                    wire:click="subCategory('{{ $subCategory->id }}')">{{ $subCategory->name }}
                </x-dropdown.item>
                @endforeach
            </ul>
        </div>

        @error('form.bussiness.subCategory')
        <small class="text-danger">{{$message}}</small>
        @enderror
    </div>
    @endif

</div>
