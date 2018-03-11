<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Negara extends Model
{
    protected $table = 'negaras';

	protected $fillable = array('negara','jumlah_penduduk','id_kepala_negara');
	public $timestamps = true; // penanggalan otomatis record kapan di isi dan di update di aktikfkan

	
	public function kepala_negara() {
		return $this->belongsTo('App\Kepala_negara', 'id_kepala_negara');
	}
	
public function pulau()
    {
    	return $this->hasMany('App\Pulau','id_negara');
    }
}
