<div>
    @if ($mode == 'horizontal')
        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
            <div class="col">
                <a href="{{ route('adm.post.index') }}" class="text-dark">
                    <div class="card radius-10 overflow-hidden">
                        <div class="card-body">
                            <div class="text-primary ms-auto font-30"><i class="bx bx-news"></i></div>
                            <p class="mb-0 text-secondary font-14 mb-2"><strong>Total</strong> <br> Post</p>
                            <div class="d-flex align-items-end">
                                <h5 class="my-0">{{ $total_posts }}</h5><small class="ms-1">Buah</small>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col">
                <a class="text-dark" href="{{ route('adm.master.category.index') }}">
                    <div class="card radius-10 overflow-hidden">
                        <div class="card-body">
                            <div class="text-danger ms-auto font-30"><i class="bx bx-category"></i></div>
                            <p class="mb-0 text-secondary font-14 mb-2"><strong>Total</strong> <br> Kategori</p>
                            <div class="d-flex align-items-end">
                                <h5 class="my-0">{{ $total_categories }}</h5><small class="ms-1">Buah</small>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col">
                <a class="text-dark" href="{{ route('adm.lead.index') }}">
                    <div class="card radius-10 overflow-hidden">
                        <div class="card-body">
                            <div class="text-info ms-auto font-30"><i class='bx bx-check-double'></i></div>
                            <p class="mb-0 text-secondary font-14 mb-2"><strong>Total</strong> <br> Pertanyaan Publik
                            </p>
                            <div class="d-flex align-items-end">
                                <h5 class="my-0">{{ $total_leads }}</h5><small class="ms-1">Buah</small>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col">
                <a class="text-dark" href="{{ route('adm.lead.index') }}">
                    <div class="card radius-10 overflow-hidden">
                        <div class="card-body">
                            <div class="text-secondary ms-auto font-30"><i class="bx bx-check-square"></i></div>
                            <p class="mb-0 text-secondary font-14 mb-2"><strong>Total</strong> <br> Pertanyaan Publik
                                Belum
                                Dibaca</p>
                            <div class="d-flex align-items-end">
                                <h5 class="my-0">{{ $total_unseen_leads }}</h5><small class="ms-1">Buah</small>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    @elseif ($mode == 'vertical')
        <div class="row">
            <div class="col-12">
                <a href="{{ route('adm.post.index') }}" class="text-dark">
                    <div class="card radius-10 overflow-hidden">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="text-primary me-2 font-30"><i class="bx bx-news"></i></div>
                                <p class="mb-0 text-secondary font-14"><strong>Total</strong> Post</p>
                            </div>
                            <div class="d-flex align-items-end">
                                <h5 class="my-0">{{ $total_posts }}</h5><small class="ms-1">Buah</small>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-12">
                <a class="text-dark" href="{{ route('adm.master.category.index') }}">
                    <div class="card radius-10 overflow-hidden">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="text-danger me-2 font-30"><i class="bx bx-category"></i></div>
                                <p class="mb-0 text-secondary font-14"><strong>Total</strong> Kategori</p>
                            </div>
                            <div class="d-flex align-items-end">
                                <h5 class="my-0">{{ $total_categories }}</h5><small class="ms-1">Buah</small>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-12">
                <a class="text-dark" href="{{ route('adm.lead.index') }}">
                    <div class="card radius-10 overflow-hidden">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="text-info me-2 font-30"><i class='bx bx-check-double'></i></div>
                                <p class="mb-0 text-secondary font-14"><strong>Total</strong> Pertanyaan Publik
                                </p>
                            </div>
                            <div class="d-flex align-items-end">
                                <h5 class="my-0">{{ $total_leads }}</h5><small class="ms-1">Buah</small>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-12">
                <a class="text-dark" href="{{ route('adm.lead.index') }}">
                    <div class="card radius-10 overflow-hidden">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="text-secondary me-2 font-30"><i class="bx bx-check-square"></i></div>
                                <p class="mb-0 text-secondary font-14"><strong>Total</strong> Pertanyaan Publik
                                    Belum Dibaca</p>
                            </div>
                            <div class="d-flex align-items-end">
                                <h5 class="my-0">{{ $total_unseen_leads }}</h5><small class="ms-1">Buah</small>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    @endif
</div>
