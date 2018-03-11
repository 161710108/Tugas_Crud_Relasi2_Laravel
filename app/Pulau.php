<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pulau extends Model
{
    protected $table = 'pulaus';

	protected $fillable = array('nama_pulau','luas','id_negara');

	public $timestamps = true; // penanggalan otomatis record kapan di isi dan di update di aktikfkan

	
	public function negara()
	{
		return $this->belongsTo('App\Negara','id_negara');
	}
}
