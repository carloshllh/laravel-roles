<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Caffeinated\Shinobi\Models\Role;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$users = User::paginate();
        $users = User::all();
        $roles = Role::get();

        return view('users.index', compact('users','roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$roles = Role::get();
        $roles = Role::pluck('name','id');
        $roles_sel = Role::pluck('name','id');

        return view('users.create', compact('roles','roles_sel'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
//         $data = request()->all();
//         dd($data);
        $data = request()->validate([
            'name' => 'required',
            'email' => ['required','email','unique:users,email'],
            'password' => ['required','min:6'],
            'roles' => 'required',
        ],[
            'name.required' => 'El campo es obligatorio',
            'email.email' => 'Dirección de correo inválida',
            'email.required' => 'El campo es obligatorio',
            'email.unique' => 'Dirección de correo ya ingresada',
            'password.required' => 'El campo es obligatorio',
            'password.min' => 'Longitud mínima: 10 caracteres',
            'roles.required' => 'El campo es obligatorio',
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
        //dd($data);
        //$user->roles()->sync($request->get('roles'));
        $user->assignRole($data['roles']);
        return redirect()->route('users.index')->with('info', 'Usuario guardado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //$roles = Role::get();
        $roles = Role::pluck('name','id');

        return view('users.edit', compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
        //$user = User::find($id);
        $user->update($request->all());

        //$user->roles()->sync($request->get('role_id'));
        $user->roles()->sync($request->get('roles'));

        return redirect()->route('users.edit', $user->id)
            ->with('info', 'Usuario actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
        $user->delete();
        return redirect()->route('users.index')->with('info', 'Usuario eliminado con éxito');

    }
}
