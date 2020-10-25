<?php

namespace App\Http\Controllers;

use Auth;
use \App\Models\Sesi;
use \App\Models\Bimbingan;
use \App\Models\Konsultasi;
use Illuminate\Http\Request;
use ZipArchive;


class BimbinganDosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bimbingan = Bimbingan::groupBy('mahasiswa_id')->where('dosen_id', Auth::guard('dosen')->user()->id)->get();
        return view('webpanel.bimbingan.dosen.index', compact('bimbingan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $bimbingan = Bimbingan::find($request->did);
        return view('webpanel.bimbingan.dosen.sesi.create', compact('bimbingan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Sesi::create([
            'bimbingan_id' => $request->did,
            'dosen_id' => Auth::guard("dosen")->user()->id,
            'mahasiswa_id' => $request->mahasiswa_id,
            'sesi_konsultasi' => $request->sesi_konsultasi,
        ]);

        return redirect("bimbingan-dosen/".$request->did);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bimbingan = Bimbingan::find($id);
        $sesi = Sesi::where('bimbingan_id', $id)->where('dosen_id', Auth::guard('dosen')->user()->id)->get();
        return view('webpanel.bimbingan.dosen.sesi.index', compact('bimbingan','sesi'));
    }

    public function konsultasi(Request $request)
    {
        $sesi = Sesi::find($request->sid);
        $konsultasi = Konsultasi::orderBy('id','DESC')->where('sesi_id', $request->sid)->get();
        return view('webpanel.bimbingan.dosen.sesi.konsultasi.index', compact('konsultasi','sesi'));
    }

    public function pkonsultasi(Request $request)
    {
        if(isset($request->lampiran)){
            foreach($request->lampiran as $a){
                $ext = $a->getClientOriginalExtension();
                $nameext = $a->getClientOriginalName();
                $file = $nameext;
                $a->move('uploads/', $file);
                $filex[] = $file;
            }
    
            $imp = implode(', ', $filex);
            konsultasi::create([
                'sesi_id' => $request->sid,
                'deskripsi' => $request->deskripsi,
                'lampiran' => $imp,
                'msg_status' => 1,
            ]);    
        }else{
            konsultasi::create([
                'sesi_id' => $request->sid,
                'deskripsi' => $request->deskripsi,
                'msg_status' => 1,
            ]);
        }
        
        return redirect()->back();
    }

    public function download(Request $request)
    {
        $zip = new ZipArchive();
        $zip_name = time().".zip"; // Zip name
        $zip->open('uploads/'.$zip_name,  ZipArchive::CREATE);
        $lampiran = Konsultasi::find($request->kid);
        $exp = explode(', ', $lampiran->lampiran);
        foreach($exp as $file){
            $path = "uploads/".$file;
            if(file_exists($path)){
                $zip->addFromString(basename($path),  file_get_contents($path));  
            }else{
                echo"file does not exist";
            }
        }

        $headers = array('Content-Type: application/pdf');
        $filename = array_reverse(explode('\\', $zip->filename))[0];
        $zip->close();
        return response()->download('uploads/'.$filename, $filename, $headers);
    }

    public function confirm(Request $request)
    {
        Sesi::where('id', $request->sid)
        ->update([
            'status' => 1
        ]);

        return redirect("bimbingan-dosen/".$request->did);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $bimbingan = Bimbingan::find($id);
        $sesi = Sesi::find($request->sid);
        return view('webpanel.bimbingan.dosen.sesi.edit', compact('sesi','bimbingan'));
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
        Sesi::where('id', $request->sid)
        ->update([
            'sesi_konsultasi' => $request->sesi_konsultasi,
        ]);

        return redirect("bimbingan-dosen/".$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Sesi::destroy($request->sid);
        return redirect()->back();
    }
}
