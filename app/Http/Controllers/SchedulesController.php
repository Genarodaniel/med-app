<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Connections\DoctorConnection;
use App\Connections\PatientConnection;
use App\Connections\ScheduleConnection;
use App\DataTables\SchedulesDataTable;


class SchedulesController extends Controller
{
    protected $scheduleConnection, $doctorConnection, $patientConnection;

    public function __construct(
        ScheduleConnection $scheduleConnection,
        PatientConnection $patientConnection,
        DoctorConnection $doctorConnection
    )
    {
        $this->scheduleConnection = $scheduleConnection;
        $this->doctorConnection = $doctorConnection;
        $this->patientConnection = $patientConnection;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SchedulesDataTable $dataTable)
    {
        return $dataTable->render('schedules.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $doctors = $this->doctorConnection->listAll();
        $patients = $this->patientConnection->listAll();

        return view('schedules.create')->with(compact([
            'doctors',
            'patients',
        ]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => ['required'],
            'doctor_id' => ['required'],
            'schedule' => ['required',  'after:'.date('Y-m-d')]
        ]);

        $this->scheduleConnection->store($request->all());

        return redirect()->route('schedules.index')->with('success','Agendamento Realizado');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $schedule = $this->scheduleConnection->show($id);

        if (!$schedule) {
            return redirect()->route('schedules.index');
        }

        $doctors = $this->doctorConnection->listAll();
        $patients = $this->patientConnection->listAll();

        return view('schedules.edit')->with(compact([
            'doctors',
            'patients',
            'schedule'
        ]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'patient_id' => ['required'],
            'doctor_id' => ['required'],
            'schedule' => ['required',  'after:'.date('Y-m-d')]
        ]);

        $this->scheduleConnection->update($id,$request->all());

        return redirect()->route('schedules.index')->with('success', 'Agendamento editado!');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $this->scheduleConnection->destroy($id);

        return redirect()->route('schedules.index')->with('success', 'Agendamento deletado!');
    }
}
