@extends('layouts.index')

@section('content')
<h3>Edit Denda</h3>
@foreach($data as $dn)

<form method="POST" action="{{ route('denda.update',$dn->id)}}">
@csrf
@method('put')
<div class="form-group">
    <label>Jenis</label>
    <input type="text" name="jenis" value="{{ $dn->jenis }}" class="form-control">
</div>
<div class="form-group">
    <label>Keterangan</label>
    <input type="text" name="keterangan" value="{{ $dn->keterangan }}" class="form-control">
</div>
<div class="form-group">
    <label>Tarif</label>
    <input type="text" name="tarif" value="{{ $dn->tarif }}" class="form-control">
</div>

<button type="submit" name="proses" value="simpan" class="btn btn-primary">Ubah</button>
<button type="reset" name="unproses" value="batal" class="btn btn-info">Batal</button>
</form>

@endforeach
@endsection