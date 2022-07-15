<div>
    <div class="row gy-4 mt-5">
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

        <div class="col-lg-4">
            <x-front.widget-2>
                <div class="widget rounded" style="margin-bottom: 40px">
                    <div class="widget-header text-center">
                        <h3 class="widget-title">Filter</h3>
                        <img src="{{ asset('assets/front/images/wave.svg') }}" class="wave" alt="wave" />
                    </div>
                    <div class="widget-content">

                        @if ($withDate)
                            <div class="form-group mb-3">
                                <label for="dari">Dari Tanggal</label>
                                <input type="date" name="dari" id="dari" class="form-control rounded"
                                       wire:model.lazy="dari" max="{{ now()->subDays(1)->toDateString() }}">
                            </div>

                            <div class="form-group mb-3">
                                <label for="hingga">Hingga Tanggal</label>
                                <input type="date" name="hingga" id="hingga" class="form-control rounded"
                                       wire:model.lazy="hingga" max="{{ now()->toDateString() }}">
                            </div>
                        @endif

                        <div class="form-group mb-3">
                            <label for="kanal">Kanal</label>
                            <select class="form-control rounded" name="kanal" id="kanal"
                                    wire:model.lazy="kanal">
                                <option value="">Semua Kanal</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->slug_name }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        @if ($kanal)
                            <div class="form-group mb-3">
                                <label for="sub_kanal">Sub Kanal</label>
                                <select class="form-control rounded" name="sub_kanal" id="sub_kanal"
                                        wire:model.lazy="sub_kanal">
                                    <option value="">Semua Kanal</option>
                                    @foreach ($subCategories as $subCategory)
                                        <option value="{{ $subCategory->slug_name }}">{{ $subCategory->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        @endif

                        {{-- <div class="col-md-6">
                            <input type="text" class="form-control rounded" placeholder="Mau cari berita apa?"
                                   wire:model.lazy="keyword">
                        </div> --}}

                    </div>
                </div>
            </x-front.widget-2>
        </div>
    </div>
</div>
