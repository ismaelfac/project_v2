<?php

namespace App\Http\Controllers\Parameters;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Modelsgenerals \{
    Departament, Country
};

class DepartamentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departaments = Departament::getDepartamentAttribute();
        return view('admin2.parameters.departaments.index', compact('departaments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::paginate(5);
        return view('admin2.parameters.departaments.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        dd($request->all());
        $departament = Departament::create($request->all());
        return redirect()->route('departaments.edit', $departament->id)->with('info', 'Estado Guardado con Exito');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Departament $departament)
    {
        //
        return view('admin2.parameters.departaments.edit', compact('departament'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Departament $departament)
    {
        $departament->update($request::all()); //update dep$departament
        $departament->country()->sync($request->get('country')); //update country
        return redirect()->route('departaments.edit', $user->id)->with('info', 'Estado Actualizado con Exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Departament $departament)
    {
        $departament->delete();
        return back()->with('info', 'Departamento Eliminado Correctamente');
    }
}
