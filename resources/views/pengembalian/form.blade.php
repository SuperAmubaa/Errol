@extends('layouts.index')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@php
$rs1 = App\Models\Peminjaman::all();   
$rs2 = App\Models\Denda::all();   

@endphp

<h3>Pengembalian Barang</h3>
<form method="POST" action="{{ route('pengembalian.store')}}" >
    @csrf
<div class="form-group">
    <label for="peminjaman" class="form-label">Nama Penyewa</label>
    <select class="form-control  @error('peminjaman_id') is-invalid @enderror userbox" name="peminjaman_id" >
        <option value="">--- Pilih Nama Penyewa ---</option>
        @foreach($rs1 as $row)
        <option value="{{$row->id}}">{{$row->user_id}}</option>
        @endforeach
      </select>
      @error('peminjaman_id')
      <div class="invalid-feedback">
          {{ $message }}
      </div>
      @enderror
</div>
<div class="form-group">
    <label>Tanggal Kembali</label>
    <input type="date" name="tgl_kembali" value="{{old('tgl_kembali')}}" class="form-control @error('tgl_kembali') is-invalid @enderror " >
    @error('tgl_kembali')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>
<div class="form-group">
    <label for="denda_id" class="form-label">Denda</label>
    <select class="form-control userbox @error('denda_id') is-invalid @enderror" name="denda_id" >
        <option value="">--- Pilih Denda ---</option>
        @foreach($rs2 as $dn)
        <option value="{{$dn->id}}">{{$dn->jenis}}</option>
        @endforeach
      </select>
      @error('denda_id')
      <div class="invalid-feedback">
          {{ $message }}
      </div>
      @enderror
</div>
<div class="form-group">
    <label>Tarif</label>
    <input type="text" name="tarif" value="" class="form-control">
</div>

<button type="submit" name="proses" value="simpan" class="btn btn-primary">Tambah Pengembalian</button>
</form>

<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
    $('.userbox').select2();
});
</script>
@endsection