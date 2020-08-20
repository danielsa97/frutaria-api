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
}
