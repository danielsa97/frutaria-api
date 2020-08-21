<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $guarded = [];

    public function vendas()
    {
        return $this->hasMany(Venda::class);
    }

    //Mutators
    public function setCpfAttribute($value)
    {
        //somente números no cpf
        $this->attributes['cpf'] = preg_replace("/[^0-9]/", "", $value);
    }

    //Accessors
    public function getCpfAttribute($value)
    {
        return preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "\$1.\$2.\$3-\$4", $value);
    }
}
