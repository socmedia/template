<div class="row">
    <div class="col-md-8">
        <h6 class="text-uppercase text-secondary">Change Password</h6>
        <hr>
        <div class="card">
            <div class="card-body p-4">
                <form>
                    <div class="form-group row">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group" id="show_hide_password">
                                <input type="password" class="form-control border-end-0" id="password" value=""
                                    name="password" placeholder="Enter Password">
                                <a href="javascript:;" class="input-group-text bg-transparent"><i
                                        class='bx bx-hide'></i></a>
                            </div>
                            @error('password')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3 mb-md-0">
                            <label for="password_confirmation" class="form-label">Re-Type Password</label>
                            <div class="input-group" id="show_hide_password">
                                <input type="password" class="form-control border-end-0" id="password_confirmation"
                                    value="" name="password_confirmation" placeholder="Re-Type Password">
                                <a href="javascript:;" class="input-group-text bg-transparent"><i
                                        class='bx bx-hide'></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="text-end">
                        <button class="btn btn-dark">Change password</button>
                    </div>
                </form>
            </div>
        </div>

        <h6 class="text-uppercase text-secondary">Login Info</h6>
        <hr>
        <div class="card">
            <div class="card-body p-4">
                <div class="row">
                    @foreach ($info as $item)
                    <div class="col-12">
                        <div class="row">
                            <div class="col-md-5 mb-3 mb-md-0">
                                <div class="card radius-10 border shadow-none">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="col-8">
                                                <h5 class="mb-0">{{$item['browser']}}</h5>
                                                <small class="my-1">IP: {{$item['ip']}}</small> <br>
                                                <hr class="my-2">
                                                <small>
                                                    <i class="bx bx-time"></i>
                                                    {{date_format(date_create($item['loginDate']), 'D, d M y. H:i a')}}
                                                </small>
                                            </div>
                                            <div class="col font-35 text-end"><i
                                                    class="bx bx-{{$item['deviceType']}}"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col align-self-center">
                                <div class="text-end">
                                    <button class="btn btn-sm btn-outline-dark">
                                        Remove Device
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <hr class="mt-3 mb-4">
        <div class="alert border-0 border-start border-5 border-danger alert-dismissible fade show pt-2 pb-4 ">
            <div class="d-flex align-items-center">
                <div class="font-35 text-danger"><i class="bx bx-info-circle"></i>
                </div>
                <div class="ms-3">
                    <h6 class="mb-0 text-danger">Remove Account</h6>
                </div>
            </div>
            <p>
                You can delete your account at any time. If you change your mind, you might not be able to recover
                it. Before you close your account, take some time to sort things out. All data on the system will be
                permanently deleted.
            </p>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" wire:model="agreement" id="confirm-remove">
                <label class="form-check-label" for="confirm-remove">I agree to delete my account</label>
            </div>

            <div class="text-end">
                @if ($agreement)
                <button class="btn btn-sm btn-danger">
                    Remove My Account
                </button>
                @else
                <div class="btn btn-sm btn-danger disabled">
                    Remove My Account
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
