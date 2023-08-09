<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ar_barang = DB::table('barang')
            ->join('kategori', 'kategori.id', '=', 'barang.kategori_id')
            ->select('barang.*', 'kategori.name AS kat')

            ->get();
        return view('barang/index', compact('ar_barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('barang.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validasi = $request->validate(
            [
                'id' => 'unique:barang|min:4|max:4',
                'kategori_id' => 'required',
                'nama' => 'required',
                'stok' => 'required|numeric',
                'harga' => 'required|numeric',
                'beli' => 'required|numeric',
                'foto' => 'image|mimes:png,jpg|max:2048',

            ],
            [
                'id.required' => 'wajib diisi',
                'kategori_id.required' => 'wajib diisi',
                'nama.required' => 'wajib diisi',
                'stok.required' => 'wajib diisi',
                'harga.required' => 'wajib diisi',
                'beli.required' => 'wajib diisi',
                'foto.image' => 'Ekstensi FIle harus : jpg, png',
                'foto.max' => 'Ukuran File tidak boleh melebihi 2048 KB',
            ],
        );


        if (!empty($request->foto)) {
            $request->validate(
                [
                    'foto' => 'image|mimes:png,jpg|max:2048',
                ]
            );
            $fileName = $request->nama . '.'
                . $request->foto->extension();
            $request->foto
                ->move(public_path('images'), $fileName);
        } else {
            $fileName = '';
        }


        DB::table('barang')->insert(
            [
                'id' => $request->id,
                // 'foto'=>$request->foto,
                'kategori_id' => $request->kategori_id,
                'nama' => $request->nama,
                'stok' => $request->stok,
                'harga' => $request->harga,
                'beli' => $request->beli,
                'foto' => $fileName,
            ]
        );
        return redirect('/barang')->with('success', 'Barang Baru Berhasil di Tambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ar_barang = DB::table('barang')
            ->join('kategori', 'kategori.id', '=', 'barang.kategori_id')
            ->select('barang.*', 'kategori.name AS kat')

            ->where('barang.id', '=', $id)
            ->get();

        return view(
            'barang.show',
            compact('ar_barang')
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
        $data = DB::table('barang')->where('id', $id)
            ->get();

        return view(
            'barang/edit',
            compact('data')
        );
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

        if (!empty($request->foto)) {
            $request->validate(
                ['foto' => 'image|mimes:png,jpg|max:2048']
            );

            // $data_foto = barang::where('id',$id);
            // File::delete(public_path('foto'). '/'. $data_foto->foto);

            $fileName = $request->nama . '.' . $request->foto->extension();
            $request->foto->move(public_path('images'), $fileName);
        } else {
            $fileName = '';
        }



        DB::table('barang')->where('id', $id)->update(
            [
                'kategori_id' => $request->kategori_id,
                'nama' => $request->nama,
                'stok' => $request->stok,
                'harga' => $request->harga,
                'beli' => $request->beli,
                'foto' => $fileName,
            ]
        );
        return redirect('/barang')->with('success', 'Barang Berhasil di Ubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('barang')->where('id', $id)->delete();

        return redirect('/barang')->with('success', 'Barang Berhasil di Hapus!');
    }
}
