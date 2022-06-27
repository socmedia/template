<div wire:ignore wire:init="initFilepond">
    <input type="file" class="my-pond" name="image" id="{{ $component_id }}" />

    <script>
        function initFilepond() {
            $.fn.filepond.registerPlugin(FilePondPluginFilePoster);

            // First register any plugins
            $.fn.filepond.registerPlugin(FilePondPluginImagePreview);

            const inputElement = document.querySelector('#{{ $component_id }}');
            FilePond.create(inputElement);
            FilePond.setOptions({
                allowDrop: false,
                allowReplace: false,
                maxFileSize: '256KB',
                @if ($oldImages)
                    files: [{
                        // the server file reference
                        source: '12345',

                        // set type to local to indicate an already uploaded file
                        options: {
                            type: 'local',

                            // optional stub file information
                            file: {
                                name: '{{ $filename }}',
                                size: '',
                            },

                            // pass poster property
                            metadata: {
                                poster: '{{ url($oldImages) }}',
                            },
                        },
                    }, ],
                @endif
                server: {
                    process: (fieldName, file, metadata, load, error, progress, abort, transfer,
                        options) => {
                        const formData = new FormData();
                        const request = new XMLHttpRequest();

                        formData.append(fieldName, file, file.name);
                        formData.append('_token', '{{ csrf_token() }}');

                        request.open('POST', '{{ route('media.uploadImage') }}');
                        request.setRequestHeader("X-CSRF-TOKEN", '{{ csrf_token() }}');
                        request.upload.onprogress = (e) => {
                            progress(e.lengthComputable, e.loaded, e.total);
                        };
                        request.onload = function() {
                            if (request.status >= 200 && request.status < 300) {
                                const data = JSON.parse(request.responseText);
                                load(data.data.filepath);
                                @this.set('uploaded_image', data.data.filepath)
                            } else {
                                error('oh no');
                            }
                        };
                        request.send(formData);

                        return {
                            abort: () => {
                                request.abort();
                                abort();
                            },
                        };
                    },
                    revert: (uniqueFileId, load, error) => {
                        const formData = new FormData();
                        const request = new XMLHttpRequest();

                        formData.append('image', uniqueFileId);
                        formData.append('_token', '{{ csrf_token() }}');

                        request.open('POST', '{{ route('media.destroyImage') }}', true);
                        request.onload = function() {
                            if (request.status >= 200 && request.status < 300) {
                                const data = JSON.parse(request.responseText);
                                @this.set('uploaded_image', null)
                            }
                        };
                        request.send(formData);

                        error('oh my goodness');
                        load();
                    },

                },
            })
        }

        document.addEventListener("init_filepond", function(event) {
            initFilepond();
        });

        window.addEventListener('DOMContentLoaded', (event) => {
            $(document).ready(function() {
                if (document.querySelector('#{{ $component_id }}').length > 0) {
                    initFilepond()
                }
            })

        });
        // Livewire.hook('component.initialized', (component) => {
        //     console.log('initialized')
        // })

        document.addEventListener("reset_images", function(event) {
            let filePond = FilePond.find(document.getElementById('{{ $component_id }}')).removeFile()
            if (filePond != null) {
                //this will remove all files
                filePond.removeFiles();
            }
        });
    </script>
</div>
