<?php

namespace App\DataTables;

use App\Models\Product;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ProductsDataTable extends DataTable
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
            ->editColumn('product_name', function ($row) {
                return '<a href="'.route('products.show', $row->id).'">'.$row->product_name.'</a>';
            })
            ->editColumn('user_id', function ($row) {
                return ''.$row->user->username.'القسم';
            })
         //->editColumn('img', function ($row) {
          //  return '<img src="{{ asset(\'dist/img/' + $row->img + '\')}}" alt="' +  + '"height="16" width="16"/>';
          // })
            ->rawColumns(['action', 'product_name','img','user_id'])
            ->addColumn('action',  function($row){
                $actionBtn = '
                 <a href="'. route('products.edit', $row->id) .'" class="edit btn btn-success btn-sm">تعديل</a>
                 <form action="'. route('products.destroy', $row->id) .'" method="POST">
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
    public function query(Product $model)
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
                    ->setTableId('products-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->ord
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
             Column::make('product_name')
             ->title("الاسم")
             ,
             Column::make('price')
             ->title("السعر")
              ,
              Column::make('categore')
              ->title("القسم")
               ,
              Column::make('quantity')
              ->title("الكميه"),
              Column::make('country')
              ->title("الدوله")
               ,
              Column::make('created_at')->title("تاريخ الاضافة"),
              Column::make('user_id')
              ->title("المسؤل"),
              Column::make('discound')
              ->title("%الخصم")
               ,
              
              Column::make('made_by')
              ->title("الشركة المصنعه"),
           
           
            Column::make('discription')
            ->title("الوصف")
             ,
          
          
           
          
         
             Column::make('img')
             ->title("الصوره"),
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
        return 'Products_' . date('YmdHis');
    }
}
