@extends('webpanel.layouts.app')
@section('title', 'Tambah Sesi Konsultasi Bimbingan TA')
@section('content')
	    <div class="x_panel">
			<div class="x_title">
				<i>Buat Sesi Konsultasi</i>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<br />
				<center>
					<i>Buat Sesi Bimbingan Konsultasi</i>
					<p>
						{{$bimbingan->judul_ta}} <br>
						Oleh: <strong>{{$bimbingan->mahasiswa->nama_lengkap}}</strong>
					</p>
				</center>
				<form id="demo-form2" method="post" action="{{url('bimbingan-dosen/'.Request::segment(2))}}" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
					@csrf
					<input type="hidden" value="{{$bimbingan->mahasiswa->id}}" name="mahasiswa_id">
					<div class="item form-group">
						<div class="col-md-12 col-sm-12 ">
							<input type="text" id="sesi_konsultasi" placeholder="Sesi Konsultasi" name="sesi_konsultasi" required="required" class="form-control ">
						</div>
					</div>

					<div class="ln_solid"></div>
					<div class="item form-group">
						<div class="col-md-12 col-sm-12 offset-md-12">
							<button type="submit" class="btn btn-success btn-sm">Proses</button>
							<button class="btn btn-primary btn-sm" onclick="self.history.back()" type="reset">Batal</button>
						</div>
					</div>

				</form>
			</div>
		</div>
@endsection
@section('scripts')
<script>
  $(function () {
    $('.select2').select2({
          theme: "classic",
          maximumSelectionLength: 1,
    })
  })
</script>
@endsection