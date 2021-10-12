<div class="row">
    <div class="col-md-10">

        <h6 class="text-uppercase text-secondary">Your Account</h6>
        <hr>
        <div class="card">
            <div class="card-body p-4">
                <form wire:submit.prevent="saveAccount">

                    <div class="form-group row">
                        <div class="col-md-8 mb-3 mb-md-0">
                            <label for="email">email</label>
                            <input type="text" class="form-control" name="email" id="email" wire:model="email">
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
                                <input type="text" class="form-control" name="phone" id="phone" wire:model="phone">
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
            </div>

        </div>

    </div>
</div>
