@extends('webpanel.layouts.app')
@section('title', 'Ubah Dosen')
@section('content')
	    <div class="x_panel">
			<div class="x_title">
				<h2>Form Ubah <small><i>Dosen</i></small></h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<br />
				<form id="demo-form2" method="post" action="{{route('dosen').'/'.$dosen->id}}" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
          			@method('PATCH')
					@csrf

					<div class="item form-group">
						<div class="col-md-12 col-sm-12 ">
							<input type="text" id="nip" name="nip" placeholder="NIP" value="{{$dosen->nip}}" required="required" class="form-control ">
						</div>
					</div>

					<div class="item form-group">
						<div class="col-md-12 col-sm-12 ">
							<input type="password" id="password" placeholder="Password (kosongkan jika tidak diganti)" name="password" class="form-control ">
						</div>
					</div>
					
					<div class="item form-group">
						<div class="col-md-12 col-sm-12 ">
							<input type="text" id="nama_lengkap" name="nama_lengkap" placeholder="Nama Lengkap" value="{{$dosen->nama_lengkap}}" required="required" class="form-control ">
						</div>
					</div>

					<div class="item form-group">
						<div class="col-md-12 col-sm-12 ">
							<input type="text" id="no_telp" value="{{$dosen->no_telp}}" placeholder="No. Telp" name="no_telp" required="required" class="form-control ">
						</div>
					</div>

					<div class="item form-group">
						<div class="col-md-12 col-sm-12 ">
							<input type="file" id="foto" name="foto">
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