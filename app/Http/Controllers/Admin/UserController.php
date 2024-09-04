<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //        $users=User::all();

        $users = User::Paginate(15);

        return view('admin.users.index', compact(['users']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        User::create($request->all());

        return redirect()->route('users.index')->with('success', 'Usuário Cadastrado com Sucesso');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (!$user = User::find($id)) {

            return redirect()->route('users.index')->with('message', 'Usuário não encontrado');
        }

        return view('admin.users.edit', compact(['user']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (!$user = User::find($id)) {

            return redirect()->route('users.index')->with('message', 'Usuário não encontrado');
        }

        $user->update($request->all());

        return redirect()->route('users.index')->with('success', 'Usuário Editado com Sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (!$user = User::find($id)) {

            return redirect()->route('users.index')->with('message', 'Usuário não encontrado');
        }

        $user->delete();

        return redirect()->route('users.index')->with('success', 'Usuário Editado com Sucesso');
    }
}
