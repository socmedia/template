<div wire:ignore>
    <input type="text" name="tagify_list" id="{{ $component_id }}" value="{{ $value }}"
        placeholder="Masukkan Tag" />

    {{-- Tagify --}}
    <script src="{{ asset('vendor/tagify/tagify.min.js') }}"></script>
    <script>
        var input = document.querySelector('#{{ $component_id }}'),
            tagify = new Tagify(input, {
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
                },
                whitelist: @json($tagsList),
                dropdown: {
                    position: "manual",
                    maxItems: Infinity,
                    enabled: 0,
                    classname: "customSuggestionsList"
                },
                enforceWhitelist: true
            });

        tagify.on("dropdown:show", onSuggestionsListUpdate)
            .on("dropdown:hide", onSuggestionsListHide)
            .on('dropdown:scroll', onDropdownScroll)

        renderSuggestionsList()

        function onSuggestionsListUpdate({
            detail: suggestionsElm
        }) {
            console.log(suggestionsElm)
        }

        function onSuggestionsListHide() {
            console.log("hide dropdown")
        }

        function onDropdownScroll(e) {
            console.log(e.detail)
        }

        function renderSuggestionsList() {
            tagify.dropdown.show() // load the list
            tagify.DOM.scope.parentNode.appendChild(tagify.DOM.dropdown)
        }
    </script>
</div>
