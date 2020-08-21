<?php


namespace App\Services\Cliente;


use App\Models\Cliente;
use App\Services\StoreInterface;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Mockery\Exception;

class ClienteStoreService implements StoreInterface
{
    /**
     * @param array $request
     * @return JsonResponse
     */
    public static function store(array $request): JsonResponse
    {
        try {
            $cliente = Cliente::query()->create($request);
            return new JsonResponse($cliente, 201);
        } catch (Exception $exception) {
            Log::error($exception->getMessage());
            throw new HttpResponseException(response()->json("Falha no cadastro de cliente", 500));
        }
    }
}
