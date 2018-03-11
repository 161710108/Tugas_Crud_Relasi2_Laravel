@extends('layouts.app')
@section('content')
<div class="row">
<div class="col-md-2">
	<!--nav-->
				@include('layouts.dashboard')
			<!--end nav-->
	</div>
	<div class="container">
		<div class="col-md-10">
			<div class="panel panel-success">
			  <div class="panel-heading">Data Negara
			  	<div class="panel-title pull-right"><a href="{{ route('negara.create') }}">Tambah</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			  	<div class="table-responsive">
				  <table class="table">
				  	<thead>
			  		<tr>
			  		  <th>No</th>
					  <th>Negara</th>
					  <th>Jumlah Penduduk</th>
					  <th>Kepala Negara</th>
					  <th>Pulau</th>
					  <th colspan="3">Action</th>
			  		</tr>
				  	</thead>
				  	<tbody>
				  		<?php $nomor = 1; ?>
				  		@php $no = 1; @endphp
				  		@foreach($n as $data)
				  	  <tr>
				    	<td>{{ $no++ }}</td>
				    	<td>{{ $data->negara }}</td>
				    	<td><p>{{ $data->jumlah_penduduk }} Jiwa</p></td>
				    	<td><p>{{ $data->Kepala_negara->nama }}</p></td>
				    	<td>@foreach($data->Pulau as $u)<li>{{ $u->nama_pulau }}@endforeach</li></td>
						<td>
							<a class="btn btn-warning" href="{{ route('negara.edit',$data->id) }}">Edit</a>
						</td>
						<td>
							<a href="{{ route('negara.show',$data->id) }}" class="btn btn-success">Show</a>
						</td>
						<td>
							<form method="post" action="{{ route('negara.destroy',$data->id) }}">
								<input name="_token" type="hidden" value="{{ csrf_token() }}">
								<input type="hidden" name="_method" value="DELETE">

								<button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')">Delete</button>
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
	</div>
</div>
@endsection