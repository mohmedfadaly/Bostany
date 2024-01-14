<?php

namespace App\DataTables;

use App\Models\Malfunction;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;


class MalfunctionsDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', 'dashboard.malfunctions.action')
            ->setRowId('id');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Malfunction $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Malfunction $model): QueryBuilder
    {
        return $model->newQuery();
    }


    protected function customColumns(): array
    {
        return [
            'id' => function ($model) {
                return $model->id;
            },
            'code'  => function ($model) {
                return $model->code;
            },
            'desc_ar'  => function ($model) {
                return str()->limit($model->desc_ar,10);
            },
            'desc_en'  => function ($model) {
                return str()->limit($model->desc_ar,10);
            },
            'solution_ar'  => function ($model) {
                return str()->limit($model->solution_ar,10);
            },
            'solution_en'  => function ($model) {
                return str()->limit($model->solution_en,10);
            },
        ];
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('malfunctions-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    // ->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle();
                    // ->buttons([
                    //     Button::make('excel'),
                    //     Button::make('csv'),
                    //     Button::make('pdf'),
                    //     Button::make('print'),
                    //     Button::make('reset'),
                    //     Button::make('reload')
                    // ]);
    }

    /**
     * Get the dataTable columns definition.
     *
     * @return array
     */
    public function getColumns(): array
    {
        return [

            Column::make('id')->title('#'),
            Column::make('code')->title('الكود'),
            Column::make('desc_ar')->title('الوصف بالعربي'),
            Column::make('desc_en')->title('الوصف بالإنجليزي'),
            Column::make('solution_ar')->title('الحل بالعربي'),
            Column::make('solution_en')->title('الحل بالإنجليزي'),
            Column::computed('action')
            ->exportable(false)
            ->printable(false)
            ->width(60)
            ->addClass('text-center')
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Malfunctions_' . date('YmdHis');
    }
}
