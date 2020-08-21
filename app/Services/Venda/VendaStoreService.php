<?php


namespace App\Services\Venda;


use App\Models\Fruta;
use App\Models\Venda;
use App\Services\StoreInterface;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Mockery\Exception;

class VendaStoreService implements StoreInterface
{
    /**
     * @param array $request
     * @return JsonResponse
     */
    public static function store(array $request): JsonResponse
    {
        try {
            DB::beginTransaction();
            $request['valor_venda'] = 0;
            $frutas = [];
            foreach (json_decode($request['fruta_id']) as $fruta) {
                $frutaInfo = Fruta::query()->find($fruta->fruta_id);

                if ($frutaInfo) {
                    $frutas[$frutaInfo->id] = ['quantidade_fruta' => $fruta->quantidade];
                    $valorUnitario = number_format(str_replace(',', '.', $frutaInfo->valor_unitario), '2', '.', '');
                    $request['valor_venda'] += $fruta->quantidade * $valorUnitario;
                }
            }

            $venda = Venda::query()->create(Arr::except($request, 'fruta_id'));
            $venda->frutas()->sync($frutas);
            DB::commit();

            return new JsonResponse($venda, 201);
        } catch (Exception $exception) {
            DB::rollBack();
            Log::error($exception->getMessage());
            throw new HttpResponseException(response()->json("Falha no cadastro da fruta", 500));
        }
    }
}
