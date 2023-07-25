@extends('layouts.index')

@section('content')
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="/beranda">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ url('/denda')}}">Denda</a></li>
    <li class="breadcrumb-item">Tambah Denda</li>
    </ol>
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