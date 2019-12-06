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
        $departament = Departament::create($request->all());
        return redirect()->route('departaments.edit', $departament->id)->with('info', 'Estado Guardado con Exito');
    }

    public function show($id)
    {
        $departaments = Country::find($id)->departaments()->where('country_id', $id)->get();
        return response()->json($departaments, 200);
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
        return redirect()->route('departaments.edit')->with('info', 'Estado Actualizado con Exito');
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
