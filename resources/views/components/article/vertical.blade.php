<article class="vertical {{ $archive == 'archive' ? 'archive' : '' }}">
    <figure>
        <x-dropdown icon="bx bx-dots-vertical-rounded">
            <x-dropdown.item href="{{ route('front.post.show', ['slug_title' => $post->slug_title]) }}" target="_blank">
                Lihat Postingan
            </x-dropdown.item>
            <x-dropdown.item href="{{ route('adm.post.edit', $post->id) }}">Edit Postingan</x-dropdown.item>
            <x-dropdown.item href="javascript:void(0)" wire:click="archive('{{ $post->id }}')">
                {{ $archive == 'archive' ? 'Pulihkan' : 'Arsipkan' }}
            </x-dropdown.item>
            <x-dropdown.item href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#remove-modal"
                wire:click="$set('destroyId','{{ $post->id }}')">Hapus Permanen</x-dropdown.item>
        </x-dropdown>

        <span class="badge bg-gradient-quepal text-white shadow-sm">
            {{$post->category ? $post->category->name : null }}
        </span>

        <img src="{{!$post->thumbnail ? cache('default_thumbnail_16_9') : $post->thumbnail }}" alt="{{$post->title}}">

    </figure>

    <figcaption>
        <div class="info top">
            <small class="with-icon"> <i class="bx bx-timer"></i> {{ $post->reading_time }}</small>
            <small>Author, <strong>{{ $post->writer ? $post->writer->name : null }}</strong></small>
        </div>

        <h5>{{$post->title}}</h5>
        <p>{{$post->subject}}</p>

        <div class="info bottom">
            <small class="with-icon me-2 text-success">
                <i class="bx bx-paper-plane"></i> {{ $post->number_of_views }}
            </small>
            <small class="with-icon me-2 text-primary">
                <i class="lni lni-eye"></i> {{ $post->number_of_shares }}
            </small>
            <small class="with-icon text-muted">
                <i class='bx bx-comment-dots'></i> {{ $post->comments_count }}
            </small>
        </div>
    </figcaption>

</article>
