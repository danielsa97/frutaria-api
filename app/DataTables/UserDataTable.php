<?php

namespace App\DataTables;

use App\User;
use Yajra\DataTables\Services\DataTable;

class UserDataTable extends DataTable
{
    public function dataTable($query)
    {
        return datatables($query)
            ->escapeColumns([])
            ->addColumn('action', function ($query) {
                return "
                    <div class='dropdown'>
                      <button class='btn btn-sm btn-primary dropdown-toggle' data-toggle='dropdown'>Ações</button>
                      <div class='dropdown-menu'>
                        <button class='dropdown-item' data-emit='edit' data-id='{$query->id}'>Editar</button>
                        <button class='dropdown-item' data-emit='change-status' data-id='{$query->id}'>Alterar Status</button>
                      </div>
                    </div>";
            })
            ->editColumn('status', 'datatable.status-label');
    }


    public function query(User $model)
    {
        return $model->newQuery()->select('id', 'name', 'email', 'status');
    }

    public function html()
    {
        return $this->builder()
            ->setTableId('user_datatable')
            ->columns($this->getColumns())
            ->parameters($this->getBuilderParameters());
    }


    protected function getColumns()
    {
        return [
            'action' => [
                'title' => 'Ações',
                'orderable' => false,
                'searchable' => false,
                'exportable' => false,
                'printable' => false,
                'width' => '60px'
            ],
            'name' => ['title' => 'Nome'],
            'email' => ['title' => 'E-mail'],
            'profile' => ['title' => 'Perfil', 'name' => 'profiles.name'],
            'status' => ['title' => 'Status', 'width' => '50px', 'class' => 'text-center']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'users_' . date('YmdHis');
    }
}
