@extends('layouts.index')

@section('content')
@include('sweetalert::alert')

<div class="container-fluid">

    <!-- Page Heading -->

    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="/beranda">Dashboard</a></li>
        <li class="breadcrumb-item">Barang</li>
    </ol>
  
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
                            <th>Harga Beli</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($ar_barang as $br)
                        <tr>
                            <td>{{ $loop->iteration}}</td>
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
                            <td>Rp.{{ $br->harga }}</td>
                            <td>Rp.{{ $br->beli }}</td>
                            <td>
                            <form method="POST" action="{{ route('barang.destroy',$br->id)}}">
                                @csrf
                                @method('delete')
                            <a class="btn btn-info" href="{{route('barang.show',$br->id)}}"><i class="fas fa-eye"></i></a>  
                            <a class="btn btn-success" href="{{route('barang.edit',$br->id)}}"><i class="fas fa-edit"></i></a>  
                            <button class="btn btn-danger" onclick="return confirm('Anda Yakin Data di Hapus?')" ><i class="fas fa-trash"></i></button>
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