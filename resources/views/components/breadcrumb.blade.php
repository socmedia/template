<div class="page-breadcrumb d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3 mb-1 mb-sm-0">{{ $pageTitle }}</div>
    <div class="ps-3 mb-3 mb-sm-0">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <x-breadcrumb.link href="{{ route('adm.index') }}" isParent="true" />
                {{ $link }}
            </ol>
        </nav>
    </div>
    <div class="ms-auto text-end">
        {{ $button }}
    </div>
</div>
