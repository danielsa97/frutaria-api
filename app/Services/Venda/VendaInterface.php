<?php


namespace App\Services\Venda;


use App\Models\Venda;

interface VendaInterface
{
    /**
     * @param int $id
     * @return Venda
     */
    public static function find(int $id): Venda;
}
