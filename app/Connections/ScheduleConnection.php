<?php

namespace App\Connections;

use App\Models\Schedule;

class ScheduleConnection {

    public function list()
    {
        return Schedule::paginate(30);
    }

    public function listAll()
    {
        return Schedule::all();
    }

    public function show($id)
    {
        $schedule = Schedule::find($id);

        if (!$schedule) {
            return false;
        }

        return $schedule;
    }

    public function store($request)
    {
        return Schedule::create($request);
    }

    public function update($id, $fields = [])
    {
        $schedule = $this->show($id);

        if (!$schedule) {
            return false;
        }

        $schedule->fill($fields);
        $schedule->save();

        return $schedule;
    }

    public function destroy($id)
    {

        $schedule = $this->show($id);

        if (!$schedule) {
            return false;
        }

        return $schedule->delete();
    }

}
