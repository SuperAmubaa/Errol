@extends('layouts.index')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
   
      <ol class="breadcrumb mb-4">
          <li class="breadcrumb-item"><a href="/beranda">Dashboard</a></li>
          <li class="breadcrumb-item">Riwayat Pesanan</li>
      </ol>
  
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
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
            <th>Action</th>

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
                    @elseif('kembali')
                    <a class="badge text-white bg-info"> Kembali
                    </a>
                   @endif
                </td>
                <td>{{ $pj->tgl_pengembalian }}</td>
                <td>{{ $pj->denda_id }}</td>
                <td>{{ $pj->tarif }}</td>
                <td>
                    <a class="btn btn-info" href="{{route('penyewaan.show',$pj->id)}}">Detail</a> 
                </td>
            </tr>
            @endforeach
        </tbody>
    </thead>
</table>
</div>
        </div>
    </div>
  

@endsection