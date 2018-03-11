@extends('layouts.app')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-danger">
			  <div class="panel-heading">Tambah Data Pulau 
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			  	<form action="{{ route('pulau.store') }}" method="post" >
			  		{{ csrf_field() }}
			  		<div class="form-group {{ $errors->has('nama_pulau') ? ' has-error' : '' }}">
			  			<label class="control-label">Nama_pulau</label>	
			  			<input type="text" name="nama_pulau" class="form-control"  required>
			  			@if ($errors->has('nama_pulau'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nama_pulau') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('luas') ? ' has-error' : '' }}">
			  			<label class="control-label">Luas</label>	
			  			<input type="text" name="luas" class="form-control"  required>
			  			@if ($errors->has('luas'))
                            <span class="help-block">
                                <strong>{{ $errors->first('luas') }}</strong>
                            </span>
                        @endif
			  		</div>
			  		<div class="form-group {{ $errors->has('id_negara') ? ' has-error' : '' }}">
			  			<label class="control-label">Negara</label>	
			  			<select name="id_negara" class="form-control">
			  				@foreach($n as $data)
			  				<option value="{{ $data->id }}">{{ $data->negara }}</option>
			  				@endforeach
			  			</select>
			  			@if ($errors->has('id_negara'))
                            <span class="help-block">
                                <strong>{{ $errors->first('id_negara') }}</strong>
                            </span>
                        @endif
			  		</div>
			  		<div class="form-group">
			  			<button type="submit" class="btn btn-info">Tambah</button>
			  		</div>
			  	</form>
			  </div>
			</div>	
		</div>
	</div>
</div>
@endsection