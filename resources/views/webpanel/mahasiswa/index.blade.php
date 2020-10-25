@extends('webpanel.layouts.app')
@section('title', 'Mahasiswa')
@section('content')
	    <div class="x_panel">
	      <div class="x_title">
	        <h2>Data<small><i>Mahasiswa</i></small></h2>
	        <a href="{{route('mahasiswa.create')}}" class="btn btn-success btn-sm" style="float: right;">Tambah Baru</a>
	        <div class="clearfix"></div>
	      </div>
	          <div class="row">
	              <div class="col-sm-12">
	                <div class="card-box table-responsive">
	        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
	          <thead>
	            <tr>
	              <th>No</th>
	              <th>NPM</th>
	              <th>Nama Lengkap</th>
	              <th>No. Telp</th>
	              <th>Proses</th>
	            </tr>
	          </thead>
	          <tbody>
            	@foreach($mahasiswa as $mahasiswa)
            		<tr>
            			<td>{{$loop->iteration}}</td>
						<td>{{$mahasiswa->npm}}</td>
						<td>{{$mahasiswa->nama_lengkap}}</td>
						<td>{{$mahasiswa->no_telp}}</td>
	            		<td>
			              	<a href="{{ route('mahasiswa').'/'.$mahasiswa->id.'/edit' }}" title="ubah"><i class="fa fa-edit"></i></a><form method="post" action="{{ route('mahasiswa').'/'.$mahasiswa->id }}" style="display:inline;">
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