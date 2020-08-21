<?php

namespace App\DataTables;

use App\Models\Cliente;
use App\Models\Venda;
use Carbon\Carbon;
use Yajra\DataTables\Services\DataTable;

class VendaDataTable extends DataTable
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
                        <button class='dropdown-item' data-emit='detalhes' data-id='{$query->id}'>Detalhes</button>
                      </div>
                    </div>";
            })
            ->editColumn('created_at', function ($venda) {
                return Carbon::parse($venda->created_at)->format('d/m/Y');
            });
    }


    public function query(Venda $model)
    {
        return $model
            ->newQuery()
            ->join('clientes', 'vendas.cliente_id', 'clientes.id')
            ->join('fruta_venda', 'fruta_venda.venda_id', 'vendas.id')
            ->select('vendas.id', 'clientes.nome', 'valor_venda', 'vendas.created_at')
            ->selectRaw("SUM(fruta_venda.quantidade_fruta) as quantidade")
            ->groupBy('vendas.id');
    }

    public function html()
    {
        return $this->builder()
            ->setTableId('venda_datatable')
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
            'nome' => ['title' => 'Cliente', 'name' => 'clientes.nome'],
            'quantidade' => ['title' => 'Qtd.Itens', 'width' => '100px'],
            'valor_venda' => ['title' => 'Valor(R$)', 'width' => '100px'],
            'created_at' => ['name' => 'created_at', 'title' => 'Data', 'width' => '100px']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'venda_' . date('YmdHis');
    }
}
