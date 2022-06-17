<div wire:ignore>
    <input type="text" name="tagify" id="{{ $component_id }}" value="{{ $value }}" />

    <script>
        window.addEventListener('DOMContentLoaded', (event) => {
            console.log('DOM fully loaded and parsed');
            const input = document.querySelector('#{{ $component_id }}');
            const tagify = new Tagify(input, {
                callbacks: {
                    "add": (e) => {
                        let values = e.detail.tagify.value;
                        values = values.map(item => item.value).join(',');
                        @this.set('value', values)
                    },
                    "remove": (e) => {
                        let values = e.detail.tagify.value;
                        values = values.map(item => item.value).join(',');
                        @this.set('value', values)
                    },
                    "edit:updated": (e) => {
                        let values = e.detail.tagify.value;
                        values = values.map(item => item.value).join(',');
                        @this.set('value', values)
                    },
                }
            });

            document.addEventListener("reset_tagify", function(event) {
                tagify.removeAllTags()
            });
        });
    </script>
</div>
