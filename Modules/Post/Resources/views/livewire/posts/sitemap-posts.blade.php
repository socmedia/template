<div>
    <div class="row gy-4 mt-5">
        <div class="col-lg-4">
            <div class="widget rounded">
                <div class="widget-header text-center">
                    <h3 class="widget-title">Kanal</h3>
                    <img src="{{ asset('assets/front/images/wave.svg') }}" class="wave" alt="wave" />
                </div>
                <div class="widget-content">
                    <ul class="list">
                        @foreach ($categories as $category)
                            <li>
                                <a href="javascript:void(0)"
                                   class="{{ $kanal == $category->slug_name ? 'active' : null }}"
                                   wire:click="category('{{ $category->slug_name }}')">
                                    {{ $category->name }}
                                </a>

                                @if ($kanal == $category->slug_name)
                                    <ul class="list ms-4">
                                        @foreach ($category->subCategory as $subCategory)
                                            <li>
                                                <a href="javascript:void(0)"
                                                   class="{{ $sub_kanal == $subCategory->slug_name ? 'active' : null }}"
                                                   wire:click="subCategory('{{ $subCategory->slug_name }}')">
                                                    {{ $subCategory->name }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

        </div>
        <div class="col-lg-8">
            <div class="row">
                @forelse ($posts as $post)
                    <div class="col-sm-6 mb-3">
                        <x-post.grid :post="$post" />
                    </div>
                @empty
                    <div class="col-12">
                        <h2 class="text-center">Upsss....</h2>
                        <p class="text-center col-md-8 mx-auto">Sayang sekali, permintaan yang kamu cari tidak kami
                            temukan atau belum tersedia.</p>
                        <img src="{{ asset('images/not_found.svg') }}" alt="" loading="lazy">
                    </div>
                @endforelse
            </div>

            {{-- Load more --}}
            @if (!$posts->isEmpty())
                <div class="text-center mt-5">
                    @if ($posts->hasMorePages())
                        <button class="btn btn-simple" wire:click="loadMore">Muat lainnya
                            <div class="spinner-border spinner-border-sm ms-2" role="status" wire:loading
                                 wire:target="loadMore">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </button>
                    @endif
                </div>
            @endif
        </div>
    </div>
</div>
