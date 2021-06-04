<?php

namespace App\DataTables\User;

use App\Models\Trip;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class TripDataTable extends DataTable
{

    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */

    protected $_param;
    protected $i = 0;
    public function __construct($id)
    {
        $id = (int)$id;
        $this->_param = $id;
    }

    public function dataTable($query)
    {

        return datatables()
            ->eloquent($query)
            ->addColumn('العمليات', 'user.trips.actions')
            ->rawColumns(['العمليات']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Trip $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    // public function query(Trip $model)
    // {

    //     return $model->newQuery();
    // }

    public function query(Trip $model)
    {
        return $model->where('user_id', $this->_param)->with(['office', 'driver'])->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
        ->setTableId('admindatatable-table')
        ->columns($this->getColumns())
        ->minifiedAjax()
        ->dom('Blfrtip')
        ->orderBy(1)
        ->parameters([
            'dom'          => 'Blfrtip',
            'buttons'      => [

                [
                    'text'      => '<i class="fa fa-plus"> </i> أضافة رحلة جديد'  ,
                    'className' => 'btn btn-info',
                    'action'    => "function(){

                        window.location.href = '" . \URL::current() . "/create ';

                    }"

                ],


                [ 'extend' => 'reload', 'className' => 'btn btn-primary' , 'text' => '<i class="fa fa-retweet">' ],

            ],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {

        return [
                [

                    'name'              => 'id',
                    'data'              => 'id',
                    'title'             => '#',

                ],
                [

                    'name'              => 'name',
                    'data'              => 'name',
                    'title'             => 'الاسم',

                ],
                [

                    'name'              => 'client_name',
                    'data'              => 'client_name',
                    'title'             => 'اسم العميل',

                ],
                [

                    'name'              => 'price',
                    'data'              => 'price',
                    'title'             => 'السعر',

                ],
                [

                    'name'              => 'driver.name',
                    'data'              => 'driver.name',
                    'title'             => 'السائق',

                ],
                [

                    'name'              => 'العمليات',
                    'data'              => 'العمليات',
                    'title'             => 'العمليات',
                    'exportable'        => false,
                    'printable'         => false,
                    'orderable'         => true,
                    'searchable'        => false,
                ],
                // [

                //     'name'              => '#',
                //     'data'              => '#',
                //     'title'             => '#',
                //     'exportable'        => false,
                //     'printable'         => false,
                //     'orderable'         => false,
                //     'searchable'        => false,
                // ],
        ];
    }
    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'User\Trip_' . date('YmdHis');
    }
}
