@extends('layouts.app')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-warning">
			  <div class="panel-heading">Show Data Kepala Negara 
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
        			<div class="form-group">
			  			<label class="control-label">Nama</label>	
			  			<input type="text" name="nama" class="form-control" value="{{ $p->nama }}"  readonly>
			  		</div>

			  		<div class="form-group">
			  			<label class="control-label">Masa_jabatan</label>	
			  			<input type="text" name="masa_jabatan" class="form-control" value="{{ $p->masa_jabatan }}"  readonly>
			  		</div>
			  	</div>
			</div>	
		</div>
	</div>
</div>
@endsection