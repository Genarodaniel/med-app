<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\DataTables\PatientsDataTable;
use App\Rules\PhoneNumber;
use App\Connections\PatientConnection;
use Illuminate\Validation\Rule;

class PatientsController extends Controller
{

    protected $patientConnection;

    public function __construct(PatientConnection $patientConnection)
    {
        $this->patientConnection = $patientConnection;

    }
    public function index (PatientsDataTable $dataTable)
    {
        return $dataTable->render('patients.index');
    }

    /**
     * Return create patient form
     */
    public function create ()
    {
        return view('patients.create');
    }

    public function store(Request $request)
    {
        $validator = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required','unique:patients', 'string', 'email', 'max:255'],
            'date_birthday' => ['required','date_format:Y-m-d','before:today'],
            'phone_number' => ['required', new PhoneNumber],
            'cpf' =>['required' , 'cpf'],
            'gender' => ['required' , 'in:M,F']
        ]);

        $this->patientConnection->store($request->all());

        return redirect()->route('patients.index')->with('success','Paciente adicionado!');

    }

    public function destroy($id)
    {
        $patient = $this->patientConnection->destroy($id);

        return redirect()->route('patients.index')->with('success', 'Paciente deletado!');

    }

    public function edit($id)
    {
        $patient = $this->patientConnection->show($id);

        if (!$patient) {
            return redirect()->route('patients.index')->with('error','Paciente não encontrado');
        }

        return view('patients.edit')->with(compact('patient'));
    }

    public function update(Request $request, $id)
    {
        $validator = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required',Rule::unique('users')->ignore($id), 'email', 'max:255'],
            'date_birthday' => ['required','date_format:Y-m-d','before:today'],
            'phone_number' => ['required', new PhoneNumber],
            'cpf' =>['required' , 'cpf'],
            'gender' => ['required' , 'in:M,F']
        ]);

        $patient = $this->patientConnection->update($id,$request->all());

        return redirect()->route('patients.index')->with('success','Paciente editado!');

    }
}
