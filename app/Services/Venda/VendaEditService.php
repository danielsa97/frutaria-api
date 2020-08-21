<?php


namespace App\Services\Venda;


use App\Services\EditInterface;
use Illuminate\Http\JsonResponse;

class VendaEditService extends FrutaService implements EditInterface
{
    /**
     * @param int $id
     * @return JsonResponse
     */
    public static function get(int $id): JsonResponse
    {
        $fruta = self::find($id);
        return new JsonResponse($fruta);
    }
}
