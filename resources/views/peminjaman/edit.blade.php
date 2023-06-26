@extends('layouts.index')

@section('content')
@php
$pj1 = App\Models\Peminjaman::all();   
@endphp

<h3>Update Status</h3>
@foreach($data as $pj)
<form method="POST" action="{{ route('peminjaman.update',$pj->id)}}">
@csrf
@method('put')
<div class="form-group">
    <label>No</label>
    <input type="text" name="id" value="{{ $pj->id }}" class="form-control">
</div>
{{-- <div class="form-group">
    <label>Nama Penyewa</label>
    <input type="text" name="nama" value="{{ $pj->user_id }}" class="form-control">
</div> --}}
<div class="form-group">
    <label>Update Status</label>
    <select class="form-control @error ('status') is-invalid @enderror" name="status" >
        <option selected>--- Update Status ---</option>
        @foreach (['pending', 'dipinjam', 'kembali'] as $item)
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