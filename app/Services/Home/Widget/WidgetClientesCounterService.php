<?php


namespace App\Services\Home\Widget;


use App\Models\Cliente;
use Illuminate\Http\JsonResponse;

class WidgetClientesCounterService implements WidgetInterface
{

    public static function run(): JsonResponse
    {
        $total = Cliente::query()->count();
        return response()->json($total);
    }
}
