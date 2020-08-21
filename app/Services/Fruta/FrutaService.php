<?php


namespace App\Services\Fruta;


use App\Models\Fruta;
use Mockery\Exception;

abstract class FrutaService implements FrutaInterface
{

    /**
     * @param int $id
     * @return Fruta
     * @throws Exception
     */
    public static function find(int $id): Fruta
    {
        $fruta = Fruta::find($id);
        if ($fruta) {
            return $fruta;
        }
        throw new Exception("Fruta não encontrada", 404);
    }
}
