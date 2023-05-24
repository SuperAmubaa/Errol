@extends('layouts.index')

@section('content')
<h3>Form Kategori</h3>
<form method="POST" action="{{ route('kategori.store')}}">
@csrf
<div class="form-group">
    <label>Nama</label>
    <input type="text" name="name" value="" class="form-control">
</div>
<button type="submit" name="proses" value="simpan" class="btn btn-primary">Simpan</button>
<button type="reset" name="unproses" value="batal" class="btn btn-info">Batal</button>
</form>
@endsection