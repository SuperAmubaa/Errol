@extends('layouts.index')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@php
$rs1 = App\Models\User::where('id', '=', 3 )->get();   
$rs2 = App\Models\Barang::all();   

@endphp

<h3>Sewa Barang</h3>
<form method="POST" action="{{ route('penyewaan.store')}}" >
    @csrf
<div class="form-group">
    <label for="user" class="form-label">Nama Penyewa</label>
    <select class="form-control  @error('user_id') is-invalid @enderror userbox" name="user_id" >
        <option value="">--- Pilih Nama Penyewa ---</option>
        @foreach($rs1 as $us)
        <option value="{{$us->id}}">{{$us->name}}</option>
        @endforeach
      </select>
      @error('user_id')
      <div class="invalid-feedback">
          {{ $message }}
      </div>
      @enderror
</div>
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
    <label>Tanggal Pinjam</label>
    <input type="date" name="tgl_pinjam" value="{{old('tgl_pinjam')}}" class="form-control @error('tgl_pinjam') is-invalid @enderror " >
    @error('tgl_pinjam')
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