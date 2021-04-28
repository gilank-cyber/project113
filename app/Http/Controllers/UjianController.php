<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Ujian;


class UjianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ujian = Ujian::paginate(9);
        return view('ujian.index', ['ujian' => $ujian]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ujian.create');
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
            'nama_mk' => 'required',
            'dosen' => 'required',
            'jumlah_soal' => 'required',
            'keterangan' => 'required'
        ]);
        Ujian::create($request->all());
        return redirect('/ujian')->with('status', 'Ujian ' . $request->nama_mk . ' berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
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
        $ujian = Ujian::find($id);
        return view('ujian.edit', compact('ujian'));
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
            'nama_mk' => 'required',
            'dosen' => 'required',
            'jumlah_soal' => 'required',
            'keterangan' => 'required'
        ]);
        Ujian::where('id', $id)
            ->update([
                'nama_mk' => $request->nama_mk,
                'dosen' => $request->dosen,
                'jumlah_soal' => $request->jumlah_soal,
                'keterangan' => $request->keterangan
            ]);

        return redirect('/ujian')->with('status', 'Ujian ' . $request->nama_mk . ' berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ujian = Ujian::find($id);
        Ujian::destroy($id);
        return redirect('/ujian')->with('status', 'Ujian ' . $ujian->nama_mk . ' berhasil dihapus!');
    }
}
