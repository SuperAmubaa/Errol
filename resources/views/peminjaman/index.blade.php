@extends('layouts.index')

@section('content')
@include('sweetalert::alert')
<div class="container-fluid">

    <!-- Page Heading -->
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="/beranda">Dashboard</a></li>
        <li class="breadcrumb-item">Peminjaman</li>
    </ol>
  
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header col-auto py-3">
            <a class="btn btn-info" href="{{ url('/exportpeminjaman')}}">Export Excel</a>  
             <a class="btn btn-danger" href="{{ url ('peminjaman-pdf')}}">Export PDF</a>  
        </div>
       
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
            <th>No</th>
            <th>Penyewa</th>
            <th>Barang</th>
            <th>QTY</th>
            <th>Pinjam</th>
            <th>Kembali</th>
            <th>Status</th>
            <th>Return</th>
            <th>Denda</th>
            <th>Tarif</th>
            <th>Konfirmasi</th>

        </tr>
        <tbody>
            @foreach($ar_pinjam as $pj)
            <tr>
                <td>{{ $loop->iteration}}</td>
                <td>{{ $pj->user->name }}</td>
                <td>{{ $pj->barang->nama }}</td>
                <td>{{ $pj->qty}}</td>
                <td>{{ $pj->tgl_pinjam }}</td>
                <td>{{ $pj->tgl_kembali }}</td>
                <td>{{ $pj->status }}</td>
                <td>{{ $pj->tgl_pengembalian }}</td>
                <td>{{ $pj->denda }}</td>
                <td>{{ $pj->tarif }}</td>
                <td>
                    {{-- tombol --}}
                    <a class="btn btn-primary" href="{{ route ('peminjaman.edit',$pj->id)}}">Konfirmasi</a>  
                </td>
                
            </tr>
            @endforeach
        </tbody>
    </thead>
</table>
</div>
        </div>
    </div>
    {{-- <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script> --}}
{{-- <script>
    $(.'status').change(function(){
        var status = $(this).val();
        var stt = status.substr(13,10);
        
        $.ajax({
            url:"{{ route('peminjaman.update_status') }}",
            method : "post"
            data: {stt:stt}
        });

    });
</script> --}}

@endsection