<?php


namespace App\Http\Controllers;


use App\DataTables\UserDataTable;
use App\Http\Requests\UserRequest;
use App\Services\DataTableService;
use App\Services\Setting\User\ClienteChangeStatusService;
use App\Services\Setting\User\ClienteEditService;
use App\Services\Setting\User\ClienteStoreService;
use App\Services\Setting\User\ClienteUpdateService;

class UserController extends Controller
{

    private $userDataTable;

    public function __construct(UserDataTable $userDataTable)
    {
        $this->userDataTable = $userDataTable;
    }

    public function index()
    {
        return DataTableService::make($this->userDataTable);
    }

    public function store(UserRequest $request)
    {
        return ClienteStoreService::store($request->only('password', 'name', 'email'));
    }

    public function update(UserRequest $request, int $id)
    {
        return ClienteUpdateService::update($id, $request->only('password', 'name', 'email'));
    }


    public function edit(int $userId)
    {
        return ClienteEditService::get($userId);
    }

    public function changeStatus(int $userId)
    {
        return ClienteChangeStatusService::change($userId);
    }

}
