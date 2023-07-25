@extends('layouts.index')

@section('content')
@php
$rs = App\Models\Denda::all();   
@endphp

<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="/beranda">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ url('/peminjaman')}}">Peminjaman</a></li>
    <li class="breadcrumb-item">Konfirmasi</li>
    </ol>
@foreach($ar_pinjam as $pj)
<form method="POST" action="{{ route('peminjaman.update',$pj->id)}}">
@csrf
@method('put')
{{-- <div class="form-group">
    <label>No</label>
    <input type="text" name="id" value="{{ $pj->id }}" class="form-control">
</div> --}}
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>Nama Penyewa</label>
            <input type="text" name="nama" value="{{ $pj->user->name }}" class="form-control" disabled>
        </div>
        <div class="form-group">
            <label>Barang</label>
            <input type="text" name="barang" value="{{ $pj->barang->nama }}" class="form-control" disabled>
        </div>
        <div class="form-group">
            <label>QTY</label>
            <input type="text" name="qty" value="{{ $pj->qty }}" class="form-control" disabled>
        </div>
        <div class="form-group">
            <label>Tanggal Pinjam</label>
            <input type="date" name="tgl_pinjam" value="{{ $pj->tgl_pinjam }}" class="form-control " disabled >
        </div>
        <div class="form-group">
            <label>Tanggal Kembali</label>
            <input type="date" name="tgl_kembali" value="{{ $pj->tgl_kembali }}" class="form-control" disabled >
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>Tanggal Pengembalian</label>
            <input type="date" name="tgl_pengembalian" value="" class="form-control " >
        </div>
        <div class="form-group">
            <label for="denda_id" class="form-label">Denda</label>
            <select class="form-control userbox @error('denda') is-invalid @enderror" name="denda" >
                <option value="">--- Pilih Denda ---</option>
                <option value="Tidak Ada Denda">Tidak ada Denda</option>
                <option value="Keterlambatan">Keterlambatan</option>
                <option value="Kerusakan">Kerusakan</option>
                <option value="Kehilangan">Kehilangan</option>
              </select>
              @error('denda')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
              @enderror
        </div>
        <div class="form-group">
            <label>Tarif</label>
            <input type="text" name="tarif" value="" class="form-control">
        </div>
    </div>
</div>

<div class="form-group">
    <label>Update Status</label>
    <select class="form-control @error ('status') is-invalid @enderror" name="status" >
        <option selected>--- Update Status ---</option>
        @foreach (['Pending', 'Dipinjam', 'Kembali'] as $item)
        <option value="{{ $item }}" {{ $item == $pj->status ? 'selected' : ''}}>{{ $item }}</option>
        @endforeach
      </select>
      @error('status')
      <div class="invalid-feedback">
            {{ $message}}
      </div>
      @enderror
</div>

<button type="submit" name="proses" value="simpan" class="btn btn-primary">Konfirmasi Status</button>
</form>
@endforeach
@endsection