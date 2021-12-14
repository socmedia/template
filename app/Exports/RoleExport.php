<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Spatie\Permission\Models\Role;

class RoleExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    use Exportable;

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $role = Role::all();
        return $role->map(function ($query) {
            return [
                'id' => $query->id,
                'name' => $query->name,
                'guard_name' => $query->guard_name,
                'created_at' => $query->created_at->toDateTimeString(),
                'updated_at' => $query->updated_at->toDateTimeString(),
            ];
        });
    }

    /**
     * Define table heading excel
     *
     * @return array
     */
    public function headings(): array
    {
        return [
            'ID',
            'Nama',
            'Guard Name',
            'Dibuat Pada',
            'Diubah Pada',
        ];
    }
}
