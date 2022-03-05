<div>
    @if (session()->has('success'))
    <x-alert state="primary" color="white" title="Sukses !" :message="session('success')" />
    @endif

    @if (session()->has('failed'))
    <x-alert state="warning" color="white" title="Upsss..." :message="session('failed')" />
    @endif

    <x-form-card title="Daftar Postingan">
        <x-filter :filters="$filters" class="">

            <div class="col-md-8 mb-3">
                <div class="d-flex flex-wrap">

                    <x-dropdown additionalClass="btn btn-light btn-sm me-1 mb-1" icon="bx bx-chevron-down">
                        <x-slot name="text">
                            Jenis Post
                        </x-slot>

                        @foreach ($types as $type)
                        <x-dropdown.item href="javascript:void(0)" wire:click="filterType('{{ $type->slug_name }}')">
                            {{ $type->name }}
                        </x-dropdown.item>
                        @endforeach
                    </x-dropdown>

                    <x-dropdown additionalClass="btn btn-light btn-sm me-1 mb-1" icon="bx bx-chevron-down">
                        <x-slot name="text">
                            Kategori
                        </x-slot>

                        @foreach ($categories as $category)
                        <x-dropdown.item href="javascript:void(0)"
                            wire:click="filterCategory('{{ $category->slug_name }}')">
                            {{ $category->name }}
                        </x-dropdown.item>
                        @endforeach
                    </x-dropdown>

                    <x-dropdown additionalClass="btn btn-light btn-sm me-2" icon="bx bx-chevron-down">
                        <x-slot name="text">
                            Status Post
                        </x-slot>

                        @foreach ($statuses as $status)
                        <x-dropdown.item href="javascript:void(0)"
                            wire:click="filterStatus('{{ $status->slug_name }}')">
                            {{ $status->name }}
                        </x-dropdown.item>
                        @endforeach
                    </x-dropdown>

                    <x-dropdown additionalClass="btn btn-light btn-sm me-2" icon="bx bx-chevron-down">
                        <x-slot name="text">
                            Urut Berdasarkan
                        </x-slot>

                        @foreach ($sorts as $sort)
                        <x-dropdown.item href="javascript:void(0)" wire:click="sort('{{ $sort['column'] }}')">
                            {{ $sort['label'] }}
                        </x-dropdown.item>
                        @endforeach
                    </x-dropdown>

                    <x-dropdown additionalClass="btn btn-light btn-sm me-2" icon="bx bx-chevron-down">
                        <x-slot name="text">
                            Urutan
                        </x-slot>

                        <x-dropdown.item href="javascript:void(0)" wire:click="order('asc')">
                            Asc
                        </x-dropdown.item>
                        <x-dropdown.item href="javascript:void(0)" wire:click="order('desc')">
                            Desc
                        </x-dropdown.item>
                    </x-dropdown>

                </div>
            </div>
            <div class="col-md-4 mb-3">
                <input type="text" class="form-control form-control-sm" wire:model.debounce.250ms="search"
                    placeholder="Cari postingan disini...">
            </div>
        </x-filter>

        <div class="row">
            @forelse ($posts as $post)
            <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                <x-article.vertical :post="$post" archive="{{ strtolower($post->status->name) }}" />
            </div>
            @empty
            <div class="col-12 pt-5 pb-3">
                <p class="text-center">Postingan yang anda cari tidak kami temukan.</p>
            </div>
            @endforelse
        </div>

        <x-remove.modal />

        <x-pagination :table="$posts" />
    </x-form-card>
</div>
