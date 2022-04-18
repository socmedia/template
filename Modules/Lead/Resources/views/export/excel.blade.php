<table>
    <thead>
        <tr>
            <td>No</td>
            <td>Nama</td>
            <td>Email</td>
            <td>No. Telp.</td>
            <td>Alamat</td>
            <td>Pertanyaan</td>
            <td>Tanggal Submit</td>
        </tr>
    </thead>
    <tbody>
        @forelse ($leads as $lead)
        <tr>
            <td width="10">{{$loop->iteration}}</td>
            <td width="30" style="text-transform: capitalize;">{{$lead->name}}</td>
            <td width="30">{{$lead->email}}</td>
            <td width="30" style="text-align: right;">{{$lead->phone}}</td>
            <td width="30">{{$lead->address}}</td>
            <td width="30">{{$lead->question}}</td>
            <td width="30">{{$lead->created_at->toDayDateTimeString()}}</td>
        </tr>
        @empty
        <tr>
            <td colspan="6" style="text-align: center;">Data tidak ditemukan</td>
        </tr>
        @endforelse
    </tbody>
</table>