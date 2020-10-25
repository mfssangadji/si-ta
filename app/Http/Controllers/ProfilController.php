<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::guard('dosen')->check()){
            $user = Dosen::find(Auth::guard('dosen')->user()->id);
        }elseif(Auth::guard('mahasiswa')->check()){
            $user = Mahasiswa::find(Auth::guard('mahasiswa')->user()->id);
        }

        return view('webpanel.profil.create', compact('user'));
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
        if(Auth::guard('dosen')->check()){
            $password = (empty($request->password) ? Auth::guard('dosen')->user()->password : bcrypt($request->password));
            
            if(isset($request->foto)){
                $ext = $request->file('foto')->getClientOriginalExtension();
                $image = time().'.'.$ext;
                $request->file('foto')->move('uploads/', $image);

                Dosen::where('id', Auth::guard('dosen')->user()->id)
                ->update([
                    'nip' => $request->nip,
                    'password' => $password,
                    'nama_lengkap' => $request->nama_lengkap,
                    'no_telp' => $request->no_telp,
                    'foto' => $image,
                ]);
            }else{
                Dosen::where('id', Auth::guard('dosen')->user()->id)
                ->update([
                    'nip' => $request->nip,
                    'password' => $password,
                    'nama_lengkap' => $request->nama_lengkap,
                    'no_telp' => $request->no_telp,
                ]);
            }
        }elseif(Auth::guard('mahasiswa')->check()){
            $password = (empty($request->password) ? Auth::guard('mahasiswa')->user()->password : bcrypt($request->password));
            
            if(isset($request->foto)){
                $ext = $request->file('foto')->getClientOriginalExtension();
                $image = time().'.'.$ext;
                $request->file('foto')->move('uploads/', $image);

                Mahasiswa::where('id', Auth::guard('mahasiswa')->user()->id)
                ->update([
                    'npm' => $request->npm,
                    'password' => $password,
                    'nama_lengkap' => $request->nama_lengkap,
                    'no_telp' => $request->no_telp,
                    'foto' => $image,
                ]);
            }else{
                Mahasiswa::where('id', Auth::guard('mahasiswa')->user()->id)
                ->update([
                    'npm' => $request->npm,
                    'password' => $password,
                    'nama_lengkap' => $request->nama_lengkap,
                    'no_telp' => $request->no_telp,
                ]);
            }
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
