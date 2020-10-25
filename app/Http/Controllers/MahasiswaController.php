<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mahasiswa = Mahasiswa::all();
        return view('webpanel.mahasiswa.index', compact('mahasiswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('webpanel.mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ext = $request->file('foto')->getClientOriginalExtension();
        $image = time().'.'.$ext;
        $request->file('foto')->move('uploads/', $image);

        Mahasiswa::create([
            'npm' => $request->npm,
            'password' => bcrypt($request->password),
            'nama_lengkap' => $request->nama_lengkap,
            'no_telp' => $request->no_telp,
            'foto' => $image,
        ]);

        return redirect()->route('mahasiswa');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        $mahasiswa = Mahasiswa::find($mahasiswa->id);
        return view('webpanel.mahasiswa.edit', compact('mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $mahasiswas = Mahasiswa::find($mahasiswa->id);
        $password = (empty($request->password) ? $mahasiswa->password : bcrypt($request->password));
        
        if(isset($request->foto)){
            $ext = $request->file('foto')->getClientOriginalExtension();
            $image = time().'.'.$ext;
            $request->file('foto')->move('uploads/', $image);

            Mahasiswa::where('id', $mahasiswa->id)
            ->update([
                'npm' => $request->npm,
                'password' => $password,
                'nama_lengkap' => $request->nama_lengkap,
                'no_telp' => $request->no_telp,
                'foto' => $image,
            ]);
        }else{
            Mahasiswa::where('id', $mahasiswa->id)
            ->update([
                'npm' => $request->npm,
                'password' => $password,
                'nama_lengkap' => $request->nama_lengkap,
                'no_telp' => $request->no_telp,
            ]);
        }

        return redirect()->route('mahasiswa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        Mahasiswa::destroy($mahasiswa->id);
        return redirect()->back();
    }
}
