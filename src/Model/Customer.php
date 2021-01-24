<?php

namespace Api\Model;

use DateTime;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';

    protected $fillable = [
        "nome",
		"idade",
		"cpf",
		"rg",
		"data_nasc",
		"sexo",
		"signo",
		"mae",
		"pai",
		"email",
		// "senha",
		"cep",
		"endereco",
		"numero",
		"bairro",
		"cidade",
		"estado",
		"telefone_fixo",
		"celular",
		"altura",
		"peso",
		"tipo_sanguineo",
		"cor"
    ];

    protected $guard = ['id', 'email'];

	public $timestamps = false;
	
	protected $casts = [
		'altura' => 'float'
	];

    public function setDataNascAttribute($value) 
    {
		$data = DateTime::createFromFormat('d/m/Y', $value);
        $this->attributes['data_nasc'] = $data->format("Y-m-d");
	}
	
	public function setAlturaAttribute($value)
	{
		$this->attributes['altura'] = (float) $value;
	}
}