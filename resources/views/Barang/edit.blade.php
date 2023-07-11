@extends('layouts.index')

@section('content')
@php
$bs1 = App\Models\Kategori::all();   
@endphp


<h3>Edit Barang</h3>
@foreach($data as $bs)
<form method="POST" action="{{ route('barang.update',$bs->id)}}" enctype="multipart/form-data">
@csrf
@method('put')
{{-- <div class="form-group">
    <label>No</label>
    <input type="text" name="id" value="{{ $bs->id }}" class="form-control">
</div> --}}
<div class="form-group">
    <label>Foto</label>
    <input type="file" name="foto" value="{{ $bs->foto }}" class="form-control">
    {{-- <img src="{{ asset('images')}}/{{ $bs->foto }}" width="30"> --}}
</div>
<div class="form-group">
    <label>Kategori</label>
    <select class="form-control" name="kategori_id" >
        <option selected>--- Pilih Kategori ---</option>
        @foreach($bs1 as $kat)
        @php
        $sel1 = ($kat->id == $bs->kategori_id ) ? 'selected' : '';
        @endphp
        <option value="{{$kat->id}}" {{$sel1}}>{{$kat->name}}</option>
        @endforeach
      </select>
</div>
<div class="form-group">
    <label>Nama</label>
    <input type="text" name="nama" value="{{ $bs->nama }}" class="form-control">
</div>
<div class="form-group">
    <label>Stok</label>
    <input type="text" name="stok" value="{{ $bs->stok }}" class="form-control">
</div>
<div class="form-group">
    <label>Harga Sewa</label>
    <input type="text" name="harga" value="{{ $bs->harga }}" class="form-control">
</div>
<div class="form-group">
    <label>Harga Beli</label>
    <input type="text" name="beli" value="{{ $bs->beli }}" class="form-control">
</div>

<button type="submit" name="proses" value="simpan" class="btn btn-primary">Ubah</button>
<button type="reset" name="unproses" value="Reset" class="btn btn-info">Batal</button>
</form>
@endforeach
@endsection