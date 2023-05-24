@extends('layouts.index')

@section('content')
<h3>Form Kategori</h3>
@foreach($data as $rs)

<form method="POST" action="{{ route('kategori.update',$rs->id)}}">
@csrf
@method('put')
<div class="form-group">
    <label>No</label>
    <input type="text" name="id" value="{{ $rs->id }}" class="form-control">
</div>
<div class="form-group">
    <label>Nama</label>
    <input type="text" name="name" value="{{ $rs->name }}" class="form-control">
</div>
<button type="submit" name="proses" value="simpan" class="btn btn-primary">Ubah</button>
<button type="reset" name="unproses" value="batal" class="btn btn-info">Batal</button>
</form>

@endforeach
@endsection