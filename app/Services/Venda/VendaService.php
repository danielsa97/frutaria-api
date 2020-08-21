<?php


namespace App\Services\Venda;


use App\Models\Venda;
use Mockery\Exception;

abstract class VendaService implements VendaInterface
{

    /**
     * @param int $id
     * @return Venda
     * @throws Exception
     */
    public static function find(int $id): Venda
    {
        $venda = Venda::find($id);
        if ($venda) {
            return $venda;
        }
        throw new Exception("Venda não encontrada", 404);
    }
}
