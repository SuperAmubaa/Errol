@extends('layouts.index')

@section('content')
<h3>Form Kategori</h3>
<form method="POST" action="{{ route('denda.store')}}">
@csrf
<div class="form-group">
    <label>Jenis</label>
    <input type="text" name="jenis" value="" class="form-control">
</div>
<div class="form-group">
    <label>Keterangan</label>
    <input type="text" name="keterangan" value="" class="form-control">
</div>
<div class="form-group">
    <label>Tarif</label>
    <input type="text" name="tarif" value="" class="form-control">
</div>
<button type="submit" name="proses" value="simpan" class="btn btn-primary">Simpan</button>
<button type="reset" name="unproses" value="batal" class="btn btn-info">Batal</button>
</form>
@endsection