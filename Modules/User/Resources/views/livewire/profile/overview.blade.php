<div>

    @if (session()->has('success'))
    <x-alert state="success" icon="check-circle" color="white" title="Success !">
        @slot('message')
        {{ session()->get('success') }}
        @endslot
    </x-alert>
    @endif

    <div class="card h-100">
        <div class="card-body py-5">
            <div class="row">
                <div class="col-md-4 text-center mb-3 mb-md-0">
                    <div class="avatar lg mb-3 mx-auto d-flex justify-content-center">
                        @if ($avatar)
                        <img src="{{ $avatar->temporaryUrl() }}">
                        @else
                        <img src="{{ user('avatar_url') }}">
                        @endif

                    </div>
                    <x-dropdown icon="bx bx-caret-down" iconSize="fs-6" color="text-white" text="Change Avatar"
                        additionalClass="btn btn-primary btn-sm" loadingState="true" wireTarget="avatar">
                        <li class="text-center">
                            <label for="avatar-upload" class="d-inline-block">Upload Avatar</label>
                            <input type="file" class="d-flex" style="opacity: 0; height: 0; width: 0"
                                wire:model="avatar" id="avatar-upload">
                        </li>
                    </x-dropdown>

                    @error('avatar')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="col">
                    <h4 class="text-center text-md-start">{{user('name')}}</h4>
                    <p class="text-center text-md-start"><a class="text-secondary"
                            href="mailto:{{user('email')}}">{{user('email')}}</a></p>

                    <p class="text-secondary">
                        {{user('gender') != '-' ? user('gender') . ', ' : ''}}
                        {{age(user('date_of_birth'))}}
                    </p>

                    <p class="my-3">
                        {!! user('bio') !!}
                    </p>

                    <p class="txext-light text-capitalize font-size-sm">
                        {{ !user('regency') ?: user('regency')->name }}
                    </p>

                    <hr>
                    <div class="row">
                        <div class="col-md-6 mb-3 mb-md-0">
                        </div>
                        <div class="col-md-6 align-self-end">
                            <p class="text-end mb-0">
                                Joined at,
                                <span class="text-muted">
                                    {{ user('created_at')->format('d M Y') }}
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
