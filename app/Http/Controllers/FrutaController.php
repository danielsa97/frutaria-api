<?php


namespace App\Http\Controllers;


use App\DataTables\FrutaDataTable;
use App\Http\Requests\FrutaRequest;
use App\Services\DataTableService;
use App\Services\Fruta\FrutaChangeStatusService;
use App\Services\Fruta\FrutaEditService;
use App\Services\Fruta\FrutaStoreService;
use App\Services\Fruta\FrutaUpdateService;

class FrutaController extends Controller
{
    private $frutaDataTable;

    public function __construct(FrutaDataTable $frutaDataTable)
    {
        $this->frutaDataTable = $frutaDataTable;
    }

    public function index()
    {
        return DataTableService::make($this->frutaDataTable);
    }

    public function store(FrutaRequest $request)
    {
        return FrutaStoreService::store($request->except('_method'));
    }

    public function update(FrutaRequest $request, int $id)
    {
        return FrutaUpdateService::update($id, $request->except('_method'));
    }


    public function edit(int $frutaId)
    {
        return FrutaEditService::get($frutaId);
    }

    public function changeStatus(int $clienteId)
    {
        return FrutaChangeStatusService::change($clienteId);
    }
}
