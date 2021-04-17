<?php

namespace App\DataTables;

use App\Models\Schedule;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class SchedulesDataTable extends DataTable
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
            ->editColumn('patient_id',function($row){
                 return $row->patient->name;
            })
            ->editColumn('doctor_id',function($row){
                return $row->doctor->name;
           })
            ->addColumn('action', function($row){
                $btn ='<div style = "display:flex;" class="btn-group">';
                $btn .= '<a href="'.route("schedules.edit", $row->id).'" data-toggle="tooltip" data-original-title="Edit" class="edit btn btn-primary btn-sm editItem">Editar</a>';
                $btn .= '<button style="margin-left:5px" type="button" onclick="return (confirm(\'Tem certeza que deseja excluir?\') ? document.getElementById(\'form-'.$row->id.'\').submit() : false);" class="btn btn-sm btn-danger">Excluir</button><form action="'.route('schedules.destroy', $row->id).'" method="POST" id="form-'. $row->id .'">'.csrf_field().'<input name="_method" type="hidden" value="DELETE"></form>';
                $btn .= '</div>';
            return $btn;
         });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Schedule $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Schedule $model)
    {
        return $model->newQuery()->with('patient')->with('doctor');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('schedules-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->language('//cdn.datatables.net/plug-ins/1.10.21/i18n/Portuguese-Brasil.json')
                    ->buttons(
                        Button::make('create')->text('Novo Agendamento'),
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
            Column::make('patient_id')->title('Paciente'),
            Column::make('doctor_id')->title('Médico'),
            Column::make('schedule')->title('Horário'),
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
        return 'Schedules_' . date('YmdHis');
    }
}
