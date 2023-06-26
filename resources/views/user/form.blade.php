@extends('layouts.index')

@section('content')
@php
$rs1 = App\Models\Roles::all();   
@endphp

<h3>Form User</h3>
<form method="POST" action="{{ route('user.store')}}">
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