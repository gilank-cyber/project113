<?php

namespace App\Http\Controllers;

use App\Journalist;
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
}
