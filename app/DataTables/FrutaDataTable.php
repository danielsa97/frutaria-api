<?php

namespace App\DataTables;

use App\Models\Cliente;
use App\Models\Fruta;
use Carbon\Carbon;
use Yajra\DataTables\Services\DataTable;

class FrutaDataTable extends DataTable
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
            ->editColumn('data_validade', function ($fruta) {
                return Carbon::parse($fruta->data_validade)->format('d/m/Y');
            })
            ->editColumn('status', 'datatable.status-label');
    }


    public function query(Fruta $model)
    {
        return $model->newQuery()->select('id', 'nome', 'valor_unitario', 'quantidade', 'data_validade', 'status');
    }

    public function html()
    {
        return $this->builder()
            ->setTableId('fruta_datatable')
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
            'nome' => ['title' => 'Nome'],
            'valor_unitario' => ['width' => '150px', 'title' => 'Valor(R$)'],
            'data_validade' => ['width' => '100px', 'title' => 'Validade'],
            'quantidade' => ['width' => '100px', 'title' => 'Quantidade'],
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
        return 'fruta_' . date('YmdHis');
    }
}
