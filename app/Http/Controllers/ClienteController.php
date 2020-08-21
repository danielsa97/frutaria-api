<?php


namespace App\Http\Controllers;


use App\DataTables\ClienteDataTable;
use App\Http\Requests\ClienteRequest;
use App\Services\Cliente\ClienteChangeStatusService;
use App\Services\Cliente\ClienteEditService;
use App\Services\Cliente\ClienteStoreService;
use App\Services\Cliente\ClienteUpdateService;
use App\Services\DataTableService;

class ClienteController extends Controller
{

    private $clienteDataTable;

    public function __construct(ClienteDataTable $clienteDataTable)
    {
        $this->clienteDataTable = $clienteDataTable;
    }

    public function index()
    {
        return DataTableService::make($this->clienteDataTable);
    }

    public function store(ClienteRequest $request)
    {
        return ClienteStoreService::store($request->only('nome', 'cpf'));
    }

    public function update(ClienteRequest $request, int $id)
    {
        return ClienteUpdateService::update($id, $request->only('nome', 'cpf'));
    }


    public function edit(int $clienteId)
    {
        return ClienteEditService::get($clienteId);
    }

    public function changeStatus(int $clienteId)
    {
        return ClienteChangeStatusService::change($clienteId);
    }

}
