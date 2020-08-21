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
        $cliente['cpf'] = preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "\$1.\$2.\$3-\$4", $cliente['cpf']);
        return new JsonResponse($cliente);
    }
}
