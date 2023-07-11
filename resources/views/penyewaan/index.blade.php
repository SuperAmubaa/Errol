@extends('layouts.index')

@section('content')
@php
$rs1 = App\Models\Barang::all();   
@endphp

<div class="container-fluid">
    <h1 class="h2 mb-2 text-gray-800">List Barang </h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
        <li class="breadcrumb-item">List Barang</li>
    </ol>
    <!-- Page Heading -->
   
  
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a class="btn btn-success" href="{{route('penyewaan.create')}}">Sewa Barang</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
            <th>No</th>
            <th>Gambar</th>
            <th>Nama Barang</th>
            <th>Harga Sewa</th>
            <th>Stok</th>

        </tr>
        <tbody>
            @foreach($rs1 as $br)
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
                <td>{{ $br->nama }}</td>
                <td>{{ $br->harga }}</td>
                <td>{{ $br->stok }}</td>
                {{-- <td><button class="btn btn-info">Sewa</button></td> --}}
                {{-- <td>
                <form method="POST" action="{{route ('penyewaan-add',$br->id)}}">
                    @csrf
                <button class="btn btn-danger">Sewa</button>
                </form>
            </td>  --}}
               
        
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