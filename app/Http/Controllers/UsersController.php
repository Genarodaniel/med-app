<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Connections\UserConnection;
use App\DataTables\UsersDataTable;
use Illuminate\Validation\Rule;

class UsersController extends Controller
{
    protected $userConnection;

    public function __construct(UserConnection $userConnection)
    {
        $this->userConnection = $userConnection;
    }

    public function index (UsersDataTable $dataTable)
    {
        return $dataTable->render('users.index');
    }

    /**
     * Return create user form
     */
    public function create ()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required','unique:users', 'string', 'email', 'max:255'],
            'password' => ['required' , 'min:8','confirmed']
        ]);

        $this->userConnection->store($request->all());

        return redirect()->route('users.index')->with('success','Usuário adicionado!');

    }

    public function destroy($id)
    {
        $this->userConnection->destroy($id);

        return redirect()->route('users.index')->with('success', 'Usuário deletado!');

    }

    public function edit($id)
    {
        $user = $this->userConnection->show($id);

        if (!$user) {
            return redirect()->route('users.index')->with('error','Usuário não encontrado');
        }

        return view('users.edit')->with(compact('user'));
    }

    public function update(Request $request, $id)
    {

        $validator = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', Rule::unique('users')->ignore($id), 'string', 'email', 'max:255'],
            'password' => ['required' , 'min:8','confirmed']
        ]);

        $this->userConnection->update($id,$request->all());

        return redirect()->route('users.index')->with('success','Usuário editado!');

    }

}
