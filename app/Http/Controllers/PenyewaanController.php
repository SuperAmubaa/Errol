<?php

namespace App\Http\Controllers;


use App\Models\Barang;
use App\Models\Peminjaman;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
// use App\Models\User;
// use App\Models\Barang;
// use App\Models\Peminjaman;

class PenyewaanController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $users = User::all();
        // return view('penyewaan.index');

        $ar_pinjam = Peminjaman::all();

        return view('penyewaan.index', compact('ar_pinjam'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $user = User::all();
        // $barang = Barang::all();
        // $piminjaman = Peminjaman::all();
        // return view('peminjaman.create', $data);

        return view('penyewaan.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $barangs = DB::table('barang')->where('id', $request->barang_id)->get();

        if ($barangs) {
            $current_user = Auth::user()->id;
            $rent_date = Carbon::now()->toDateString();
            if ($rent_date < $request->tgl_kembali) {
                DB::table('peminjaman')->insert(
                    [
                        'id' => $request->id,
                        'user_id' => $current_user,
                        'barang_id' => $request->barang_id,
                        'qty' => $request->qty,
                        'tgl_pinjam' => $rent_date,
                        'tgl_kembali' => $request->tgl_kembali,

                    ]
                );

                $stok_now = $barangs->first()->stok;
                $stok_new = $stok_now - $request->qty;

                DB::table('barang')->where('id', $request->barang_id)->update([
                    'stok' => $stok_new
                ]);
            } else {
                return redirect('/penyewaan')->with('error', 'Tanggal Tidak Sesuai!');
            }
            return redirect('/penyewaan')->with('success', 'Penyewaan Barang Berhasil Dilakukan! Silahkan Ambil Barang Di Toko!');
        } else {
            return redirect('/penyewaan')->with('error', 'Barang Yang Anda Sewa Tidak Ditemukan!');
        }
    }

    public function riwayatPesanan()
    {
        $current_user = Auth::user();

        $ar_pinjam = Peminjaman::where('user_id', $current_user->id)->get();
        return view('penyewaan.riwayat', compact('ar_pinjam'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ar_pinjam = DB::table('peminjaman')
            ->join('users', 'users.id', '=', 'peminjaman.user_id')
            ->join('barang', 'barang.id', '=', 'peminjaman.barang_id')
            ->select('peminjaman.*', 'users.name AS us', 'barang.nama AS br')

            ->where('users.id', '=', $id)
            ->get();

        return view(
            'penyewaan.show',
            compact('ar_pinjam')
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
