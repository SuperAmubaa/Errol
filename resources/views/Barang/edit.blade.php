@extends('layouts.index')

@section('content')
@php
$rs1 = App\Models\Kategori::all();   
@endphp


<h3>Form Barang</h3>
@foreach($data as $rs)
<form method="POST" action="{{ route('barang.update',$rs->id)}}">
@csrf
@method('put')
<div class="form-group">
    <label>No</label>
    <input type="text" name="id" value="{{ $rs->id }}" class="form-control">
</div>
<div class="form-group">
    <label>Foto</label>
    <input type="file" name="foto" value="{{ $rs->foto }}" class="form-control">
</div>
<div class="form-group">
    <label>Kategori</label>
    <select class="form-control" name="kategori_id" >
        <option selected>--- Pilih Kategori ---</option>
        @foreach($rs1 as $kat)
        @php
        $sel1 = ($kat->id == $rs->kategori_id ) ? 'selected' : '';
        @endphp
        <option value="{{$kat->id}}" {{$sel1}}>{{$kat->name}}</option>
        @endforeach
      </select>
</div>
<div class="form-group">
    <label>Nama</label>
    <input type="text" name="nama" value="{{ $rs->nama }}" class="form-control">
</div>
<div class="form-group">
    <label>Stok</label>
    <input type="text" name="stok" value="{{ $rs->stok }}" class="form-control">
</div>
<div class="form-group">
    <label>Harga Sewa</label>
    <input type="text" name="harga" value="{{ $rs->harga }}" class="form-control">
</div>
<div class="form-group">
    <label>Harga Rusak</label>
    <input type="text" name="rusak" value="{{ $rs->rusak }}" class="form-control">
</div>
<div class="form-group">
    <label>Harga Hilang</label>
    <input type="text" name="hilang" value="{{ $rs->hilang }}" class="form-control">
</div>
<button type="submit" name="proses" value="simpan" class="btn btn-primary">Simpan</button>
<button type="reset" name="unproses" value="Reset" class="btn btn-info">Batal</button>
</form>
@endforeach
@endsection