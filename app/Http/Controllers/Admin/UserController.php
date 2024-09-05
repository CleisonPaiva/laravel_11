<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

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
        User::create($request->validated());

        return redirect()->route('users.index')->with('success', 'Usuário Cadastrado com Sucesso');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if (!$user = User::find($id)) {

            return redirect()->route('users.index')->with('message', 'Usuário não encontrado');
        }

        return view('admin.users.show', compact(['user']));
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
    public function update(UpdateUserRequest $request, string $id)
    {
        if (!$user = User::find($id)) {

            return redirect()->route('users.index')->with('message', 'Usuário não encontrado');
        }

        /*         $data=$request->validated();
 */

        $data = $request->only('name', 'email');
   
        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }

        $user->update($data);

        return redirect()->route('users.index')->with('success', 'Usuário Editado com Sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       /*  if(Gate::denies('is-admin')){

            return redirect()->route('users.index')->with('message', 'Acesso não autorizado');
        } */

        if (!$user = User::find($id)) {

            return redirect()->route('users.index')->with('message', 'Usuário não encontrado');
        }


        if($user->id === Auth::user()->id){ 
            return back()->with('message', 'Você não pode apagar o seu próprio perfil');
        }

        $user->delete();

        return redirect()->route('users.index')->with('success', 'Usuário Apagado com Sucesso');
    }
}
