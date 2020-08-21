<?php


namespace App\Services\Cliente;


use App\Models\Cliente;
use Mockery\Exception;

abstract class ClienteService implements ClienteInterface
{

    /**
     * @param int $id
     * @return Cliente
     * @throws Exception
     */
    public static function find(int $id): Cliente
    {
        $cliente = Cliente::find($id);
        if ($cliente) {
            return $cliente;
        }
        throw new Exception("Cliente não encontrado", 404);
    }
}
