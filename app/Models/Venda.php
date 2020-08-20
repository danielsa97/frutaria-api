<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    protected $guarded = [];

    public function frutas()
    {
        return $this->belongsToMany(Fruta::class, 'fruta_venda', 'venda_id', 'fruta_id')
            ->withPivot('quantidade_fruta');
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}
