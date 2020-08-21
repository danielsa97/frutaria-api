<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fruta extends Model
{
    protected $guarded = [];

    public function vendas()
    {
        return $this->belongsToMany(Venda::class, 'fruta_venda', 'fruta_id', 'venda_id');
    }

    //Mutators
    public function setValorUnitarioAttribute($value)
    {
        $this->attributes['valor_unitario'] = number_format(str_replace(",", '.', $value), 2, '.', '');
    }

    //Accessors
    public function getValorUnitarioAttribute($value)
    {
        return number_format($value, 2, ',', '.');
    }


}
