@extends('webpanel.layouts.app')
@section('title', 'Sesi Bimbingan TA')
@section('content')
	    <div class="x_panel">
	      <div class="x_title">
			<i>Sesi Bimbingan TA {{$bimbingan->mahasiswa->nama_lengkap}}</i>
			<a href="{{url('bimbingan-dosen/'.Request::segment(2).'/create')}}" class="btn btn-success btn-sm" style="float: right;">Buat Sesi</a>
	        <div class="clearfix"></div>
	      </div>
	          <div class="row">
	              <div class="col-sm-12">
	                <div class="card-box table-responsive">
	        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
	          <thead>
				<tr><th colspan='100'>JUDUL: {{$bimbingan->judul_ta}}</th></tr>
	            <tr>
	              <th>No</th>
	              <th>Sesi Konsultasi</th>
	              <th>Status</th>
	              <th>Proses</th>
	            </tr>
	          </thead>
	          <tbody>
				@foreach($sesi as $sesi)
					<tr>
						<td>{{$loop->iteration}}</td>
						<td><a href="{{url('bimbingan-dosen/'.Request::segment(2).'/'.$sesi->id.'/konsultasi')}}">{{$sesi->sesi_konsultasi}}</a></td>
						@if($sesi->status == 0)
							<td><span class="badge badge-warning">Sedang berlangsung</span></td>
						@else
							<td><span class="badge badge-success">Selesai</span></td>
						@endif
						<td>
							  <a href="{{url('bimbingan-dosen/'.$sesi->bimbingan_id.'/'.$sesi->id.'/edit')}}" title="ubah"><i class="fa fa-edit"></i></a>
							  <form method="post" action="{{url('bimbingan-dosen/'.$sesi->bimbingan_id.'/'.$sesi->id)}}" style="display:inline;">
            					@method('DELETE')
            					@csrf
            				<button type="submit" class="" style="background-color: transparent; border:none; color: red" onclick="return confirm('Apakan anda yakin?')" style="border: none;"><i class="fa fa-remove"></i></button>
            				</form>
			            </td>
					</tr>
				@endforeach
	          </tbody>
	        </table>
	      </div>
	    </div>
	  </div>
	</div>
@endsection