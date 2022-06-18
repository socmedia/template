<div wire:ignore>
    <input type="text" name="tagify" id="{{ $component_id }}" value="{{ $value }}" />

    {{-- Tagify --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tagify/4.12.0/tagify.min.js"
            integrity="sha512-uDMk0LmYVhMq6mKY7QfiJAXBchLmLiCZjh5hmZ6UUEJ/iNDk2s8maQDx4lOPCqLJqvhktN/g7oZTesQ6SOIjhw=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        function initTagify() {
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
        }

        initTagify()

        window.addEventListener('DOMContentLoaded', function() {
            initTagify()
        })
    </script>
</div>
