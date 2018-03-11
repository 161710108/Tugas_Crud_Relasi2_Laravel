<?php

namespace App\Http\Controllers;

use App\Pulau;
use App\Negara;
use Illuminate\Http\Request;
use Session;

class PulauController extends Controller
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
        $u = Pulau::with('Negara')->get();
        return view('pulau.index',compact('u'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $n = Negara::all();
        return view('pulau.create',compact('n'));
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
            'nama_pulau' => 'required|unique:pulaus',
            'luas' => 'required|',
            'id_negara' => 'required'
        ]);
        $u = new Pulau;
        $u->nama_pulau = $request->nama_pulau;
        $u->luas = $request->luas;
        $u->id_negara = $request->id_negara;
        $u->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menyimpan <b>$u->nama_pulau</b>"
        ]);
        return redirect()->route('pulau.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pulau  $pulau
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $u = Pulau::findOrFail($id);
        return view('pulau.show',compact('u'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pulau  $pulau
     * @return \Illuminate\Http\Response
     */
 public function edit($id)
    {
        $u = Pulau::findOrFail($id);
        $n = Negara::all();
        $selectedN = Pulau::findOrFail($id)->id_negara;
        return view('pulau.edit',compact('u','n','selectedN'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pulau  $pulau
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
           'nama_pulau' => 'required|',
            'luas' => 'required|',
            'id_negara' => 'required'
        ]);
        $u = Pulau::findOrFail($id);
        $u->nama_pulau = $request->nama_pulau;
        $u->luas = $request->luas;
        $u->id_negara = $request->id_negara;
        $u->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil mengedit <b>$u->nama_pulau</b>"
        ]);
        return redirect()->route('pulau.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pulau  $pulau
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $u = Pulau::findOrFail($id);
        $u->delete();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Data Berhasil dihapus"
        ]);
        return redirect()->route('pulau.index');
    
    }
}
