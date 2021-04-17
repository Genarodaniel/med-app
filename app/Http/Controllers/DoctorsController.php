<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\PhoneNumber;
use App\Connections\DoctorConnection;
use Illuminate\Validation\Rule;
use App\DataTables\DoctorsDataTable;

class DoctorsController extends Controller
{
    protected $doctorConnection;

    public function __construct(DoctorConnection $doctorConnection)
    {
        $this->doctorConnection = $doctorConnection;

    }
    public function index (DoctorsDataTable $dataTable)
    {
        return $dataTable->render('doctors.index');
    }


    public function create ()
    {
        return view('doctors.create');
    }

    public function store(Request $request)
    {
        $validator = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required','unique:doctors', 'string', 'email', 'max:255'],
            'phone_number' => ['required', new PhoneNumber],
            'crm' =>['required'],
            'specialty' => ['required', 'max:255', 'string'],
            'gender' => ['required' , 'in:M,F']
        ]);

        $this->doctorConnection->store($request->all());

        return redirect()->route('doctors.index')->with('success','Médico adicionado!');

    }

    public function destroy($id)
    {
       $this->doctorConnection->destroy($id);

        return redirect()->route('doctors.index')->with('success', 'Médico deletado!');

    }

    public function edit($id)
    {
        $doctor = $this->doctorConnection->show($id);

        if (!$doctor) {
            return redirect()->route('doctors.index')->with('error','Médico não encontrado');
        }

        return view('doctors.edit')->with(compact('doctor'));
    }

    public function update(Request $request, $id)
    {

        $validator = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', Rule::unique('doctors')->ignore($id), 'string', 'email', 'max:255'],
            'phone_number' => ['required', new PhoneNumber],
            'specialty' => ['required', 'max:255', 'string']
        ]);

        $this->doctorConnection->update($id,$request->all());

        return redirect()->route('doctors.index')->with('success','Médico editado!');

    }
}
