@extends('layouts.app')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-success">
			  <div class="panel-heading">Show Data Negara 
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
        			<div class="form-group">
			  			<label class="control-label">Negara</label>	
			  			<input type="text" name="negara" class="form-control" value="{{ $n->negara }}"  readonly>
			  		</div>

			  		<div class="form-group">
			  			<label class="control-label">Jumlah_peduduk</label>
						<input type="text" name="jumlah_peduduk" class="form-control" value="{{ $n->jumlah_penduduk }}"  readonly>
			  		</div>
			  		<div class="form-group">
			  			<label class="control-label">Kepala_negara</label>
						<input type="text" name="id_kepala_negara" class="form-control" value="{{ $n->Kepala_negara->nama }}"  readonly>
			  		</div>
			  		<div class="form-group">
			  			<label class="control-label">Pulau</label>	
			  			<textarea rows="10" class="form-control" readonly>@foreach($n->pulau as $data)
			  				-{{ $data->nama_pulau }}
			  				@endforeach
			  			</textarea> 
			  	</div>
			</div>	
		</div>
	</div>
</div>
@endsection