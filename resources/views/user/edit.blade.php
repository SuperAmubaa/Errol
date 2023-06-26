@extends('layouts.index')

@section('content')
@php
$rs1 = App\Models\Roles::all();   
@endphp

<h3>Edit Barang</h3>
@foreach($data as $us)
<form method="POST" action="{{ route('user.update',$us->id)}}" >
@csrf
@method('put')
<div class="form-group">
    <label>No</label>
    <input type="text" name="id" value="{{ $us->id }}" class="form-control">
</div>
<div class="form-group">
    <label>Nama</label>
    <input type="text" name="name" value="{{ $us->name }}" class="form-control">
</div>
<div class="form-group">
    <label>Email</label>
    <input type="email" name="email" value="{{ $us->email }}" class="form-control">
</div>
<div class="form-group">
    <label>Role</label>
    <select class="form-control @error('role_id') is-invalid @enderror" name="role_id" >
        <option value="">--- Pilih Role ---</option>
        @foreach($rs1 as $rol)
        @php
        $sel1 = ($rol->id == $us->role_id ) ? 'selected' : '';
        @endphp
        <option value="{{$rol->id}}" {{$sel1}}>{{$rol->name}}</option>
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
@endforeach
@endsection