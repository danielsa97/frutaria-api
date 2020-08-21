<?php


namespace App\Services\Fruta;


use App\Models\Cliente;
use App\Models\Fruta;
use App\Services\StoreInterface;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Mockery\Exception;

class FrutaStoreService implements StoreInterface
{
    /**
     * @param array $request
     * @return JsonResponse
     */
    public static function store(array $request): JsonResponse
    {
        try {
            $fruta = Fruta::query()->create($request);
            return new JsonResponse($fruta, 201);
        } catch (Exception $exception) {
            Log::error($exception->getMessage());
            throw new HttpResponseException(response()->json("Falha no cadastro da fruta", 500));
        }
    }
}
