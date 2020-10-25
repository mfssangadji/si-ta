<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// All User
Route::get('login', 'AuthController@login')->name('login');
Route::post('loginpost', 'AuthController@loginpost')->name('loginpost');
Route::get('logout', 'AuthController@logout')->name('logout');

Route::get('/', function () {
    return redirect()->route('login');
});

// Route::group(['middleware' => ['auth','guest']], function(){
    Route::get(config('app.root').'/webpanel', function () {
        // return Auth::guard('mahasiswa')->check();
        // return Auth::guard('mahasiswa')->user()->nama_lengkap;
        $informasi = \App\Models\Informasi::latest()->get()->first();
        return view('webpanel.dashboard', compact('informasi'));
    })->name('webpanel');

    Route::resource('users', 'UsersController', [
        'names' => [
            'index' => 'users',
            'create' => 'users.create',
            'store' => 'users.store',
        ]
    ]);

    Route::resource('dosen', 'DosenController', [
        'names' => [
            'index' => 'dosen',
            'create' => 'dosen.create',
            'store' => 'dosen.store',
        ]
    ]);

    Route::resource('mahasiswa', 'MahasiswaController', [
        'names' => [
            'index' => 'mahasiswa',
            'create' => 'mahasiswa.create',
            'store' => 'mahasiswa.store',
        ]
    ]);

    Route::resource('bimbingan', 'BimbinganController', [
        'names' => [
            'index' => 'bimbingan',
            'create' => 'bimbingan.create',
            'store' => 'bimbingan.store',
        ]
    ]);

    Route::resource('informasi', 'InformasiController', [
        'names' => [
            'index' => 'informasi',
            'create' => 'informasi.create',
            'store' => 'informasi.store',
        ]
    ]);

    Route::resource('profil', 'ProfilController', [
        'names' => [
            'index' => 'profil',
            'create' => 'profil.create',
            'store' => 'profil.store',
        ]
    ]);

    // Dosen
    Route::get('bimbingan-dosen/{did}/create', 'BimbinganDosenController@create');
    Route::post('bimbingan-dosen/{did}', 'BimbinganDosenController@store');
    Route::delete('bimbingan-dosen/{did}/{sid}', 'BimbinganDosenController@destroy');
    Route::get('bimbingan-dosen/{did}/{sid}/edit', 'BimbinganDosenController@edit');
    Route::patch('bimbingan-dosen/{did}/{sid}', 'BimbinganDosenController@update');
    Route::get('bimbingan-dosen/{did}/{sid}/konsultasi', 'BimbinganDosenController@konsultasi');
    Route::post('bimbingan-dosen/{did}/{sid}/konsultasi', 'BimbinganDosenController@pkonsultasi');
    Route::post('bimbingan-dosen/{did}/{sid}/konsultasi/confirm', 'BimbinganDosenController@confirm');
    Route::get('bimbingan-dosen/{did}/{sid}/konsultasi/{kid}', 'BimbinganDosenController@download');
    Route::resource('bimbingan-dosen', 'BimbinganDosenController', [
        'names' => [
            'index' => 'bimbingan-dosen',
            'create' => 'bimbingan-dosen.create',
            'store' => 'bimbingan-dosen.store',
        ]
    ]);

    // Mahasiswa
    Route::get('bimbingan-mahasiswa/{mid}/{no}/{did}/dosen', 'BimbinganMahasiswaController@bimbingan');
    // mid = bid
    Route::get('bimbingan-mahasiswa/{mid}/{no}/{did}/dosen/{sid}/konsultasi', 'BimbinganMahasiswaController@konsultasi');
    Route::post('bimbingan-mahasiswa/{mid}/{no}/{did}/dosen/{sid}/konsultasi', 'BimbinganMahasiswaController@pkonsultasi');
    Route::get('bimbingan-mahasiswa/{mid}/{no}/{did}/dosen/{sid}/konsultasi/{kid}', 'BimbinganMahasiswaController@download');
    Route::resource('bimbingan-mahasiswa', 'BimbinganMahasiswaController', [
        'names' => [
            'index' => 'bimbingan-mahasiswa',
            'create' => 'bimbingan-mahasiswa.create',
            'store' => 'bimbingan-mahasiswa.store',
        ]
    ]);
// });
