@extends('layouts.index')

@section('content')
@php
$rs1 = App\Models\Roles::all();   
@endphp
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="/beranda">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ url('/user')}}">User</a></li>
    <li class="breadcrumb-item">Tambah User</li>
    </ol>
<form method="POST" action="{{ route('user.store')}}" enctype="multipart/form-data" >
@csrf
<div class="form-group">
    <label>Nama</label>
    <input type="text" name="name" value="" class="form-control">
</div>
<div class="form-group">
    <label>Email</label>
    <input type="email" name="email" value="" class="form-control">
</div>
<div class="form-group">
    <label>Password</label>
    <input type="password" name="password" value="" class="form-control">
</div>
<div class="form-group">
    <label>Phone</label>
    <input type="text" name="phone" value="" class="form-control">
</div>
<div class="form-group">
    <label>Alamat</label>
    <input type="text" name="address" value="" class="form-control">
</div>
<div class="form-group">
    <label>Upload KTP</label>
    <input type="file" name="foto" value="" class="form-control ">
</div>
<div class="form-group">
    <label>Role</label>
    <select class="form-control @error('role_id') is-invalid @enderror" name="role_id" >
        <option value="">--- Pilih Role ---</option>
        @foreach($rs1 as $rol)
        <option value="{{$rol->id}}">{{$rol->name}}</option>
        @endforeach
      </select>
      @error('role_id')
      <div class="invalid-feedback">
          {{ $message }}
      </div>
      @enderror
</div>
<button type="submit" name="proses" value="simpan" class="btn btn-primary">Simpan</button>
<button type="reset" name="unproses" value="batal" class="btn btn-info">Batal</button>
</form>
@endsection