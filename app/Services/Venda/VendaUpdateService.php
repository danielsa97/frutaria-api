<?php


namespace App\Services\Venda;

use App\Services\UpdateInterface;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Mockery\Exception;

class VendaUpdateService extends FrutaService implements UpdateInterface
{

    /**
     * @param int $id
     * @param array $request
     * @return JsonResponse
     */
    public static function update(int $id, array $request): JsonResponse
    {
        try {
            $fruta = self::find($id);
            $fruta->update($request);
            $fruta->save();
            return FrutaEditService::get($id);
        } catch (Exception $exception) {
            Log::error($exception->getMessage());
            throw new HttpResponseException(response()->json("Falha na atualização dos dados da fruta", 500));
        }
    }
}
