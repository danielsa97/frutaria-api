<?php


namespace App\Services\Cliente;

use App\Services\UpdateInterface;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Mockery\Exception;

class ClienteUpdateService extends ClienteService implements UpdateInterface
{

    /**
     * @param int $id
     * @param array $request
     * @return JsonResponse
     */
    public static function update(int $id, array $request): JsonResponse
    {
        try {
            $cliente = self::find($id);
            $cliente->update($request);
            $cliente->save();
            return ClienteEditService::get($id);
        } catch (Exception $exception) {
            Log::error($exception->getMessage());
            throw new HttpResponseException(response()->json("Falha na atualização do cliente", 500));
        }
    }
}
