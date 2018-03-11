@extends('layouts.app')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-success">
			  <div class="panel-heading">Edit Data Negara 
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			  	<form action="{{ route('negara.update',$n->id) }}" method="post" >
			  		<input name="_method" type="hidden" value="PATCH">
        			{{ csrf_field() }}
			  		<div class="form-group {{ $errors->has('negara') ? ' has-error' : '' }}">
			  			<label class="control-label">Negara</label>	
			  			<input type="text" name="negara" value="{{ $n->negara }}" class="form-control"  required>
			  			@if ($errors->has('negara'))
                            <span class="help-block">
                                <strong>{{ $errors->first('negara') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('jumlah_penduduk') ? ' has-error' : '' }}">
			  			<label class="control-label">Jumlah_penduduk</label>	
			  			<input type="text" name="jumlah_penduduk" value="{{ $n->jumlah_penduduk }}" class="form-control"  required>
			  			@if ($errors->has('jumlah_penduduk'))
                            <span class="help-block">
                                <strong>{{ $errors->first('jumlah_penduduk') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('id_kepala_negara') ? ' has-error' : '' }}">
			  			<label class="control-label">Kepala_negara</label>	
			  			<select name="id_kepala_negara" class="form-control">
			  				@foreach($p as $data)
			  				<option value="{{ $data->id }}" {{ $selectedK == $data->id ? 'selected="selected"' : '' }} >{{ $data->nama }}</option>
			  				@endforeach
			  			</select>
			  			@if ($errors->has('id_kepala_negara'))
                            <span class="help-block">
                                <strong>{{ $errors->first('id_kepala_negara') }}</strong>
                            </span>
                        @endif
			  		</div>
			  		<div class="form-group">
			  			<button type="submit" class="btn btn-info">Simpan Perubahan</button>
			  		</div>
			  	</form>
			  </div>
			</div>	
		</div>
	</div>
</div>
@endsection