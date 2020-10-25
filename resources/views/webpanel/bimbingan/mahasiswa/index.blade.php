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
	              <th>Pembimbing I</th>
	              <th>Pembimbing II</th>
	              <th>Judul TA</th>
	              <th>Semester</th>
	              <th>Fakultas</th>
	              <th>Masa Bimbingan</th>
	            </tr>
	          </thead>
	          <tbody>
            	@foreach($gSQLbimbinganq as $bimbingan)
            		<tr>
            			<td>{{$loop->iteration}}</td>
						<td>{{$bimbingan->mahasiswa->nama_lengkap}}</td>
						<?php $i=0; ?>
						@foreach($dosen[$bimbingan->mahasiswa_id]["dosen"] as $key)
							<td><a href="{{url('bimbingan-mahasiswa/'.$bimbingan->id.'/'.$i.'/'.$key['id'].'/dosen')}}" title="Click untuk melakukan konsultasi.">{{$key['nama_lengkap']}}</a></td>
							<?php $i++; ?>
						@endforeach
						<td>{{$bimbingan->judul_ta}}</td>
						<td>{{$bimbingan->semester}}</td>
						<td>{{$bimbingan->fakultas}}</td>
						<td>{{$bimbingan->tanggal_mulai}} sd {{$bimbingan->tanggal_akhir}}</td>
	            		<!-- <td>
			              	<a href="{{ route('bimbingan').'/'.$bimbingan->id.'/edit' }}" title="ubah"><i class="fa fa-edit"></i></a><form method="post" action="{{ route('bimbingan').'/'.$bimbingan->id }}" style="display:inline;">
            					@method('DELETE')
            					@csrf
            				<button type="submit" class="" style="background-color: transparent; border:none; color: red" onclick="return confirm('Apakan anda yakin?')" style="border: none;"><i class="fa fa-remove"></i></button>
            				</form>
			            </td> -->
            		</tr>
            	@endforeach
	          </tbody>
	        </table>
	      </div>
	    </div>
	  </div>
	</div>
@endsection