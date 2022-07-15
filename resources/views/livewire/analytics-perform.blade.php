<div>
    @if ($isHomePage)
        <table class="table table-borderless table-light table-striped table-sm">
            {{-- <tr>
                <td class="p-1" width="30%">Harian</td>
                <td class="p-1" width="5%">:</td>
                <td class="p-1">{{ $visitors['daily'] }} Visitor</td>
            </tr> --}}
            <tr>
                <td class="p-1" width="30%">Mingguan</td>
                <td class="p-1" width="5%">:</td>
                <td class="p-1">{{ $visitors['weekly'] }} Visitor</td>
            </tr>
            <tr>
                <td class="p-1">Bulanan</td>
                <td class="p-1">:</td>
                <td class="p-1">{{ $visitors['monthly'] }} Visitor</td>
            </tr>
            <tr>
                <td class="p-1">Tahunan</td>
                <td class="p-1">:</td>
                <td class="p-1">{{ $visitors['yearly'] }} Visitor</td>
            </tr>
        </table>
    @else
        <table class="table">
            {{-- <tr>
                <td width="30%">Harian</td>
                <td width="5%">:</td>
                <td>{{ $visitors['daily'] }} Visitor</td>
            </tr> --}}
            <tr>
                <td width="30%">Mingguan</td>
                <td width="5%">:</td>
                <td>{{ $visitors['weekly'] }} Visitor</td>
            </tr>
            <tr>
                <td>Bulanan</td>
                <td>:</td>
                <td>{{ $visitors['monthly'] }} Visitor</td>
            </tr>
            <tr>
                <td>Tahunan</td>
                <td>:</td>
                <td>{{ $visitors['yearly'] }} Visitor</td>
            </tr>
        </table>
    @endif
</div>
