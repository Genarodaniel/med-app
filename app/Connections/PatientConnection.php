<?php

namespace App\Connections;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientConnection {

    public function list()
    {
        return Patient::paginate(30);
    }

    public function listAll()
    {
        return Patient::all();
    }

    public function show($id)
    {
        $patient = Patient::find($id);

        if (!$patient) {
            return false;
        }

        return $patient;
    }

    public function store($request)
    {
        return Patient::create($request);
    }

    public function update($id, $fields = [])
    {
        $patient = $this->show($id);

        if (!$patient) {
            return false;
        }

        $patient->fill($fields);
        $patient->save();

        return $patient;
    }

    public function destroy($id)
    {

        $patient = $this->show($id);

        if (!$patient) {
            return false;
        }

        return $patient->delete();
    }

}
