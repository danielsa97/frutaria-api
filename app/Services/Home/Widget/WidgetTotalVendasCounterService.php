<?php


namespace App\Services\Home\Widget;


use App\Models\Venda;
use Illuminate\Http\JsonResponse;

class WidgetTotalVendasCounterService implements WidgetInterface
{

    public static function run(): JsonResponse
    {
        $total = Venda::query()->count();
        return response()->json($total);
    }
}
