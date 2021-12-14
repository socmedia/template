<div {{ $attributes->merge(['class' => 'table-responsive mb-3']) }}>
    <table class="table table-striped">

        <x-table.header :cells="$header" />

        {{ $slot }}

    </table>
</div>
