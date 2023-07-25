
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 align="center">Peminjaman</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table border="1" align="center" cellpadding="5">
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
            </tr>
            @endforeach
        </tbody>
    </thead>
</table>
</div>
        </div>
    </div>
