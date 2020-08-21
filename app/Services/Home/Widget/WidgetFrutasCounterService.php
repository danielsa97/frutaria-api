<?php


namespace App\Services\Home\Widget;


use App\Models\Fruta;
use App\Models\Venda;
use Illuminate\Http\JsonResponse;

class WidgetFrutasCounterService implements WidgetInterface
{

    public static function run(): JsonResponse
    {
        $total = Fruta::query()->count();
        return response()->json($total);
    }
}
