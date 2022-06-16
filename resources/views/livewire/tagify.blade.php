<div wire:ignore>
    <input type="text" name="tagify" id="{{ $component_id }}" />

    <script>
        const input = document.querySelector('#{{ $component_id }}');
        const tagify = new Tagify(input, {
            callbacks: {
                "blur": (e) => {
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
    </script>
</div>
