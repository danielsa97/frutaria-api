<?php


namespace App\Services\Fruta;


use App\Http\Resources\SearchResource;
use App\Models\Fruta;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Mockery\Exception;

class FrutaSearchService
{
    public static function search(): JsonResponse
    {
        try {
            $search = request()->route()->parameter('search');
            $query = Fruta::query()->where('status', 'A');
            if ($search) {
                $query->where('nome', 'like', "%$search%");
            }
            return new JsonResponse(SearchResource::collection($query->take(5)->get()));
        } catch (Exception $exception) {
            Log::error($exception->getMessage());
            return response()->json([]);
        }
    }
}
