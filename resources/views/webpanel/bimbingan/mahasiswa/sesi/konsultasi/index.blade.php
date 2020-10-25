@extends('webpanel.layouts.app')
@section('title', 'Sesi Bimbingan TA')
@section('content')
	    <div class="x_panel">
		<div class="bs-example" data-example-id="simple-jumbotron">
			<div class="jumbotron" style="padding:15px;">
				<h3>Bimbingan:</h3>
				<p>{{$sesi->sesi_konsultasi}}</p>
			</div>
		</div>
		<ul class="list-unstyled timeline">
			@foreach($konsultasi as $k)
				@if($k->msg_status == 2)
					<li>
						<div class="block">
						<div class="tags">
							<a href="" class="badge badge-info">
							<span>{{$k->sesi->bimbingan->mahasiswa->nama_lengkap}}</span>
							</a>
						</div>
						<div class="block_content">
							
							<div class="byline">
							<span>{{$k->created_at->diffForHumans()}}</span> oleh <a>{{$k->sesi->bimbingan->mahasiswa->nama_lengkap}}</a>
							</div>
							<p class="excerpt">
								{{$k->deskripsi}} <br>
								@if($k->lampiran != "")
								<span class='badge badge-danger'>
								<a target="_blank" href="{{url('bimbingan-mahasiswa/'.Request::segment(2).'/'.Request::segment(3).'/'.Request::segment(4).'/dosen/'.Request::segment(6).'/konsultasi/'.$k->id)}}" style='color:#FFF'>Download Lampiran</a>
								</span>
								@endif
							</p>
						</div>
						</div>
					</li>
				@elseif($k->msg_status == 1)
					<li>
						<div class="block">
						<div class="tags">
							<a href="" class="badge badge-warning">
							<span>{{$k->sesi->bimbingan->dosen->nama_lengkap}}</span>
							</a>
						</div>
						<div class="block_content">
							
							<div class="byline">
							<span>{{$k->created_at->diffForHumans()}}</span> oleh <a>{{$k->sesi->bimbingan->dosen->nama_lengkap}}</a>
							</div>
							<p class="excerpt">
								{{$k->deskripsi}} <br>
								@if($k->lampiran != "")
								<span class='badge badge-danger'>
								<a target="_blank" href="{{url('bimbingan-mahasiswa/'.Request::segment(2).'/'.Request::segment(3).'/'.Request::segment(4).'/dosen/'.Request::segment(6).'/konsultasi/'.$k->id)}}" style='color:#FFF'>Download Lampiran</a>
								</span>
								@endif
							</p>
						</div>
						</div>
					</li>
				@endif
			@endforeach
		</ul>
		@if($sesi->status == 0)
			<form id="demo-form2" method="post" action="{{url('bimbingan-mahasiswa/'.Request::segment(2).'/'.Request::segment(3).'/'.Request::segment(4).'/dosen/'.Request::segment(6).'/konsultasi')}}" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
				@csrf

				<div class="item form-group">
					<div class="col-md-12 col-sm-12 ">
						<textarea name="deskripsi" id="" required='required' class="form-control"></textarea>
					</div>
				</div>
				<div class="item form-group">
					<div class="col-md-12 col-sm-12 ">
						<input type="file" name="lampiran[]" multiple class="">
					</div>
				</div>
				<div class="ln_solid"></div>
				<div class="item form-group">
					<div class="col-md-12 col-sm-12 offset-md-12">
						<button type="submit" class="btn btn-success btn-sm">Kirim Pesan</button>
						<button class="btn btn-primary btn-sm" onclick="self.history.back()" type="reset">Batal</button>
					</div>
				</div>
			</form>
		@else
			<form id="demo-form2" method="post" data-parsley-validate class="form-horizontal form-label-left">
				<button class="btn btn-info btn-sm" onclick="self.history.back()" type="button" style="width:100%">Sesi Konsultasi ini sudah selesai, tekan untuk kembali</button>	
			</form>
		@endif
		
	</div>
@endsection