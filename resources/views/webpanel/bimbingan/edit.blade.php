@extends('webpanel.layouts.app')
@section('title', 'Ubah Bimbingan TA')
@section('content')
	    <div class="x_panel">
			<div class="x_title">
				<h2>Form Ubah <small><i>Bimbingan TA</i></small></h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<br />
				<form id="demo-form2" method="post" action="{{route('bimbingan').'/'.$bimbingan->id}}" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
          			@method('PATCH')
					@csrf

					<div class="item form-group">
						<div class="col-md-12 col-sm-12 ">
							<label>Mahasiswa</label>
							<select class="form-control select2" multiple="multiple" id="mahasiswa_id" name="mahasiswa_id" data-placeholder="">
								@foreach($mahasiswa as $mahasiswa)
									@if($bimbingan->mahasiswa_id == $mahasiswa->id)
										<option value="{{$mahasiswa->id}}" selected>(NPM: {{$mahasiswa->npm}}) {{$mahasiswa->nama_lengkap}}</option>
									@else
										<option value="{{$mahasiswa->id}}">(NPM: {{$mahasiswa->npm}}) {{$mahasiswa->nama_lengkap}}</option>
									@endif
								@endforeach
							</select>
						</div>
					</div>

					<div class="item form-group">
						<div class="col-md-12 col-sm-12 ">
							<label>Pembimbing I</label>
							<select class="form-control select2" multiple="multiple" id="dosen_id1" name="dosen_id[]" data-placeholder="">
								@foreach($dosen as $dosen1)
									@if($dosen1->id == $db[$bimbingan->mahasiswa_id]["dosen"][0]["id"])
										<option value="{{$dosen1->id}}" selected>(NIP: {{$dosen1->nip}}) {{$dosen1->nama_lengkap}}</option>
									@else
										<option value="{{$dosen1->id}}">(NIP: {{$dosen1->nip}}) {{$dosen1->nama_lengkap}}</option>
									@endif
								@endforeach
							</select>
						</div>
					</div>

					<div class="item form-group">
						<div class="col-md-12 col-sm-12 ">
							<label>Pembimbing II</label>
							<select class="form-control select2" multiple="multiple" id="dosen_id2" name="dosen_id[]" data-placeholder="">
								@foreach($dosen as $dosen2)
									@if($dosen2->id == $db[$bimbingan->mahasiswa_id]["dosen"][1]["id"])
										<option value="{{$dosen2->id}}" selected>(NIP: {{$dosen2->nip}}) {{$dosen2->nama_lengkap}}</option>
									@else
										<option value="{{$dosen2->id}}">(NIP: {{$dosen2->nip}}) {{$dosen2->nama_lengkap}}</option>
									@endif
								@endforeach
							</select>
						</div>
					</div>

					<div class="item form-group">
						<div class="col-md-12 col-sm-12 ">
							<input type="text" id="judul_ta" placeholder="Judul TA" value="{{$bimbingan->judul_ta}}" name="judul_ta" required="required" class="form-control ">
						</div>
					</div>

					<div class="item form-group">
						<div class="col-md-12 col-sm-12 ">
							<input type="text" id="semester" placeholder="Semester" value="{{$bimbingan->semester}}" name="semester" required="required" class="form-control ">
						</div>
					</div>

					<div class="item form-group">
						<div class="col-md-12 col-sm-12 ">
							<input type="text" id="fakultas" value="{{$bimbingan->fakultas}}" placeholder="Fakultas" name="fakultas" required="required" class="form-control ">
						</div>
					</div>
					
					<div class="item form-group">
						<div class="col-md-12 col-sm-12 ">
							<input id="birthday" name="tanggal_mulai" value="{{$bimbingan->tanggal_mulai}}" class="date-picker form-control" placeholder="Tanggal Mulai" type="text" required="required" type="text" onfocus="this.type='date'" onclick="this.type='date'" onmouseout="timeFunctionLong(this)">
						</div>
					</div>

					<div class="item form-group">
						<div class="col-md-12 col-sm-12 ">
							<input id="birthday2" name="tanggal_akhir" value="{{$bimbingan->tanggal_akhir}}" class="date-picker form-control" placeholder="Tanggal Akhir" type="text" required="required" type="text" onfocus="this.type='date'" onclick="this.type='date'" onmouseout="timeFunctionLong(this)">
						</div>
					</div>

					<div class="ln_solid"></div>
					<div class="item form-group">
						<div class="col-md-6 col-sm-6 offset-md-3">
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