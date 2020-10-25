@extends('webpanel.layouts.app')
@section('title', 'Bimbingan TA')
@section('content')
	    <div class="x_panel">
	      <div class="x_title">
	        <h2>Data<small><i>Bimbingan TA</i></small></h2>
	        <a href="{{route('bimbingan.create')}}" class="btn btn-success btn-sm" style="float: right;">Tambah Baru</a>
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
	              <th>Pembimbing I</th>
	              <th>Pembimbing II</th>
	              <th>Judul TA</th>
	              <th>Semester</th>
	              <th>Fakultas</th>
	              <th>Masa Bimbingan</th>
	              <th>Status</th>
	              <th>Proses</th>
	            </tr>
	          </thead>
	          <tbody>
            	@foreach($bimbingan as $bimbingan)
            		<tr>
            			<td>{{$loop->iteration}}</td>
						<td>(NPM: {{$bimbingan->mahasiswa->npm}}) {{$bimbingan->mahasiswa->nama_lengkap}}</td>
						@foreach($dbimbingan[$bimbingan->mahasiswa->id]["dosen"] as $db)
							<td>(NIP: {{$db["nip"]}}) {{$db["nama_lengkap"]}}</td>
						@endforeach
						<td>{{$bimbingan->judul_ta}}</td>
						<td>{{$bimbingan->semester}}</td>
						<td>{{$bimbingan->fakultas}}</td>
						<td>{{$bimbingan->tanggal_mulai}} sd {{$bimbingan->tanggal_akhir}}</td>
						@if($bimbingan->status == 0)
							<td><span class='badge badge-warning'>Sedang berlangsung</span></td>
						@else
							<td><span class='badge badge-success'>Selesai</span></td>	
						@endif
	            		<td>
			              	<a href="{{ route('bimbingan').'/'.$bimbingan->id.'/edit' }}" title="ubah"><i class="fa fa-edit"></i></a><form method="post" action="{{ route('bimbingan').'/'.$bimbingan->id }}" style="display:inline;">
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