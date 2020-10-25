@extends('webpanel.layouts.app')
@section('title', 'Sesi Bimbingan TA')
@section('content')
	    <div class="x_panel">
	      <div class="x_title">
	    	<i>Sesi Bimbingan TA {{$no_pembimbing}}</i>
	        <div class="clearfix"></div>
	      </div>
	          <div class="row">
	              <div class="col-sm-12">
	                <div class="card-box table-responsive">
	        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
	          <thead>
				<tr><th colspan='100'>{{$dosen->nama_lengkap}} ({{$no_pembimbing}})</th></tr>
	            <tr>
	              <th>No</th>
	              <th>Sesi Konsultasi</th>
	              <th>Status</th>
	            </tr>
	          </thead>
	          <tbody>
            	@foreach($sesi as $sesi)
					<tr>
						<td>{{$loop->iteration}}</td>
						<td><a href="{{url('bimbingan-mahasiswa/'.Request::segment(2).'/'.$no.'/'.$sesi->dosen_id.'/dosen/'.$sesi->id.'/konsultasi')}}">{{$sesi->sesi_konsultasi}}</a></td>
						@if($sesi->status == 0)
							<td><span class="badge badge-warning">Sedang berlangsung</span></td>
						@else
							<td><span class="badge badge-success">Selesai</span></td>
						@endif
					</tr>
				@endforeach
	          </tbody>
	        </table>
	      </div>
	    </div>
	  </div>
	</div>
@endsection