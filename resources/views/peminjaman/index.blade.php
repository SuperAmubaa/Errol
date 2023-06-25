@extends('layouts.index')

@section('content')
    
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Peminjaman</h1>
  
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
            <th>No</th>
            <th>Nama Peminjam</th>
            <th>Barang</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th>
            <th>Status</th>
            <th>Konfirmasi</th>

        </tr>
        <tbody>
            @foreach($ar_pinjam as $pj)
            <tr>
                <td>{{ $pj->id}}</td>
                <td>{{ $pj->us }}</td>
                <td>{{ $pj->br }}</td>
                <td>{{ $pj->tgl_pinjam }}</td>
                <td>{{ $pj->tgl_kembali }}</td>
                <td>{{ $pj->status }}</td>
                <td>
                    {{-- tombol --}}
                    <a class="btn btn-primary" href="{{ url ('peminjaman/status',$pj->id)}}">Kembali</a>  
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