<div>
    @if (session()->has('success'))
        <x-alert state="primary" color="white" title="Sukses !" :message="session('success')" />
    @endif

    <x-form-card title="Tambah Role">
        <form wire:submit.prevent="store">
            <div class="form-group row">
                <div class="col-md-8 mb-3 mb-md-0">
                    <label for="name">Nama Role</label>
                    <input type="text" class="form-control" name="name" id="name" wire:model.defer="name">
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="">Guard</label>
                    <div class="form-control bg-light">{{ $guard }}</div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-8 align-self-center">
                        <label for="">Permission</label>
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" placeholder="Cari group permission..."
                               data-action="findPermission">
                    </div>
                </div>
                <div class="accordion" id="permission" wire:ignore>
                    @foreach ($groups as $index => $group)
                        <div class="accordion-item">
                            <div class="accordion-header d-flex align-items-center border-bottom"
                                 id="{{ $index }}">
                                <div class="form-check d-inline-flex margin-auto align-items-center">
                                    <input class="form-check-input m-0 parent-checkbox" type="checkbox"
                                           data-target="perm-{{ $index }}"
                                           wire:model.lazy="groups.{{ $index }}">
                                </div>
                                <button class="text-capitalize accordion-button border-0 bg-transparent shadow-none {{ $loop->first ? null : 'collapsed' }}"
                                        type="button" data-bs-toggle="collapse"
                                        data-bs-target="#perm-{{ $index }}" aria-expanded="true"
                                        aria-controls="perm-{{ $index }}">
                                    {{ $index }}
                                </button>
                            </div>
                            <div id="perm-{{ $index }}"
                                 class="accordion-collapse border-0 {{ $loop->first ? 'collapse show' : 'collapse' }}"
                                 aria-labelledby="{{ $index }}" data-bs-parent="#permission">
                                <div class="accordion-body">
                                    @foreach ($permissions[$index] as $permissionIndex => $permission)
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input child-checkbox" type="checkbox"
                                                   id="{{ $permissionIndex }}"
                                                   data-target="child-{{ $index }}"
                                                   wire:model.defer="permissions.{{ $index }}.{{ $permissionIndex }}">
                                            <label class="form-check-label text-capitalize"
                                                   for="{{ $permissionIndex }}">
                                                {{ $permissionIndex }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>

            <div class="text-end">
                <x-button state="dark" loadingState="true" wireTarget="store" text="Simpan" />
            </div>
        </form>
    </x-form-card>
</div>

@push('script')
    <script>
        $('.parent-checkbox').change(function() {
            const $this = $(this);
            const target = $this.data('target');
            const siblings = $(`#${target}`).find('.child-checkbox');
            let data = [];

            siblings.each(function(i, e) {
                data.push($(e).attr('wire:model.defer'))
            })
        })

        $('.child-checkbox').change(function() {
            const $this = $(this);
            const siblings = $this.parents('.accordion-body').find('[data-target]');
            const target = siblings.data('target');

            if ($(`[data-target="${target}"]:checked`).length == siblings.length) {
                $this.parents('.accordion-item').find('.parent-checkbox').prop('checked', true)
                $this.parents('.accordion-item').find('.parent-checkbox').val(true)
            } else {
                $this.parents('.accordion-item').find('.parent-checkbox').prop('checked', false)
                $this.parents('.accordion-item').find('.parent-checkbox').val(false)
            }
        })

        $('[data-action="findPermission"]').keyup(function() {
            // Locate the card elements
            let accordions = document.querySelectorAll('.accordion-item')
            // Locate the search input
            let search_query = $(this).val();
            // Loop through the accordions
            for (var i = 0; i < accordions.length; i++) {
                // If the text is within the card...
                if (accordions[i].innerText.toLowerCase().includes(search_query.toLowerCase())) {
                    // ...remove the `.is-hidden` class.
                    accordions[i].classList.remove("d-none");
                } else {
                    // Otherwise, add the class.
                    accordions[i].classList.add("d-none");
                }
            }
        })
    </script>
@endpush
