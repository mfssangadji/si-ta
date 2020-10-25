@extends('webpanel.layouts.app')
@section('title', 'Ubah Administrator')
@section('content')
	    <div class="x_panel">
			<div class="x_title">
				<h2>Form Ubah <small><i>Administrator</i></small></h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<br />
				<form id="demo-form2" method="post" action="{{route('users').'/'.$users->id}}" data-parsley-validate class="form-horizontal form-label-left">
          @method('PATCH')
					@csrf

					<div class="item form-group">
						<div class="col-md-12 col-sm-12 ">
							<input type="text" id="name" name="name" value="{{$users->name}}" placeholder="Nama Lengkap" required="required" class="form-control ">
						</div>
					</div>

					<div class="item form-group">
						<div class="col-md-12 col-sm-12 ">
							<input type="email" id="email" name="email" placeholder="Email" value="{{$users->email}}" required="required" class="form-control ">
						</div>
					</div>

          <div class="item form-group">
						<div class="col-md-12 col-sm-12 ">
							<input type="password" id="password" name="password" placeholder="Password (kosongkan jika tidak diganti)" class="form-control ">
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