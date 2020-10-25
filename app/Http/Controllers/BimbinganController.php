<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Bimbingan;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use DB;

class BimbinganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bimbingan = Bimbingan::groupBy("mahasiswa_id")->get();
        $ugbimbingan = Bimbingan::all();
        $dbimbingan = array();
        foreach($ugbimbingan as $key => $val){
            $dbimbingan[$val->mahasiswa_id]["dosen"][] = array(
                "id" => $val->dosen->id,
                "nip" => $val->dosen->nip,
                "nama_lengkap" => $val->dosen->nama_lengkap,
            );
        }

        return view("webpanel.bimbingan.index", compact('bimbingan','dbimbingan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dosen = Dosen::all();
        $mahasiswa = Mahasiswa::all();
        return view('webpanel.bimbingan.create', compact('dosen','mahasiswa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        for($i=0; $i<count($request->dosen_id); $i++){
            Bimbingan::create([
                'mahasiswa_id' => $request->mahasiswa_id,
                'dosen_id' => $request->dosen_id[$i],
                'judul_ta' => $request->judul_ta,
                'semester' => $request->semester,
                'fakultas' => $request->fakultas,
                'tanggal_mulai' => $request->tanggal_mulai,
                'tanggal_akhir' => $request->tanggal_akhir,
            ]);
        }

        return redirect()->route('bimbingan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bimbingan  $bimbingan
     * @return \Illuminate\Http\Response
     */
    public function show(Bimbingan $bimbingan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bimbingan  $bimbingan
     * @return \Illuminate\Http\Response
     */
    public function edit(Bimbingan $bimbingan)
    {
        $dosen = Dosen::all();
        $mahasiswa = Mahasiswa::all();
        $bimbingan = Bimbingan::find($bimbingan->id);
        $gbimbingan = Bimbingan::where('mahasiswa_id', $bimbingan->mahasiswa_id)->get();
        
        $db = array();
        foreach($gbimbingan as $key => $val){
            $db[$val->mahasiswa_id]["dosen"][] = array(
                'id' => $val->dosen_id,
                'nip' => $val->dosen->nip,
                'nama_lengkap' => $val->dosen->nama_lengkap,
            );
        }

        return view('webpanel.bimbingan.edit', compact('bimbingan','gbimbingan','dosen','mahasiswa','db'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bimbingan  $bimbingan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bimbingan $bimbingan)
    {
        $i = 0;
        $org = Bimbingan::where('mahasiswa_id', $bimbingan->mahasiswa_id)->get();
        foreach($org as $key => $val){
            Bimbingan::where("mahasiswa_id", $bimbingan->mahasiswa_id)->where("id", $val->id)
            ->update([
                'mahasiswa_id' => $request->mahasiswa_id,
                'dosen_id' => $request->dosen_id[$i],
                'judul_ta' => $request->judul_ta,
                'semester' => $request->semester,
                'fakultas' => $request->fakultas,
                'tanggal_mulai' => $request->tanggal_mulai,
                'tanggal_akhir' => $request->tanggal_akhir
            ]);
            $i++;
        }

        return redirect()->route("bimbingan");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bimbingan  $bimbingan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bimbingan $bimbingan)
    {
        $b = Bimbingan::find($bimbingan->id);
        DB::table("bimbingan")->where('mahasiswa_id', $b->mahasiswa_id)->delete();
        return redirect()->back();
    }
}
