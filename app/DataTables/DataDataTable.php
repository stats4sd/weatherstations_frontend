<?php

namespace App\DataTables;

use App\Data;
use Yajra\DataTables\Services\DataTable;

class DataDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables($query)
            ->addColumn('action', 'data.action');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
    {
        return $model->newQuery()->select('id', 'add-your-columns-here', 'created_at', 'updated_at');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->addAction(['width' => '80px'])
                   ->parameters([
                        'dom' => 'Bfrtip',
                        'buttons' => ['export', 'print', 'reset', 'reload'],

                   ]);
                   // ->parameters($this->getBuilderParameters());

    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'fecha_hora',
            'created_at',
            'updated_at'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Data_' . date('YmdHis');
    }
}
