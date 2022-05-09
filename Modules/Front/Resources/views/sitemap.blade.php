<?= '<?xml version="1.0" encoding="UTF-8"?>' ?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    {{-- <url>
        <loc>{{ route('front.index') }}</loc>
        <lastmod>{{ now()->tz('utc')->toatomstring() }}</lastmod>
        <priority>1.00</priority>
    </url>
    <url>
        <loc>{{ route('front.about') }}</loc>
        <lastmod>{{ now()->tz('utc')->toatomstring() }}</lastmod>
        <priority>0.80</priority>
    </url>
    <url>
        <loc>{{ route('front.contact') }}</loc>
        <lastmod>{{ now()->tz('utc')->toatomstring() }}</lastmod>
        <priority>0.80</priority>
    </url> --}}

    @foreach ($posts as $i => $post)
        @foreach ($post as $item)
            <url>
                <loc>{{ url('/') }}/{{ $i }}/{{ $item->slug_title }}</loc>
                <lastmod>{{ $item->updated_at->tz('UTC')->toAtomString() }}</lastmod>
                <changefreq>weekly</changefreq>
                <priority>0.8</priority>
            </url>
        @endforeach
    @endforeach
</urlset>
