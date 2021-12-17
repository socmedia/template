<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UserExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    use Exportable;

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $user = User::withTrashed()->get();
        return $user->map(function ($user) {
            return [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'email_verified_at' => $user->email_verified_at ?: 'null',
                'role' => $user->getRoleNames()->first(),
                'place_of_brith' => $user->place_of_birth ?: 'null',
                'date_of_brith' => $user->date_of_birth ? $user->date_of_birth->format('D, d M Y') : 'null',
                'bio' => $user->bio ?: 'null',
                'gender' => $user->gender ?: 'null',
                'area_code' => $user->area_code ?: 'null',
                'phone' => $user->phone ?: 'null',
                'province_id' => $user->province ? $user->province->name : 'null',
                'regency_id' => $user->regency ? $user->regency->name : 'null',
                'district_id' => $user->district ? $user->district->name : 'null',
                'address' => $user->address ?: 'null',
                'avatar_url' => $user->avatar_url ?: 'null',
                'allow_shares' => $user->allow_shares ? 'Ya' : 'Tidak',
                'private_mode' => $user->private_mode ? 'Ya' : 'Tidak',
                'facebook' => $user->facebook ?: 'null',
                'instagram' => $user->instagram ?: 'null',
                'linkedin' => $user->linkedin ?: 'null',
                'tiktok' => $user->tiktok ?: 'null',
                'approved_at' => $user->approved_at ? $user->approved_at->format('D, d M Y') : 'null',
                'approved_by' => $user->approved_by ?: 'null',
                'deactivated_reasons' => $user->deactivated_reasons ?: 'null',
                'deactivated_at' => $user->deactivated_at ? $user->deactivated_at->format('D, d M Y') : 'null',
                'created_at' => $user->created_at ? $user->created_at->format('D, d M Y') : 'null',
                'updated_at' => $user->updated_at ? $user->updated_at->format('D, d M Y') : 'null',
                'deleted_at' => $user->deleted_at ? $user->deleted_at->format('D, d M Y') : 'null',
            ];
        });
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nama Lengkap',
            'Email',
            'Email Diverifikasi Pada',
            'Role',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Bio',
            'Jenis Kelamin',
            'Kode Area',
            'Telepon',
            'Provinsi',
            'Kota/Kab.',
            'Kecamatan',
            'Alamat',
            'Foto Profil Link',
            'Perbolehkan Share',
            'Mode Privasi',
            'Facebook',
            'Instagram',
            'Linkedin',
            'Tiktok',
            'Diperbolehkan Pada',
            'Diperbolehkan Oleh',
            'Alasan Di Non-Aktifkan',
            'Di Non-Aktifkan Pada',
            'Dibuat Pada',
            'Diperbarui Pada',
            'Dihapus Pada',
        ];
    }
}