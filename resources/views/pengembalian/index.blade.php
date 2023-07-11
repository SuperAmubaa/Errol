@extends('layouts.index')

@section('content')
    
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Pengembalian</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
        <li class="breadcrumb-item">Pengembalian</li>
    </ol>
  
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a class="btn btn-primary" href="{{route('pengembalian.create')}}">Tambah Pengembalian</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
            <th>No</th>
            <th>Nama Peminjam</th>
            <th>Tanggal Kembali</th>
            <th>Denda</th>
            <th>Tarif</th>
            <th>Action</th>
        </tr>
        <tbody>
            @foreach($ar_pengembalian as $km)
            <tr>
                <td>{{ $km->id}}</td>
                <td>{{ $km->us}}</td>
                <td>{{ $km->tgl_kembali }}</td>
                <td>{{ $km->jn }}</td>
                <td>{{ $km->tarif }}</td>
                <td><a class="btn btn-info" href="{{route('pengembalian.show',$km->id)}}">Detail</a>  
                </td>
            </tr>
            @endforeach
        </tbody>
    </thead>
</table>
</div>
        </div>
    </div>
</div>


@endsection