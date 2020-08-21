<?php


namespace App\Services\Fruta;


use App\Services\EditInterface;
use Illuminate\Http\JsonResponse;

class FrutaEditService extends FrutaService implements EditInterface
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
