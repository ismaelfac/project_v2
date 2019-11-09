<?php

namespace App\Http\Controllers\Parameters;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Modelsgenerals\Country;

class CountryController extends Controller
{
    public function index()
    {
        $countries = Country::paginate(5);
        return response()->json($countries, 200);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles_unique = Role::where('special', 'all-access')->orWhere('special', 'no-access')->get();
        $roles_personalized = Role::where('special', null)->paginate(5);
        return view('admin2.modules.users.create', compact('roles_unique', 'roles_personalized'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $permission = Permission::create($request::all());
        return redirect()->route('permissions.edit', $permission->id)->with('info', 'Usuario Guardado con Exito');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        return view('admin2.modules.permissions.edit', compact('permission'));
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
        $user->update($request::all()); //update user
        $user->roles()->sync($request->get('roles')); //update roles
        return redirect()->route('users.edit', $user->id)->with('info', 'Usuario Actualizado con Exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if ($user->is_active) {
            $user->update(['is_active' => false]);
            return back()->with('info', 'Usuario Desactivado Correctamente');
        } else {
            $user->update(['is_active' => true]);
            return back()->with('info', 'Usuario Activado Correctamente');
        }
    }
}
