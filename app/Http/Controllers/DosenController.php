<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dosen = Dosen::all();
        return view('webpanel.dosen.index', compact('dosen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('webpanel.dosen.create');
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

        Dosen::create([
            'nip' => $request->nip,
            'password' => bcrypt($request->password),
            'nama_lengkap' => $request->nama_lengkap,
            'no_telp' => $request->no_telp,
            'foto' => $image,
        ]);

        return redirect()->route('dosen');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function show(Dosen $dosen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function edit(Dosen $dosen)
    {
        $dosen = Dosen::find($dosen->id);
        return view('webpanel.dosen.edit', compact('dosen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dosen $dosen)
    {
        $dosens = Dosen::find($dosen->id);
        $password = (empty($request->password) ? $dosen->password : bcrypt($request->password));
        
        if(isset($request->foto)){
            $ext = $request->file('foto')->getClientOriginalExtension();
            $image = time().'.'.$ext;
            $request->file('foto')->move('uploads/', $image);

            Dosen::where('id', $dosen->id)
            ->update([
                'nip' => $request->nip,
                'password' => $password,
                'nama_lengkap' => $request->nama_lengkap,
                'no_telp' => $request->no_telp,
                'foto' => $image,
            ]);
        }else{
            Dosen::where('id', $dosen->id)
            ->update([
                'nip' => $request->nip,
                'password' => $password,
                'nama_lengkap' => $request->nama_lengkap,
                'no_telp' => $request->no_telp,
            ]);
        }

        return redirect()->route('dosen');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dosen $dosen)
    {
        Dosen::destroy($dosen->id);
        return redirect()->back();
    }
}
