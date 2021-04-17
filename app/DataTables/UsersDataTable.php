<?php

namespace App\DataTables;

use App\Models\User;
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
        $btn = '';
        return datatables()
            ->eloquent($query)
            ->addColumn('action', function($row){
                if($row->id === auth()->user()->id){

                    $btn ='<div style = "display:flex;" class="btn-group">';
                    $btn .= '<a href="'.route("users.edit", $row->id).'" data-toggle="tooltip" data-original-title="Edit" class="edit btn btn-primary btn-sm editItem">Editar</a>';
                    $btn .= '<button style="margin-left:5px" type="button" onclick="return (confirm(\'Tem certeza que deseja excluir?\') ? document.getElementById(\'form-'.$row->id.'\').submit() : false);" class="btn btn-sm btn-danger">Excluir</button><form action="'.route('users.destroy', $row->id).'" method="POST" id="form-'. $row->id .'">'.csrf_field().'<input name="_method" type="hidden" value="DELETE"></form>';
                    $btn .= '</div>';

                    return $btn;
                }
         })
         ->editColumn('created_at', function(User $user) {
            return $user->created_at->format('d/m/Y H:i:s');
        });
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
                    ->orderBy(1)
                    ->language('//cdn.datatables.net/plug-ins/1.10.21/i18n/Portuguese-Brasil.json')
                    ->buttons(
                        Button::make('create')->text('Novo usuário'),
                        Button::make('export')->text('Exportar'),
                        Button::make('print')->text('Imprimir')
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
            Column::make('name')->title('Nome'),
            Column::make('email')->title('E-mail'),
            Column::make('created_at')->title('Data adição'),
            Column::computed('action', 'Ações')
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
    protected function filename()
    {
        return 'Users_' . date('YmdHis');
    }
}
