<?php

namespace App\Http\Controllers;

use App\Berita;
use App\Journalist;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $beritas = Berita::with('Journalist')->paginate(9);
        return view('berita.index', ['beritas' => $beritas]);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jur = Journalist::all();
        return view('berita.create', compact('jur'));
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
            'berita' => 'required',
            'lokasi' => 'required',
            'kategori' => 'required',
            'jurnalis_id' => 'required'
        ]);
        Berita::create($request->all());
        return redirect('/berita')->with('status', 'Berita ' . $request->berita . ' berhasil ditambahkan!');
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
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jur = Journalist::all();
        $beritas = Berita::with('Journalist')->find($id);
        return view('berita.edit', compact('beritas', 'jur'));
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
            'berita' => 'required',
            'lokasi' => 'required',
            'kategori' => 'required',
            'jurnalis_id' => 'required'
        ]);
        Berita::where('id', $id)
            ->update([
                'berita' => $request->berita,
                'lokasi' => $request->lokasi,
                'kategori' => $request->kategori,
                'jurnalis_id' => $request->jurnalis_id
            ]);

        return redirect('/berita')->with('status', 'Berita ' . $request->berita . ' berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $beritas = Berita::find($id);
        Berita::destroy($id);
        return redirect('/berita')->with('status', 'Berita ' . $beritas->berita . ' berhasil dihapus!');
    }
}
