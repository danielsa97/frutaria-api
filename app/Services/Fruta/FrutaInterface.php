<?php


namespace App\Services\Fruta;


use App\Models\Fruta;

interface FrutaInterface
{
    /**
     * @param int $id
     * @return Fruta
     */
    public static function find(int $id): Fruta;
}
