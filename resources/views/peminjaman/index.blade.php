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
                <td>
                    @if($pj->status == 'pending')
                    <a class="badge text-white bg-danger"> Pending
                    </a>
                    @elseif($pj->status == 'dipinjam')
                    <a class="badge text-white bg-primary"> Dipinjam
                    </a>
                    @elseif($pj->status == 'kembali')
                    <a class="badge text-white bg-info"> Kembali
                    </a>
                   @endif
                </td>
                <td>{{ $pj->tgl_pengembalian == '0000-00-00' ? "" : $pj->tgl_pengembalian }}</td>
                <td>
                    @if ($pj->denda == 1)
                Tidak Ada Denda
                @elseif($pj->denda == 2)
                Keterlambatan
                @elseif($pj->denda == 3)
                Kerusakan
                @elseif($pj->denda == 4)
                Kehilangan
                @endif
                </td>
                <td>Rp.{{ $pj->tarif }}</td>
                <td>
                    @if($pj->status == 'kembali')
                    @else
                    <a class="btn btn-primary" href="{{ route ('peminjaman.edit',$pj->id)}}">Konfirmasi</a> 
                    @endif
                    {{-- tombol --}}
                     
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