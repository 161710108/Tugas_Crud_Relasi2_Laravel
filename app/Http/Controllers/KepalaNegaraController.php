<?php

namespace App\Http\Controllers;

use App\Kepala_negara;
use Illuminate\Http\Request;
use Session;
class KepalaNegaraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
      public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $p = Kepala_negara::all();
        return view('kepala_negara.index',compact('p'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('kepala_negara.create');
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
       'nama' => 'required|unique:kepala_negaras|max:255',
       'masa_jabatan' => 'required|max:255',

]);
        $p = new Kepala_negara;
        $p->nama = $request->nama;
        $p->masa_jabatan = $request->masa_jabatan;
        $p->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menyimpan <b>$p->nama</b>"
        ]);
        return redirect()->route('kepala_negara.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kepala_negara  $kepala_negara
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $p = Kepala_negara::findOrFail($id);
        return view('kepala_negara.show',compact('p'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kepala_negara  $kepala_negara
     * @return \Illuminate\Http\Response
     */
  public function edit($id)
    {
        $p = Kepala_negara::findOrFail($id);
        return view('kepala_negara.edit',compact('p'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kepala_negara  $kepala_negara
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nama' => 'required|',
            'masa_jabatan' => 'required',

        ]);
        $p = Kepala_negara::findOrFail($id);
        $p->nama = $request->nama;
        $p->masa_jabatan = $request->masa_jabatan;
        $p->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil mengedit <b>$p->nama</b>"
        ]);
        return redirect()->route('kepala_negara.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kepala_negara  $kepala_negara
     * @return \Illuminate\Http\Response
     */
     public function destroy($id)
    {
        $p = Kepala_negara::findOrFail($id);
        $p->delete();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Data Berhasil dihapus"
        ]);
        return redirect()->route('kepala_negara.index');
    }
}
