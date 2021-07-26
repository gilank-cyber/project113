<?php

namespace App\Http\Controllers;

use App\Journalist;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class JournalistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $journalists = Journalist::paginate(9);
        return view('jurnalis.index', ['journalists' => $journalists]);
    }

    public function tampil()
    {
        //Menampilkan Data berbentuk Json

        $journalists= Journalist::all();
        return response()->json($journalists);
    }
    //Menampilkan Data Berdasarkan Id
    public function shows($journalists)
    {
        $journalists = Journalist::where('id', $journalists)->get();
        return response()->json($journalists);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jurnalis.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jk' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required'
        ]);
        Journalist::create($request->all());
        return redirect('/journalist')->with('status', 'Journalist ' . $request->nama . ' berhasil ditambahkan!');
    }
    public function tambah(Request $request)
    {
        //Mengecek kondisi jika ada form yang tidak diisi maka tidak adan tersimpan datanya dan sebaliknya
        $validate = Validator::make($request->all(), [
            'nama' => 'required',
            'jk' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required'
            
        ]);
        if($validate->passes()) {
            $journalists = Journalist::create($request->all());
            return response()->json([
                'pesan' => 'Data Berhasil Disimpan',
                'data' => $journalists

            ]); 
            return Journalist::create($request->all());
        }
        return response()->json([
            'pesan' => 'Data Gagal Disimpan']);
    }

    public function ubah(Request $request, Journalist $journalists)
    {
        //Fungsi Untuk Mengubah data
        $journalists->update($request->all());
        return response()->json(['pesan' => 'Data berhasil diubah', 
        'data'=> $journalists]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $journalists = Journalist::find($id);
        return view('jurnalis.edit', compact('journalists'));
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
        $request->validate([
            'nama' => 'required',
            'jk' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required'
        ]);
        Journalist::where('id', $id)
            ->update([
                'nama' => $request->nama,
                'jk' => $request->jk,
                'no_hp' => $request->no_hp,
                'alamat' => $request->alamat
            ]);

            return redirect('/journalist')->with('status', 'Journalist ' . $request->nama . ' berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Journalist  $journalist
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $journalists = Journalist::find($id);
        Journalist::destroy($id);
        return redirect('/journalist')->with('status', 'Journalist ' . $journalists->nama . ' berhasil dihapus!');
    }
    public function hapus($journalists)
    {
        //Fungsi Menghapus data berdasarkan
        $data = Journalist::where('id', $journalists)->first();
        if (empty($data)){
            return response()->json(['pesan', 'Data tidak ditemukan'], 404);
        }
        $data->delete();
        return response()->json(['pesan'=> 'Data berhasil dihapus'],200);
    }
}
