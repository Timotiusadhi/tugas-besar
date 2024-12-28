@extends('index')

@section('content')
<div class="container">
    <h1 class="text-3xl">Daftar Barang</h1>
    <table class="table-auto w-full">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Penambah</th>
                <th>Nama Barang</th>
                <th>Jumlah Barang</th>
                <th>Berat Barang</th>
                <th>Tanggal Penambahan</th>
                <th>Status Barang</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($penambahan as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->penambah }}</td>
                    <td>{{ $item->NamaBar }}</td>
                    <td>{{ $item->JumlahBar }}</td>
                    <td>{{ $item->BeratBar }}</td>
                    <td>{{ $item->DateBar }}</td>
                    <td>{{ $item->StatusBar }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
