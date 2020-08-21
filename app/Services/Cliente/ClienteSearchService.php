<?php


namespace App\Services\Cliente;


use App\Http\Resources\SearchResource;
use App\Models\Cliente;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Mockery\Exception;

class ClienteSearchService
{

    public static function search(): JsonResponse
    {
        try {
            $search = request()->route()->parameter('search');
            $query = Cliente::query()->where('status', 'A');
            if ($search) {
                $query->where(function (Builder $query) use ($search) {
                    $query->where('nome', 'like', "%$search%")
                        ->orWhere('cpf', 'like', "%$search%");
                });
            }
            return new JsonResponse(SearchResource::collection($query->take(5)->get()));
        } catch (Exception $exception) {
            Log::error($exception->getMessage());
            return response()->json([]);
        }
    }
}
