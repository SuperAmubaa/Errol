@extends('layouts.index')

@section('content')
@php
$rs1 = App\Models\Kategori::all();   
@endphp

<ol class="breadcrumb mb-4">
<li class="breadcrumb-item"><a href="/beranda">Dashboard</a></li>
<li class="breadcrumb-item"><a href="{{ url('/barang')}}">Barang</a></li>
<li class="breadcrumb-item">Tambah Barang</li>
</ol>
{{-- @if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error}}</li>
        @endforeach
    </ul>
</div>
@endif --}}
<form method="POST" action="{{ route('barang.store')}}" enctype="multipart/form-data" >
@csrf
<div class="form-group">
    <label>Foto</label>
    <input type="file" name="foto" value="{{old('foto')}}" class="form-control  @error('foto') is-invalid @enderror">
    @error('foto')
      <div class="invalid-feedback">
          {{ $message }}
      </div>
      @enderror
</div>
<div class="form-group">
    <label>Kategori</label>
    <select class="form-control @error('kategori_id') is-invalid @enderror" name="kategori_id" >
        <option value="">--- Pilih Kategori ---</option>
        @foreach($rs1 as $kat)
        <option value="{{$kat->id}}">{{$kat->name}}</option>
        @endforeach
      </select>
      @error('kategori_id')
      <div class="invalid-feedback">
          {{ $message }}
      </div>
      @enderror
</div>
<div class="form-group">
    <label>Nama</label>
    <input type="text" name="nama" value="{{old('nama')}}" class="form-control @error('nama') is-invalid @enderror" >
    @error('nama')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>
<div class="form-group">
    <label>Stok</label>
    <input type="number" name="stok" value="{{old('stok')}}" class="form-control @error('stok') is-invalid @enderror">
    @error('stok')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>
<div class="form-group">
    <label>Harga Sewa</label>
    <input type="text" name="harga" value="{{old('harga')}}" class="form-control @error('harga') is-invalid @enderror">
    @error('harga')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>
<div class="form-group">
    <label>Harga Beli</label>
    <input type="text" name="beli" value="{{old('beli')}}" class="form-control @error('beli') is-invalid @enderror ">
    @error('beli')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>
<button type="submit" name="proses" value="simpan" class="btn btn-primary">Simpan</button>
<button type="reset" name="unproses" value="batal" class="btn btn-info">Batal</button>
</form>

@endsection