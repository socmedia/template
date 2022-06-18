<div wire:ignore>
    <textarea id="{{ $component_id }}" class="form-control" name="description" autocomplete="description"></textarea>

    <script>
        window.addEventListener('DOMContentLoaded', function() {
            const editor = $('#{{ $component_id }}').summernote({
                height: 500,
                callbacks: {
                    onImageUpload: function(files) {
                        // upload image to server and create imgNode...
                        const url = '{{ url('/') }}';
                        uploadImage(files[0])
                            .then(res => res.json())
                            .then(res => {
                                const range = $.summernote.range;
                                const rng = range.create();
                                rng.pasteHTML(
                                    `<p></p></br><img src="{{ url('/') }}${res.data.filepath}" width="100%" /></br><p>caption</p>`
                                )
                            })
                    },
                    onMediaDelete: function(files) {
                        removeImage('{{ url('/') }}' + files[0].src)
                    },
                    onBlur: function() {
                        const val = $('#{{ $component_id }}').summernote('code');
                        @this.set('value', val)
                    }
                }
            });

            async function uploadImage(file) {
                const url = '{{ route('media.uploadImage') }}';
                var data = new FormData()
                data.append('_token', '{{ csrf_token() }}')
                data.append('image', file)
                return await fetch(url, {
                    method: 'POST',
                    body: data
                });
            }

            async function removeImage(file) {
                const url = '{{ route('media.destroyImage') }}';
                var data = new FormData()
                data.append('_token', '{{ csrf_token() }}')
                data.append('image', file)
                return await fetch(url, {
                    method: 'POST',
                    body: data
                });
            }

            document.addEventListener('reset_editor', function() {
                $('#{{ $component_id }}').summernote('reset');
            })
        })
    </script>
</div>
