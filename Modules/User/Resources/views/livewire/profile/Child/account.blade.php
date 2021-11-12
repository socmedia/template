<div class="row">
    <div class="col-md-10">
        @if (session()->has('success'))
        <x-alert state="success" icon="check-circle" color="white" title="Success !">
            @slot('message')
            {{ session()->get('success') }}
            @endslot
        </x-alert>
        @endif

        <x-form-card title="Your Account">
            <form wire:submit.prevent="saveAccount">

                <div class="form-group row">
                    <div class="col-md-8 mb-3 mb-md-0">
                        <label for="email">email</label>
                        <input type="text" class="form-control" name="email" id="email" wire:model.defer="email">
                        @error('email')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="phone">Phone</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">+62</span>
                            </div>
                            <input type="text" class="form-control" name="phone" id="phone" wire:model.defer="phone">
                        </div>
                        @error('phone')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>

                <div class="text-end">
                    <button class="btn btn-dark">Save changes</button>
                </div>
            </form>
        </x-form-card>

        <script>
            $('input[name="phone"]').on('input', function () {
                let val = $(this).val(),
                replaced = val.replace(/[^0-9]/g, '');

                if (val.length > 12) {
                    return $(this).val(replaced.substr(0, 12))
                }

                return $(this).val(val.replace(/[^0-9]/g, ''))
            })
        </script>
    </div>
</div>
