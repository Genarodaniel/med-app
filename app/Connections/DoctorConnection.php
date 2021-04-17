<?php

namespace App\Connections;

use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorConnection {

    public function list()
    {
        return Doctor::paginate(30);
    }

    public function listAll()
    {
        return Doctor::all();
    }

    public function show($id)
    {
        $doctor = Doctor::find($id);

        if (!$doctor) {
            return false;
        }

        return $doctor;
    }

    public function store($request)
    {
        return Doctor::create($request);
    }

    public function update($id, $fields = [])
    {
        $doctor = $this->show($id);

        if (!$doctor) {
            return false;
        }

        $doctor->fill($fields);
        $doctor->save();

        return $doctor;
    }

    public function destroy($id)
    {

        $doctor = $this->show($id);

        if (!$doctor) {
            return false;
        }

        return $doctor->delete();
    }

}
