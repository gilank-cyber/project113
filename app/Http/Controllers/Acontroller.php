<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Exam;

class Acontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exams = Exam::paginate(9);
        // return view('exam.index', compact('exams'));
        return view('exam.index', ['exams' => $exams]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('exam.create');
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
            'judul_13' => 'required',
            'abstrak_13' => 'required'
        ]);
        Exam::create($request->all());
        return redirect('/exam')->with('status', 'Exam ' . $request->judul_13 . ' berhasil ditambahkan!');
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
        $exams = Exam::find($id);
        return view('exam.edit', compact('exams'));
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
            'judul_13' => 'required',
            'abstrak_13' => 'required'
        ]);
        Exam::where('id', $id)
            ->update([
                'judul_13' => $request->judul_13,
                'abstrak_13' => $request->abstrak_13
            ]);

        return redirect('/exam')->with('status', 'Exam ' . $request->judul_13 . ' berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $exams = Exam::find($id);
        Exam::destroy($id);
        return redirect('/exam')->with('status', 'Exam ' . $exams->judul_13 . ' berhasil dihapus!');
    }
}
