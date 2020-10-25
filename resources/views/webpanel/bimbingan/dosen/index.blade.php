@extends('webpanel.layouts.app')
@section('title', 'Bimbingan TA')
@section('content')
	    <div class="x_panel">
	      <div class="x_title">
	        <h2>Data<small><i>Bimbingan TA</i></small></h2>
	        <div class="clearfix"></div>
	      </div>
	          <div class="row">
	              <div class="col-sm-12">
	                <div class="card-box table-responsive">
	        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
	          <thead>
	            <tr>
	              <th>No</th>
	              <th>Mahasiswa</th>
	              <th>Judul TA</th>
	              <th>Semester</th>
	              <th>Fakultas</th>
	              <th>Masa Bimbingan</th>
	            </tr>
	          </thead>
	          <tbody>
            	@foreach($bimbingan as $bimbingan)
            		<tr>
            			<td>{{$loop->iteration}}</td>
						<td><a href="{{url('bimbingan-dosen/'.$bimbingan->id.'/')}}">{{$bimbingan->mahasiswa->nama_lengkap}}</a></td>
						<td>{{$bimbingan->judul_ta}}</td>
						<td>{{$bimbingan->semester}}</td>
						<td>{{$bimbingan->fakultas}}</td>
						<td>{{$bimbingan->tanggal_mulai}} sd {{$bimbingan->tanggal_akhir}}</td>
						<!-- @if($bimbingan->status == 0)
							<td><span class='badge badge-warning'>Sedang berlangsung</span></td>
						@else
						
						@endif -->
            		</tr>
            	@endforeach
	          </tbody>
	        </table>
	      </div>
	    </div>
	  </div>
	</div>
@endsection