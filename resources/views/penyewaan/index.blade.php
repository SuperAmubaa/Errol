@extends('layouts.index')

@section('content')
@include('sweetalert::alert')
@php
$rs1 = App\Models\Barang::all();   
@endphp

<div class="container-fluid">
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="/beranda">Dashboard</a></li>
        <li class="breadcrumb-item">List Barang</li>
    </ol>
    <!-- Page Heading -->
   
  
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a class="btn btn-primary" href="{{route('penyewaan.create')}}">Sewa Barang</a>
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
                <td>{{ $br->nama }}</td>
                <td>Rp.{{ $br->harga }}</td>
                <td>{{ $br->stok }}</td>
                
               
        
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