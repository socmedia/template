<div>
    @if (!$posts->isEmpty())
    <h5 class="section-sub-title">Berita</h5>

    <div class="row">
        @foreach ($posts as $post)
        <div class="col-12 col-sm-6 col-lg-4 mb-4">
            <x-blog.mini :blog="$post" />
        </div>
        @endforeach
    </div>
    @endif
</div>
