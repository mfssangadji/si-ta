@extends('webpanel.layouts.app')
@section('title', 'SI-TA')
@section('content')
    <div class="page-title">
        

      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>INFORMASI <small>Bimbingan Tugas Akhir</small></h2>
              
              <div class="clearfix"></div>
            </div>
            <div class="x_content">

              <div class="col-md-8 col-lg-8 col-sm-7">
                <!-- blockquote -->
                <blockquote>
                  <h4>{{$informasi->judul}}</h4>
                  <p>{!! $informasi->deskripsi !!}</p>
                </blockquote>
              </div>
              <div class="col-md-4 col-lg-4 col-sm-5">
                <h1>STMIK</h1>
                <h2>Tidore Mandiri</h2>
                <h3>Bimbingan Tugas Akhir</h3>
                <h1>Wisuda</h1>
                <h5>Sukses....</h5>
              </div>
              <div class="clearfix"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection