@extends('layouts.index')

@section('content')
    
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Kategori Barang</h1>
  
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a class="btn btn-primary" href="{{route('kategori.create')}}">Tambah Kategori</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Action</th>
        </tr>
        <tbody>
            @foreach($ar_kategori as $k)
            <tr>
                <td>{{ $k->id}}</td>
                <td>{{ $k->name }}</td>
                <td>
                <form method="POST" action="{{ route('kategori.destroy',$k->id)}}">
                    @csrf
                    @method('delete')
                <a class="btn btn-info" href="{{route('kategori.show',$k->id)}}">Detail</a>  
                <a class="btn btn-success" href="{{route('kategori.edit',$k->id)}}">Edit</a>  
                <button class="btn btn-danger" onclick="return confirm('Anda Yakin Data di Hapus?')">Hapus</button>
                </form>
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