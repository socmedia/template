@if ($active)
<li class="breadcrumb-item active" aria-current="page">{{ $pageTitle }}</li>
@else
@if ($isParent)
<li class="breadcrumb-item">
    <a href="{{ $href }}">
        <i class="bx bx-home-alt"></i>
    </a>
</li>
@else
<li class="breadcrumb-item">
    <a href="{{ $href }}"> {{ $pageTitle ?: $slot }}</a>
</li>
@endif
@endif
