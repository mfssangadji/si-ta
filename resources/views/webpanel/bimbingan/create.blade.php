@extends('webpanel.layouts.app')
@section('title', 'Tambah Bimbingan TA')
@section('content')
	    <div class="x_panel">
			<div class="x_title">
				<h2>Form Tambah <small><i>Bimbingan TA</i></small></h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<br />
				<form id="demo-form2" method="post" action="{{route('bimbingan')}}" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
					@csrf

					<div class="item form-group">
						<div class="col-md-12 col-sm-12 ">
							<label>Mahasiswa</label>
							<select class="form-control select2" multiple="multiple" id="mahasiswa_id" name="mahasiswa_id" data-placeholder="">
								@foreach($mahasiswa as $mahasiswa)
									<option value="{{$mahasiswa->id}}">(NPM: {{$mahasiswa->npm}}) {{$mahasiswa->nama_lengkap}}</option>
								@endforeach
							</select>
						</div>
					</div>

					<div class="item form-group">
						<div class="col-md-12 col-sm-12 ">
							<label>Pembimbing I</label>
							<select class="form-control select2" multiple="multiple" id="dosen_id1" name="dosen_id[]" data-placeholder="">
								@foreach($dosen as $dosen1)
									<option value="{{$dosen1->id}}">(NIP: {{$dosen1->nip}}) {{$dosen1->nama_lengkap}}</option>
								@endforeach
							</select>
						</div>
					</div>

					<div class="item form-group">
						<div class="col-md-12 col-sm-12 ">
							<label>Pembimbing II</label>
							<select class="form-control select2" multiple="multiple" id="dosen_id2" name="dosen_id[]" data-placeholder="">
								@foreach($dosen as $dosen2)
									<option value="{{$dosen2->id}}">(NIP: {{$dosen2->nip}}) {{$dosen2->nama_lengkap}}</option>
								@endforeach
							</select>
						</div>
					</div>

					<div class="item form-group">
						<div class="col-md-12 col-sm-12 ">
							<input type="text" id="judul_ta" placeholder="Judul TA" name="judul_ta" required="required" class="form-control ">
						</div>
					</div>

					<div class="item form-group">
						<div class="col-md-12 col-sm-12 ">
							<input type="text" id="semester" placeholder="Semester" name="semester" required="required" class="form-control ">
						</div>
					</div>

					<div class="item form-group">
						<div class="col-md-12 col-sm-12 ">
							<input type="text" id="fakultas" placeholder="Fakultas" name="fakultas" required="required" class="form-control ">
						</div>
					</div>
					
					<div class="item form-group">
						<div class="col-md-12 col-sm-12 ">
							<input id="birthday" name="tanggal_mulai" class="date-picker form-control" placeholder="Tanggal Mulai" type="text" required="required" type="text" onfocus="this.type='date'" onclick="this.type='date'" onmouseout="timeFunctionLong(this)">
						</div>
					</div>

					<div class="item form-group">
						<div class="col-md-12 col-sm-12 ">
							<input id="birthday2" name="tanggal_akhir" class="date-picker form-control" placeholder="Tanggal Akhir" type="text" required="required" type="text" onfocus="this.type='date'" onclick="this.type='date'" onmouseout="timeFunctionLong(this)">
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