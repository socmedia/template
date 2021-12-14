@if ($isHeader)

<th {{ $sortable ? $attributes : false }}>

    @if ($cell)
    <div class="d-flex align-items-center justify-content-between {{ $sortable ? 'cursor-pointer' : '' }}">
        <span> {{ $cell }} </span>

        @if ($sortable)

        @if (!$sortableOrder)
        <i class="me-2 bx bx-sort-alt-2"></i>
        @elseif ($sortableOrder == 'asc')
        <i class="me-2 bx bx-sort-down"></i>
        @elseif ($sortableOrder == 'desc')
        <i class="me-2 bx bx-sort-up"></i>
        @endif

        @endif
    </div>
    @else
    {{ $slot }}
    @endif
</th>
@else
<td {{ $attributes }}>{{ $cell ?: $slot }}</td>
@endif
