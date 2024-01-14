<?php

namespace App\Support\Dashboard\Datatables;

use App\Support\Dashboard\Datatables\Columns\StatusColumn;
use Carbon\Carbon;
use Yajra\DataTables\Html\Column;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Blade;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Contracts\Support\Renderable;
use HsmFawaz\UI\Services\RolesAndPermissions\PermissionEnum;

abstract class BaseDatatable extends DataTable
{
    protected ?string $actionable = '';
    protected ?int $defaultOrder = 0;
    protected bool $indexer = false;
    protected bool $searchable = true;
    protected bool $datatable_buttons = true;
    protected bool $printable = true;
    protected bool $exportable = true;

    public function __construct(protected string $route = '')
    {
    }
    public static function create(
        string          $route,
        array           $data = [],
    ): static
    {
        $instance = new static();
        $instance->route = $route;
        $instance->customData = $data;

        return $instance;
    }



    abstract public function query(): Builder;

    public function dataTable($query)
    {
        $datatable = datatables()->eloquent($query)->addIndexColumn();
        $customColumns = collect($this->prepareCustomColumns());

        $customColumns->each(fn(\Closure $i, $key) => $datatable->addColumn($key, $i));

        collect($this->filters())
            ->each(fn(\Closure $i, $key) => $datatable->filterColumn($key, $i));

        collect($this->orders())
            ->each(fn(\Closure $i, $key) => $datatable->orderColumn($key, $i));

        return $datatable->rawColumns($customColumns->keys()->all());
    }

    private function prepareCustomColumns()
    {
        $customs = $this->customColumns();
        if ($this->actionable !== '') {
            $customs['action'] = function ($model) {
                $customActions = array_map(function ($action) {
                    return $action instanceof Renderable ? $action->render() : $action;
                }, $this->actions($model));
                $allActions = array_merge(
                    $customActions,
                    $this->prepareActionsButtons($model)
                );
                $actions = implode('', $allActions);

                return "<div class='btn-group'>{$actions}</div>";
            };
        }




        return $customs;
    }


    protected function customColumns(): array
    {
        return [];
    }

    protected function actions($model): array
    {
        return [];
    }

    private function prepareActionsButtons($model)
    {
        $currentActions = explode('|', $this->actionable);
        $actions = [];


        return $actions;
    }

    protected function filters(): array
    {
        return [];
    }

    protected function orders(): array
    {
        return [];
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        $url = config('custom.FORCE_HTTPS') ?
            str_replace('http:', 'https:', secure_url(url()->full())) : url()->full();

        $print = !$this->printable ? [] : [
            'extend' => 'print',
            'autoPrint' => true,
            'title' => '',
            'customize' => $this->customizablePrintPage(),
            'exportOptions' => [
                'columns' => ':not(.notexport)'
            ]
        ];

        $excel = !$this->printable ? [] : [
            'extend' => 'excelHtml5',
            'title' => '',
            'exportOptions' => [
                'columns' => ':not(.notexport)'
            ]
        ];
        $builder = $this->builder()
            ->setTableId('kt_table_users')
            ->columns($this->prepareColumns())
            ->minifiedAjax($url)
            ->language([
                'lengthMenu' => __('Appear') . ' _MENU_  ' . __('Row'),
                'sProcessing' => __('Loading...'),
                'sLengthMenu' => '',
                'sZeroRecords' => __('There is no data'),
                'sEmptyTable' => __('There is no data'),
                'infoFiltered' => '',
                'sInfo' => '',
                'sInfoEmpty' => '',
                'sInfoPostFix' => '',
                'sSearch' => '',
                'sSearchPlaceholder' => __('Search'),
                'sUrl' => '',
                'sInfoThousands' => ',',
                'sLoadingRecords' => __('Loading...'),
                'oPaginate' => [
                    'sNext' => "<i class='next'></i>",
                    'sPrevious' => "<i class='previous'></i>",
                ],
                'buttons' => $this->datatable_buttons(),
            ])
            ->buttons([
                $print,
                $excel,
            ])
            ->dom($this->getDomVariable())
            ->pageLength();
        if ($this->defaultOrder !== null) {
            $builder->orderBy($this->defaultOrder, 'desc');
        }

        return $builder;
    }

    abstract protected function columns(): array;

    private function prepareColumns()
    {
        $list = [];

        if ($this->indexer) {
            $list[] = $this->getIndex();
        }

        $list = array_merge($list, $this->columns());

        if ($this->has_activate) {
            $list[] = Column::computed('activate')
                ->title(__('Activation status'))
                ->searchable(false)
                ->exportable(false)
                ->printable(false)
                ->width(100)
                ->addClass('text-center');
        }

        if ($this->actionable !== '') {
            $list[] = Column::computed('action')
                ->title('الإجراءات')
                ->searchable(false)
                ->exportable(false)
                ->printable(false)
                ->width(100)
                ->addClass('text-center');
        }



        return $list;
    }

    public function getIndex()
    {
        $indexColumn = $this->builder()->config->get('datatables.read_column', 'DT_RowIndex');

        return new Column([
            'data' => $indexColumn,
            'name' => $indexColumn,
            'title' => '#',
            'orderable' => false,
            'searchable' => false,
        ]);
    }

    protected function edit_data($model): array
    {
        return [];
    }

    protected function customizablePrintPage()
    {
        $direction = app()->getLocale() === 'en' ? 'ltr' : 'rtl';

        return <<<javascript
            function (win) {
                $(win.document.body).css({
                        "direction": "$direction",
                    });

                $(win.document.body).find('table tr').each(function() {
                    let content = $(this).html();
                    content = content.replace(/-----replace-----((.|\\n)*)-----\/replace-----/gmi, function(matched) {
                        return matched.match(/(-----keep-----)((.|\\n)*)(-----\/keep-----)/mi)[2];
                    });

                    $(this).html(content);
                    // console.log(content);
                }).html();

                $(win.document.body).find( 'table' )
                    .addClass( 'text-center' )
            }
        javascript;
    }

    protected function customizableExcelPage()
    {

        return <<<javascript
            console.log('test');
        javascript;
    }

    private function getDomVariable()
    {
        $canFilter = $this->searchable ? 'f' : '';
        $canPrint = $this->datatable_buttons ? 'Bl' : 'l';

        return <<<HTML
        <"d-flex flex-wrap justify-content-between align-items-center"$canFilter<"d-flex flex-wrap align-items-center"$canPrint>>
        <"datatable-wrapper-content"rt>
        <"d-flex justify-content-between align-items-center"ip>
        HTML;
    }

    protected function column(string $name, string $title, $searchable = true): Column
    {
        return Column::make($name)
            ->title($title)
            ->orderable(true)
            ->searchable($searchable)
            ->width(100)
            ->addClass('text-center')
            ->content('---');
    }

    private function datatable_buttons()
    {
        $buttons = [];

        if ($this->printable) {
            $buttons['print'] = __('Print');
        }

        if ($this->exportable) {
            $buttons['excel'] = __('Export');
        }
        return $buttons;
    }
}
