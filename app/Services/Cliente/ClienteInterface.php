<?php


namespace App\Services\Cliente;


use App\Models\Cliente;

interface ClienteInterface
{
    /**
     * @param int $id
     * @return Cliente
     */
    public static function find(int $id): Cliente;
}
