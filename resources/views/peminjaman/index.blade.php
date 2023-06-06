@extends('layouts.index')

@section('content')
    
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Peminjaman</h1>
  
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a class="btn btn-primary" href="{{route('peminjaman.create')}}">Pinjam</a>
        </div>
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
                <td>{{ $pj->id}}</td>
                <td>{{ $pj->us }}</td>
                <td>{{ $pj->br }}</td>
                <td>{{ $pj->tgl_pinjam }}</td>
                <td>{{ $pj->tgl_kembali }}</td>
                <td>{{ $pj->status }}</td>
                <td>
                    @if ($pj->status == 'pending')
                    <div class="d-inline">
                        <button class="btn btn-success btn-sm action" value="acc" data-id="{{ $pj->id }}"><i class="fas fa-check"></i> Setujui</button>
                        <button class="btn btn-danger btn-sm action" value="reject" data-id="{{ $pj->id }}"><i class="fas fa-times"></i> Tolak</button>
                    </div>
                    @endif


                {{-- <td>
                <form method="POST" action="{{ route('peminjaman.destroy',$pj->id)}}">
                    @csrf
                    @method('delete')
                <a class="btn btn-info" href="{{route('kategori.show',$pj->id)}}">Detail</a>  
                <a class="btn btn-success" href="{{route('kategori.edit',$pj->id)}}">Edit</a>  
                <button class="btn btn-danger" onclick="return confirm('Anda Yakin Data di Hapus?')">Hapus</button>
                </form>
            </td> --}}
            </tr>
            @endforeach
        </tbody>
    </thead>
</table>
</div>
        </div>
    </div>


@endsection