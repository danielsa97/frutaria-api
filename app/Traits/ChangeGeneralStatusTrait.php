<?php


namespace App\Traits;


use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Mockery\Exception;

trait ChangeGeneralStatusTrait
{
    public static function change($id): JsonResponse
    {
        try {
            $model = self::find($id);
            $model->status = $model->status === 'A' ? 'I' : 'A';
            $model->save();
            return new JsonResponse($model);
        } catch (Exception $exception) {
            Log::error($exception->getMessage());
            throw new HttpResponseException(response()->json("Falha na alteração do status", 500));
        }
    }
}
