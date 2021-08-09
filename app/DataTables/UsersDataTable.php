<?php

namespace App\DataTables;

use App\Models\User;
use phpDocumentor\Reflection\PseudoTypes\True_;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class UsersDataTable extends DataTable
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
               
            ->editColumn('full_name', function ($row) {
                return '<a href="'.route('users.show', $row->id).'">'.$row->full_name.'</a>';
            })
            ->rawColumns(['action', 'full_name'])
            ->addColumn('action',  function($row){
                $actionBtn = '
                 <a href="'. route('users.edit', $row->id) .'" class="edit btn btn-success btn-sm">تعديل</a>
                 <form action="'. route('users.destroy', $row->id) .'" method="POST">
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
     * @param \App\Models\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
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
                    ->setTableId('users-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                   
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
                    ->orderBy(1)
                    ->responsive(true)
                    ->serverSide(true)
                    ->processing(True)
                    ->autoWidth( true)
                       
                
                    ->scrollX(true)
                    ->scrollY(true)
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
             Column::make('full_name')
             ->title("الاسم")
             ,
            Column::make('username')
            ->title("اسم المستخدم")
             ,
          
            Column::make('phone_number')
            ->title("موبيل")
             , 
            Column::make('country')
            ->title("الدوله")
             ,
            Column::make('is_admin')
            ->title("الصلاحيه")
             ,
          
            Column::make('email')
            ->title(" البريد الاكترونى")
             ,
             Column::make('created_at')->title("تاريخ الاضافة"),

            
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
        return 'Users_' . date('YmdHis');
    }
}
