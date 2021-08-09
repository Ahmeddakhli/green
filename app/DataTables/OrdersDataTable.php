<?php

namespace App\DataTables;

use App\Models\Order;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class OrdersDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
          
            ->editColumn('product_id', function ($row) {
                return ''.$row->product->product_name;
            })
              
            ->editColumn('addres_detailes', function ($row) {
                return''. $row->addres_detailes.'';
            })
          //  ->editColumn('img', function ($row) {
            //    return '<img src="{{ asset(\'dist/img/' + $row->img + '\')}}" alt="' +  + '"height="16" width="16"/>';
           // })
            ->rawColumns(['action', 'product_id','addres_detailes'])
            ->addColumn('action',  function($row){
                $actionBtn = '
                 <a href="'. route('orders.edit', $row->id) .'" class="edit btn btn-success btn-sm">تعديل</a>
                 <form action="'. route('orders.destroy', $row->id) .'" method="POST">
                 '.csrf_field().'
                 '.method_field("DELETE").'
                 <button type="submit" class="delete btn btn-danger btn-sm"
                     onclick="return confirm(\'سوف يتم حذف المسؤل نهائينا هل تريد الحذف؟\')">حذف</a>
                 </form>';
                return $actionBtn;
            })
            ->setRowId(function ($row) {
                return $row->id;
            })
            ->setRowAttr([
                'text-align' => 'center',
                
            ])
           
            ->setRowAttr([
                'color' => 'red',
            ])
           // ->setRowClass(function ($row) {
            //    return $row->id % 2 == 0 ? 'alert-success' : 'alert-warning';
           // })
            ;
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Product $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Order $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('orders-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->language([
                        'buttoms' => [
                            'Excel' =>'إكسيل',
                            'print' =>'طباعه',
                            'Export' =>'تحميل',
                            'Reload' =>'تحميل البيانات الجديده',
                            'Reset' =>'الغاء البحث',
                
                        ],
                        'url' => url('//cdn.datatables.net/plug-ins/1.10.25/i18n/Arabic.json')
                    ])
                    ->columnDefs(' width: "10px", targets: [0,1,2]') 
                 
                    ->parameters([
                      
                        
                        'initComplete' => "function () {
                            this.api().columns().every(function () {
                                var column = this;
                                var input = document.createElement(\"input\");
                                $(input).appendTo($(column.footer()).empty())
                                .on('change', function () {
                                    column.search($(this).val(), false, false, true).draw();
                                });
                            });
                        }",
                    ])
                    
                    ->responsive(true)
                    ->serverSide(true)
                    ->processing(True)
                    ->autoWidth( true)
                       
                
                    ->buttons(
                      
                        Button::make('export')
                        ->title("تحميل")
                        ,
                        Button::make('print')
                        ->title("طباعة"),
                        Button::make('reset')
                        ->title("حذف البحث"),
                        Button::make('reload')
                        ->title("تحميل المنتجات الجديدة")
                        ,

                       

                    );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
           
            Column::make('id')
            ->width(10)
            ->title("رقم")
             ,
             Column::make('username')
             ->title("اسم العميل")
             ,
             Column::make('phone_number')
             ->title("رقم الموبيل ")
              ,
              Column::make('number')
              ->title(" الكميه المطلوبه"),
           
              Column::make('created_at')->title("تاريخ الطلب"),
              Column::make('product_id')
              ->title("اسم المنتج"),
              Column::make('status')
              ->title(" حالة الطلب")
               ,
               Column::make('country')
               ->title("الدوله")
                ,   Column::make('city')
                ->title("المحافظة")
                 ,
            Column::make('addres_detailes')
            ->title("العنوان بالتفصيل")
             ,
          
            Column::computed('action')
            ->title(" عمليات")
            
            ->exportable(true)
            ->printable(true)
            ->width(60)
             ,
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Orders_' . date('YmdHis');
    }
}
