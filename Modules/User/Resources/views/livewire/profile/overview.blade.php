<div class="card h-100">
    <div class="card-body py-5">
        <div class="row">
            <div class="col-md-4 text-center mb-3 mb-md-0">
                <div class="avatar lg mb-3 mx-auto">
                    {{-- <img
                        src="{{ auth()->user()->avatar_url ?: 'https://ui-avatars.com/api/?format=svg&name='. auth()->user()->name .'&background=f1f1f1&color=636363' }}">
                    --}}
                    <img
                        src="https://images.unsplash.com/photo-1593642634402-b0eb5e2eebc9?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1469&q=80">
                </div>
                <x-dropdown icon="bx bx-caret-down" iconSize="fs-6" color="text-white" text="Change Avatar"
                    additionalClass="btn btn-primary btn-sm">
                    <li class="text-center">
                        <label for="avatar-upload" class="d-inline-block">Upload Avatar</label>
                        <input type="file" class="d-flex" style="opacity: 0; height: 0; width: 0" name="avatar"
                            id="avatar-upload">
                    </li>
                </x-dropdown>
            </div>
            <div class="col">
                <h4 class="text-center text-md-start">{{auth()->user()->name}}</h4>
                <p class="text-center text-md-start"><a class="text-secondary"
                        href="mailto:{{auth()->user()->email}}">{{auth()->user()->email}}</a></p>

                @role('Admin|Developer')
                <small class="bg-dark px-2 py-1 text-white rounded-pill mb-1">
                    {{ auth()->user()->getRoleNames()->first() }}
                </small>
                @endrole

                <p class="text-muted font-size-sm">{{auth()->user()->address}}</p>

                <hr>
                <div class="row">
                    <div class="col-md-6 mb-3 mb-md-0">
                        <span>You need to complete your profile.</span>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 35%;" aria-valuenow="35"
                                aria-valuemin="0" aria-valuemax="100">35%</div>
                        </div>
                    </div>
                    <div class="col-md-6 align-self-end">
                        <p class="text-end mb-0">
                            Joined at,
                            <span class="text-muted">
                                {{ auth()->user()->created_at->format('d M Y') }}
                            </span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
