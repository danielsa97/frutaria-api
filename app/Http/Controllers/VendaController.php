<?php


namespace App\Http\Controllers;


use App\DataTables\VendaDataTable;
use App\Http\Requests\VendaRequest;
use App\Services\DataTableService;
use App\Services\Venda\VendaStoreService;

class VendaController extends Controller
{
    private $vendaDataTable;

    public function __construct(VendaDataTable $vendaDataTable)
    {
        $this->vendaDataTable = $vendaDataTable;
    }

    public function index()
    {
        return DataTableService::make($this->vendaDataTable);
    }

    public function store(VendaRequest $request)
    {
        return VendaStoreService::store($request->except('_method'));
    }
}
