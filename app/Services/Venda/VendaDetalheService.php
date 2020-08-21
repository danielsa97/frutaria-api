<?php


namespace App\Services\Venda;


use App\Models\Venda;

class VendaDetalheService extends VendaService
{
    public static function get($id)
    {
        return response()->json(Venda::query()->find($id)->with('frutas')->get());
    }
}
