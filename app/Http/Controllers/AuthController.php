<?php

namespace App\Http\Controllers;

use Auth;
use \App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class AuthController extends Controller
{
    public function login()
    {
    	return view('webpanel.login');
    }

    public function loginpost(Request $request)
    {
        if($request->status == 0){
            if(Auth::attempt($request->only('email', 'password'))){
                return redirect()->route('webpanel');
            }
        }elseif($request->status == 2){
            if(Auth::guard('mahasiswa')->attempt(['npm'=>$request['email'], 'password'=>$request['password']])){
                return redirect()->route('webpanel');
            }
        }elseif($request->status == 1){
            if(Auth::guard('dosen')->attempt(['nip'=>$request['email'], 'password'=>$request['password']])){
                return redirect()->route('webpanel');
            }
        }

    	return redirect()->route('login');
    }

    public function logout()
    {
        Auth::logout();
        Auth::guard('mahasiswa')->logout();
        Auth::guard('dosen')->logout();
    	return redirect()->route('login');
    }
}
