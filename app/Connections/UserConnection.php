<?php

namespace App\Connections;

use App\Models\User;
use Illuminate\Http\Request;

class UserConnection {

    public function list()
    {
        return User::paginate(30);
    }

    public function listAll()
    {
        return User::all();
    }

    public function show($id)
    {
        $user = User::find($id);

        if (!$user) {
            return false;
        }

        return $user;
    }

    public function store($request)
    {
        return User::create($request);
    }

    public function update($id, $fields = [])
    {
        $user = $this->show($id);

        if (!$user) {
            return false;
        }

        $user->fill($fields);
        $user->save();

        return $user;
    }

    public function destroy($id)
    {

        $user = $this->show($id);

        if (!$user) {
            return false;
        }

        return $user->delete();
    }

}
