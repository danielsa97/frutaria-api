<?php


namespace App\Services\Cliente;


use App\Services\EditInterface;
use Illuminate\Http\JsonResponse;

class ClienteEditService extends ClienteService implements EditInterface
{
    /**
     * @param int $id
     * @return JsonResponse
     */
    public static function get(int $id): JsonResponse
    {
        $cliente = self::find($id);
        return new JsonResponse($cliente);
    }
}
