@extends('layouts.index')

@section('content')
    
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Jenis Denda</h1>
  
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a class="btn btn-primary" href="{{route('denda.create')}}">Tambah Denda</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
            <th>No</th>
            <th>Jenis</th>
            <th>Keterangan</th>
            <th>Tarif</th>
            <th>Action</th>
        </tr>
        <tbody>
            @foreach($ar_denda as $d)
            <tr>
                <td>{{ $d->id}}</td>
                <td>{{ $d->jenis }}</td>
                <td>{{ $d->keterangan }}</td>
                <td>{{ $d->tarif }}</td>
                <td>
                <a class="btn btn-success" href="{{route('denda.edit',$d->id)}}">Edit</a>  
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