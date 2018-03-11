<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kepala_negara extends Model
{
    protected $table = 'kepala_negaras';

	protected $fillable = array('nama','masa_jabatan');

	public $timestamps = true; // penanggalan otomatis record kapan di isi dan di update di aktikfkan

	


   public function kepala_negara() {
		return $this->hasOne('App\Negara', 'id_kepala_negara');
	}
}
