<?php

namespace App\Http\Controllers;

use App\Negara;
use App\Kepala_negara;
use Illuminate\Http\Request;
use Session;

class NegaraController extends Controller
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
        $n = Negara::with('kepala_negara')->get();
        return view('negara.index',compact('n'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $p = Kepala_negara::all();
        return view('negara.create',compact('p'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request,[
            'negara' => 'required|unique:negaras',
            'jumlah_penduduk' => 'required',
            'id_kepala_negara' => 'required|unique:negaras'
        ]);
        $n = new Negara;
        $n->negara = $request->negara;
        $n->jumlah_penduduk = $request->jumlah_penduduk;
        $n->id_kepala_negara = $request->id_kepala_negara;
        $n->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menyimpan <b>$n->nama</b>"
        ]);
        return redirect()->route('negara.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Negara  $negara
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $n = Negara::findOrFail($id);
        return view('negara.show',compact('n'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Negara  $negara
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $n = Negara::findOrFail($id);
        $p = Kepala_negara::all();
        $selectedK = Negara::findOrFail($id)->id_kepala_negara;
        return view('negara.edit',compact('p','n','selectedK'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Negara  $negara
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $this->validate($request,[
           'negara' => 'required',
            'jumlah_penduduk' => 'required',
            'id_kepala_negara' => 'required'
        ]);
        $n = Negara::findOrFail($id);
        $n->negara = $request->negara;
        $n->jumlah_penduduk = $request->jumlah_penduduk;
        $n->id_kepala_negara = $request->id_kepala_negara;
        $n->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil mengedit <b>$n->negara</b>"
        ]);
        return redirect()->route('negara.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Negara  $negara
     * @return \Illuminate\Http\Response
     */
     public function destroy($id)
    {
        $n = Negara::findOrFail($id);
        $n->delete();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Data Berhasil dihapus"
        ]);
        return redirect()->route('negara.index');
    }
}
