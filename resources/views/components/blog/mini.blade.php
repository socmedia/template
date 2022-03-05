<article class="blog-content">
    <figure class="blog-image"
        style="background-image: url({{!$blog->thumbnail ? asset('assets/default/images/image_not_found.png') : $blog->thumbnail->media_path}})">
    </figure>
    <div class="blog-footer">
        <div class="row">
            <div class="col-12">
                <div class="d-flex flex-wrap">
                    <div class="blog-info mb-1">
                        <span>
                            <i class="bi bi-calendar-date-fill me-1"></i>
                            {{ dateTimeTranslated($blog->created_at, 'd M Y') }}
                        </span>
                        <span><i class="bi bi-clock-fill me-1"></i>{{ $blog->reading_time }}</span>
                    </div>
                    <span class="blog-writer ms-auto">
                        Oleh, <a> {{ !$blog->writer ?: $blog->writer->name }}</a>
                    </span>
                </div>
            </div>

            <div class="col-12">
                <h4 class="blog-title">
                    <a class="text-muted" href="{{ route('public.post.detail', $blog->slug_title)}}">
                        {{ $blog->title }}
                    </a>
                </h4>
            </div>

            <div class="col-12">
                <div class="blog-button">
                    <span>
                        <i class="text-purple icon-icon_message"></i>
                        {{ numberShortner($blog->comments_count) }}
                    </span>
                    <span>
                        <i class="text-danger icon-icon_eye"></i>
                        {{ numberShortner($blog->number_of_views) }}
                    </span>
                    <span>
                        <i class="text-success icon-icon_share"></i>
                        {{ numberShortner($blog->number_of_shares) }}
                    </span>
                </div>
            </div>
        </div>
    </div>
</article>
