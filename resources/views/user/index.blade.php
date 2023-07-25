@extends('layouts.index')

@section('content')
@include('sweetalert::alert')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data User</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
        <li class="breadcrumb-item">User</li>
    </ol>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a class="btn btn-primary" href="{{route('user.create')}}">Tambah User</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Role</th>
            <th>Action</th>
        </tr>
        <tbody>
            @foreach($ar_user as $us)
            <tr>
                <td>{{ $loop->iteration}}</td>
                <td>{{ $us->name }}</td>
                <td>{{ $us->email }}</td>
                <td>{{ $us->rol }}</td>
                <td>
                <form method="POST" action="{{ route('user.destroy',$us->id)}}">
                    @csrf
                    @method('delete')
                    <a class="btn btn-info" href="{{route('user.show',$us->id)}}"><i class="fas fa-eye"></i></a>  
                    <a class="btn btn-success" href="{{route('user.edit',$us->id)}}"><i class="fas fa-edit"></i></a>  
                    <button class="btn btn-danger" onclick="return confirm('Anda Yakin Data di Hapus?')" ><i class="fas fa-trash"></i></button>
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