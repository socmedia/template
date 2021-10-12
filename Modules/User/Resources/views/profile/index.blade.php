@extends("layouts.master")

@section("wrapper")
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Profile</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('adm.user.index')}}">
                                <i class="bx bx-home-alt"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Profile</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="row">
            <div class="col">
                <x-widget state="danger" title="Revenue" icon="user" text="50%" />
            </div>
            <div class="col">
                <x-widget state="danger" title="Revenue" icon="user" text="50%" />
            </div>
            <div class="col">
                <x-widget state="danger" title="Revenue" icon="user" text="50%" />
            </div>
            <div class="col">
                <x-widget state="danger" title="Revenue" icon="user" text="50%" />
            </div>
        </div>

        <x-alert state="danger" icon="cart" color="white" title="Test title">
            @slot('message')
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis, numquam repudiandae tempore ducimus
            molestiae qui, delectus culpa, debitis atque vero autem quia quam voluptatum amet provident ea eos error
            minima.
            @endslot
        </x-alert>

        <x-alert-border icon="cart" state="danger" title="Test title">
            @slot('message')
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis, numquam repudiandae tempore ducimus
            molestiae qui, delectus culpa, debitis atque vero autem quia quam voluptatum amet provident ea eos error
            minima.
            @endslot
        </x-alert-border>

        <div class="main-body">
            <hr>

            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col table-responsive">
                            <table class="table table-hover">
                                <thead class="bg-light">
                                    <tr>
                                        <td colspan="2">Name</td>
                                        <td>Email</td>
                                        <td>Role</td>
                                        <td>Verified</td>
                                        <td colspan="2">Approved</td>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr style="vertical-align: middle">
                                        <td width="20">
                                            <input class="form-check-input m-auto" type="checkbox" value=""
                                                aria-label="...">
                                        </td>
                                        <td>Lorem, ipsum dolor.</td>
                                        <td>Lorem, ipsum dolor.</td>
                                        <td>Developer</td>
                                        <td>
                                            <x-badge icon="bx bxs-circle" text="verified"></x-badge>
                                        </td>
                                        <td>
                                            <x-badge icon="bx bxs-circle">Approved</x-badge>
                                        </td>
                                        <td class="text-center">
                                            <x-dropdown>
                                                <li><a class="dropdown-item" href="javascript:;">Action</a>
                                                </li>
                                                <li><a class="dropdown-item" href="javascript:;">Another action</a>
                                                </li>
                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="javascript:;">Something else
                                                        here</a>
                                                </li>
                                            </x-dropdown>
                                        </td>
                                    </tr>
                                    <tr style="vertical-align: middle">
                                        <td width="20">
                                            <input class="form-check-input m-auto" type="checkbox" value=""
                                                aria-label="...">
                                        </td>
                                        <td>Lorem, ipsum dolor.</td>
                                        <td>Lorem, ipsum dolor.</td>
                                        <td>Developer</td>
                                        <td>
                                            <x-badge icon="bx bxs-circle" text="verified"></x-badge>
                                        </td>
                                        <td>
                                            <x-badge icon="bx bxs-circle">Approved</x-badge>
                                        </td>
                                        <td class="text-center">
                                            <x-dropdown>
                                                <li><a class="dropdown-item" href="javascript:;">Action</a>
                                                </li>
                                                <li><a class="dropdown-item" href="javascript:;">Another action</a>
                                                </li>
                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="javascript:;">Something else
                                                        here</a>
                                                </li>
                                            </x-dropdown>
                                        </td>
                                    </tr>
                                    <tr style="vertical-align: middle">
                                        <td width="20">
                                            <input class="form-check-input m-auto" type="checkbox" value=""
                                                aria-label="...">
                                        </td>
                                        <td>Lorem, ipsum dolor.</td>
                                        <td>Lorem, ipsum dolor.</td>
                                        <td>Developer</td>
                                        <td>
                                            <x-badge icon="bx bxs-circle" state="danger">Unverified</x-badge>
                                        </td>
                                        <td>
                                            <x-badge icon="bx bxs-circle">Approved</x-badge>
                                        </td>
                                        <td class="text-center">
                                            <x-dropdown>
                                                <li><a class="dropdown-item" href="javascript:;">Action</a>
                                                </li>
                                                <li><a class="dropdown-item" href="javascript:;">Another action</a>
                                                </li>
                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="javascript:;">Something else
                                                        here</a>
                                                </li>
                                            </x-dropdown>
                                        </td>
                                    </tr>
                                    <tr style="vertical-align: middle">
                                        <td width="20">
                                            <input class="form-check-input m-auto" type="checkbox" value=""
                                                aria-label="...">
                                        </td>
                                        <td>Lorem, ipsum dolor.</td>
                                        <td>Lorem, ipsum dolor.</td>
                                        <td>Developer</td>
                                        <td>
                                            <x-badge icon="bx bxs-circle" text="verified"></x-badge>
                                        </td>
                                        <td>
                                            <x-badge icon="bx bxs-circle">Approved</x-badge>
                                        </td>
                                        <td class="text-center">
                                            <x-dropdown>
                                                <li><a class="dropdown-item" href="javascript:;">Action</a>
                                                </li>
                                                <li><a class="dropdown-item" href="javascript:;">Another action</a>
                                                </li>
                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="javascript:;">Something else
                                                        here</a>
                                                </li>
                                            </x-dropdown>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        {{-- <livewire:user::profile.main /> --}}
    </div>
</div>
@endsection

@push('style')
<link rel="stylesheet" href="{{asset('assets/app/css/additional.css')}}">
@endpush
