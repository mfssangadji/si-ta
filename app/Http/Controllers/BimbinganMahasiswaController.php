<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Dosen;
use App\Models\Bimbingan;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Sesi;
use App\Models\Konsultasi;
use ZipArchive;

class BimbinganMahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gSQLbimbinganq = Bimbingan::groupBy('mahasiswa_id')->where('mahasiswa_id', Auth::guard('mahasiswa')->user()->id)->get();
        $SQLbimbinganq = Bimbingan::where('mahasiswa_id', Auth::guard('mahasiswa')->user()->id)->get();
        foreach($SQLbimbinganq as $key => $val){
            $dosen[$val->mahasiswa_id]["dosen"][] = array(
                'id' => $val->dosen->id,
                'nip' => $val->dosen->nip,
                'nama_lengkap' => $val->dosen->nama_lengkap,
            );
        }

        return view('webpanel.bimbingan.mahasiswa.index', compact('gSQLbimbinganq','SQLbimbinganq','dosen'));
    }

    public function bimbingan(Request $request)
    {
        $no = $request->no;
        $no_pembimbing = ($request->no == 0 ? "Pembimbing I" : "Pembimbing II");
        $dosen = Dosen::find($request->did);
        $sesi = Sesi::where('mahasiswa_id', auth()->guard('mahasiswa')->user()->id)->where('dosen_id', $request->did)->get();
        return view('webpanel.bimbingan.mahasiswa.sesi.index', compact(
                'dosen',
                'no_pembimbing',
                'sesi',
                'no',
            )
        );
    }

    public function konsultasi(Request $request)
    {
        $sesi = Sesi::find($request->sid);
        $konsultasi = Konsultasi::orderBy('id', 'DESC')->where('sesi_id', $request->sid)->get();
        return view('webpanel.bimbingan.mahasiswa.sesi.konsultasi.index', compact('sesi','konsultasi'));
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
                'msg_status' => 2,
            ]);    
        }else{
            konsultasi::create([
                'sesi_id' => $request->sid,
                'deskripsi' => $request->deskripsi,
                'msg_status' => 2,
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
