<div class="file-upload">

    @if (!$oldImages)
    @if (!$images)

    @if (is_array($images))

    {{-- Check if not empty --}}
    @if (count($images) == 0)
    <div class="file-upload-input" style="height: {{ $height }}">
        <div class="text d-flex flex-column text-center">
            <label for="">Pilih file disini</label>
            <small class="text-muted" wire:loading.class="d-none" wire:target="images">
                <em> {{ $rulesText ?: 'Format: jpg,jpeg,png. Maks: 256kb.'}} </em>
            </small>
            <small class="text-muted" wire:loading wire:target="images">
                <em>Mengupload gambar...</em>
            </small>
        </div>
        <input type="file" name="images" id="images" wire:model="images" accept="image/*" {{ !$multiple ?: 'multiple'
            }}>
    </div>
    @endif
    {{-- End check if not empty --}}

    @else
    <div class="file-upload-input" style="height: {{ $height }}">
        <div class=" text d-flex flex-column text-center">
            <label for="">Pilih file disini</label>
            <small class="text-muted" wire:loading.class="d-none" wire:target="images">
                <em> {{ $rulesText ?: 'Format: jpg,jpeg,png. Maks: 256kb.'}} </em>
            </small>
            <small class="text-muted" wire:loading wire:target="images">
                <em>Mengupload gambar...</em>
            </small>
        </div>
        <input type="file" name="images" id="images" wire:model="images" accept="image/*" {{ !$multiple ?: 'multiple'
            }}>
    </div>
    @endif
    @endif

    @endif

    @if (!$oldImages)

    @if ($images)
    <div class="file-upload-container">

        @if ($multiple)

        @foreach ($images->temporaryUrl() as $i => $image)
        <div class="file-upload-img" style="height: {{ $height }}">
            <img src="{{ $image }}" alt="" />
            <button type="button" class="remove" wire:click="removeImage(true, {{$i}})"><i class="bx bx-x"></i></button>
        </div>

        @error('images.'. $i)
        <small class="text-danger">{{ $message }}</small>
        @enderror

        @endforeach
        @else

        @if ($images->temporaryUrl())
        <div class="file-upload-img" style="height: {{ $height }}">
            <img src="{{ $images->temporaryUrl() }}" alt="" />
            <button type="button" class="remove" wire:click="removeImage"><i class="bx bx-x"></i></button>
        </div>

        @error('images')
        <small class="text-danger">{{ $message }}</small>
        @enderror
        @endif

        @endif


    </div>
    @endif

    @else
    <div class="file-upload-img" style="height: {{ $height }}">
        <img src="{{ $oldImages }}" alt="" />
        <button type="button" class="remove" wire:click="removeImage"><i class="bx bx-x"></i></button>
    </div>
    @endif

    <script>
        document.addEventListener('reset_image', function () {
            const container = document.querySelector('.file-upload-img');
            container.innerHTML = ''
        })
    </script>
</div>
