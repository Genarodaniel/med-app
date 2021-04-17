<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Connections\DoctorConnection;

class Doctorscontroller extends Controller
{
    protected $doctorConnection;

    public function __construct(DoctorConnection $doctorConnection)
    {
        $this->doctorConnection = $doctorConnection;
    }

    public function getDoctors()
    {
        $doctors = $this->doctorConnection->list();

        return $doctors;
    }

}
