@extends('layouts.index')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@php

$rs2 = App\Models\Barang::all();
// $rs3 = App\Models\Denda::all();

@endphp

<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="/beranda">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ url('/penyewaan')}}">Penyewaan</a></li>
    <li class="breadcrumb-item">Sewa Barang</li>
    </ol>
<form method="POST" action="{{ route('penyewaan.store')}}" >
    @csrf

<div class="form-group">
    <label for="barang" class="form-label">Barang</label>
    <select class="form-control userbox @error('barang_id') is-invalid @enderror" name="barang_id" >
        <option value="">--- Pilih Barang ---</option>
        @foreach($rs2 as $br)
        <option value="{{$br->id}}">{{$br->nama}}</option>
        @endforeach
      </select>
      @error('barang_id')
      <div class="invalid-feedback">
          {{ $message }}
      </div>
      @enderror
</div>
<div class="form-group">
    <label>Jumlah</label>
    <input type="number" name="qty" min="1" max="5" value="{{old('qty')}}" class="form-control @error('qty') is-invalid @enderror">
    @error('qty')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>
{{-- <div class="form-group">
    <label>Tanggal Pinjam</label>
    <input type="date" name="tgl_pinjam" value="{{old('tgl_pinjam')}}" class="form-control @error('tgl_pinjam') is-invalid @enderror " >
    @error('tgl_pinjam')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div> --}}
<div class="form-group">
    <label>Tanggal Kembali</label>
    <input type="date" name="tgl_kembali" value="{{old('tgl_kembali')}}" class="form-control @error('tgl_kembali') is-invalid @enderror " >
    @error('tgl_kembali')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>
{{-- <div class="form-group">
    <label for="denda_id" class="form-label">Denda</label>
    <select class="form-control userbox @error('denda_id') is-invalid @enderror" name="denda_id" >
        <option value="">--- Pilih Denda ---</option>
        @foreach($rs3 as $dn)
        <option value="{{$dn->id}}">{{$dn->jenis}}</option>
        @endforeach
      </select>
      @error('denda_id')
      <div class="invalid-feedback">
          {{ $message }}
      </div>
      @enderror
</div> --}}
<button type="submit" name="proses" value="simpan" class="btn btn-primary">Sewa</button>
</form>

<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
    $('.userbox').select2();
});
</script>
@endsection