@extends('layouts.index')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Riwayat Pesanan</h1>
  
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
            <th>No</th>
            <th>Nama Peminjam</th>
            <th>Barang</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th>
            <th>Status</th>
            <th>Action</th>
            

        </tr>
        <tbody>
            @foreach($ar_pinjam as $pj)
            <tr>
                <td>{{ $loop->iteration}}</td>
                <td>{{$pj->user->name}}</td>
                <td>{{ $pj->barang->nama }}</td>
                <td>{{ $pj->tgl_pinjam }}</td>
                <td>{{ $pj->tgl_kembali }}</td>
                <td>{{ $pj->status }}</td>
                <td>
                    <a class="btn btn-info" href="{{route('penyewaan.show',$pj->id)}}">Detail</a> 
                </td>
            </tr>
            @endforeach
        </tbody>
    </thead>
</table>
</div>
        </div>
    </div>
  

@endsection