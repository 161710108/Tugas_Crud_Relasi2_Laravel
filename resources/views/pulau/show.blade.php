@extends('layouts.app')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-danger">
			  <div class="panel-heading">Show Data Pulau 
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
        			<div class="form-group">
			  			<label class="control-label">Nama_pulau</label>	
			  			<input type="text" name="nama_pulau" class="form-control" value="{{ $u->nama_pulau }}"  readonly>
			  		</div>

			  		<div class="form-group">
			  			<label class="control-label">Luas</label>
						<input type="text" name="luas" class="form-control" value="{{ $u->luas }}"  readonly>
			  		</div>
			  		<div class="form-group">
			  			<label class="control-label">Negara</label>
						<input type="text" name="negara" class="form-control" value="{{ $u->Negara->negara }}"  readonly>
			  		</div>
			  	</div>
			</div>	
		</div>
	</div>
</div>
@endsection