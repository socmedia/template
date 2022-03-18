<div wire:ignore>
    <input id="{{ $trixId }}" type="hidden" name="content" value="{{ $value }}">
    <trix-editor input="{{ $trixId }}"></trix-editor>
    <script>
        var trixEditor = document.getElementById("{{ $trixId }}")
        var mimeTypes = ["image/png", "image/jpeg", "image/jpg"];

        addEventListener("trix-blur", function(event) {
            @this.set('value', trixEditor.getAttribute('value'))
        });

        addEventListener("trix-file-accept", function(event) {
            if (! mimeTypes.includes(event.file.type) ) {
                // file type not allowed, prevent default upload
                return event.preventDefault();
            }
        });

        addEventListener("trix-attachment-add", function(event){
            uploadTrixImage(event.attachment);
        });

        document.addEventListener("reset_trix", function(event){
            const input = document.querySelector(`${event.detail.input}`);
            const target = document.querySelector(`[input="${event.detail.target}"]`);

            input.value = null;
            target.innerHTML = "";
        });

        function uploadTrixImage(attachment){
            // upload with livewire
            @this.upload(
                'images',
                attachment.file,
                function (uploadedURL) {

                    // We need to create a custom event.
                    // This event will create a pause in thread execution until we get the Response URL from the Trix Component @completeUpload
                    const trixUploadCompletedEvent = `trix-upload-completed:${btoa(uploadedURL)}`;
                    const trixUploadCompletedListener = function(event) {
                        attachment.setAttributes(event.detail);
                        window.removeEventListener(trixUploadCompletedEvent, trixUploadCompletedListener);
                    }

                    window.addEventListener(trixUploadCompletedEvent, trixUploadCompletedListener);

                    // call the Trix Component @completeUpload below
                    @this.call('completeUpload', uploadedURL, trixUploadCompletedEvent);
                },
                function() {},
                function(event){
                    attachment.setUploadProgress(event.detail.progress);
                },
            )
            // complete the upload and get the actual file URL
        }
    </script>
</div>
