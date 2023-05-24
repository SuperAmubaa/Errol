@extends('layouts.index')

@section('content')


<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Barang</h1>
  
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a class="btn btn-primary" href="{{route('barang.create')}}">Tambah Barang</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Foto</th>
                            <th>Kategori</th>
                            <th>Nama</th>
                            <th>Stok</th>
                            <th>Harga Sewa</th>
                            <th>Harga Rusak</th>
                            <th>Harga Hilang</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($ar_barang as $br)
                        <tr>
                            <td>{{ $br->id}}</td>
                            <td width="30%">
                            @php
                            if(!empty($br->foto)){
                            @endphp
                                <img src="{{ asset('images')}}/{{ $br->foto }}" width="40%"/>
                            @php
                            } else {
                            @endphp
                                <img src="{{ asset('images')}}/noimages.png" width="40%"/>
                            @php
                            }
                            @endphp
                            </td>
                            <td>{{ $br->kat }}</td>
                            <td>{{ $br->nama }}</td>
                            <td>{{ $br->stok }}</td>
                            <td>{{ $br->harga }}</td>
                            <td>{{ $br->rusak }}</td>
                            <td>{{ $br->hilang }}</td>
                            <td>
                            <form method="POST" action="{{ route('barang.destroy',$br->id)}}">
                                @csrf
                                @method('delete')
                            <a class="btn btn-info" href="{{route('barang.show',$br->id)}}">Detail</a>  
                            <a class="btn btn-success" href="{{route('barang.edit',$br->id)}}">Edit</a>  
                            <button class="btn btn-danger" onclick="return confirm('Anda Yakin Data di Hapus?')">Hapus</button>
                            </form>
                        </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection