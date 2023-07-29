@extends('layouts.index')

@section('content')

<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="/beranda">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ url('/peminjaman')}}">Peminjaman</a></li>
    <li class="breadcrumb-item">Konfirmasi</li>
    </ol>
    
<form method="POST" action="{{ route('peminjaman.update',$ar_pinjam->id)}}">

@csrf
@method('put')

{{-- <div class="form-group">
    <label>No</label>
    <input type="hidden" name="id" value="{{ $ar_pinjam->id }}" class="form-control">
</div> --}}
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" value="{{ $ar_pinjam->user->name }}" class="form-control" disabled>
        </div>
        <div class="form-group">
            <label>Barang</label>
            <input type="text" name="barang" value="{{ $ar_pinjam->barang->nama}}" class="form-control" disabled>
        </div>
        <div class="form-group">
            <label>QTY</label>
            <input type="text" name="qty" value="{{ $ar_pinjam->qty }}" class="form-control" disabled>
        </div>
        <div class="form-group">
            <label>Tanggal Pinjam</label>
            <input type="date" name="tgl_pinjam" value="{{ $ar_pinjam->tgl_pinjam }}" class="form-control " disabled >
        </div>
        <div class="form-group">
            <label>Tanggal Kembali</label>
            <input type="date" name="tgl_kembali" value="{{ $ar_pinjam->tgl_kembali }}" class="form-control" disabled >
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>Tanggal Pengembalian</label>
            <input type="text" name="tgl_pengembalian" value="{{date("d/m/Y")}}" class="form-control" readonly>
        </div>
        <div class="form-group">
            <label for="denda_id" class="form-label">Denda</label>
            <select class="form-control userbox @error('denda') is-invalid @enderror" name="denda" id="denda" >
                <option value="" selected disabled>--- Pilih Denda ---</option>
                @foreach($ar_denda as $denda)
                <option value="{{ $denda->id}}">{{ $denda->jenis }}</option>
                 @endforeach
                </select>
              @error('denda')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
              @enderror
        </div>
        <div class="form-group">
            <label>Tarif</label>
            <input type="text" name="tarif" id="tarif" class="form-control">
        </div>
    </div>
</div>

<div class="form-group">
    <label>Update Status</label>
    <select class="form-control @error ('status') is-invalid @enderror" name="status" >
        <option selected>--- Update Status ---</option>
        @foreach (['Pending', 'Dipinjam', 'Kembali'] as $item)
        <option value="{{ $item }}" {{ $item == $ar_pinjam->status ? 'selected' : ''}}>{{ $item }}</option>
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



<script type="text/javascript">
     $("#denda").on('change', function(){
        let id = {{ $ar_pinjam->id }};
        let pengembalian = new Date().toISOString().slice(0, 10);
        let denda = this.value;
        $.ajax({
            url: "/cekDenda",
            type: "POST",
            data: {
                id :id,
                "_token": "{{ csrf_token() }}",
                denda:denda,
                pengembalian:pengembalian,
            },
            success: function(response) {
               $('#tarif').val(response)
            },
        });    
    })
 </script>

@endsection
    
