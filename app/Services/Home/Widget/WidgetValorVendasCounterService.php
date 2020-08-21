<?php


namespace App\Services\Home\Widget;


use App\Models\Venda;
use Illuminate\Http\JsonResponse;

class WidgetValorVendasCounterService implements WidgetInterface
{

    public static function run(): JsonResponse
    {
        $total = Venda::query()->sum('valor_venda');
        return response()->json(number_format($total ?? 0, '2', ',', '.'));
    }
}
