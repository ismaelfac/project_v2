<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Cms\System\RoleRepository;
use App\Repositories\Cms\System\PermissionRepository;
use App\Http\Requests\RolePermissionRequest;

class RolePermissionController extends Controller
{
    /** @var RoleRepository */
    private $RoleRepository;
    private $PermissionRepository;

    public function __construct(RoleRepository $RoleRepository, PermissionRepository $PermissionRepository)
    {
        $this->RoleRepository = $RoleRepository;
        $this->PermissionRepository = $PermissionRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        dd('entro');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\RolePermissionRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(RolePermissionRequest $request)
    {
        // Retrieve the validated input data...
        $validated = $request->validated();
        if($validated){
            $rol = $validated['id'];
            $permission = $validated['name'];
            $role_permission = $this->RoleRepository->givePermissionCmsTo($rol, $permission);
            return response()->json($role_permission);
        }else{
            return response()->json('No existe el rol o el permiso');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd('show id');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RolePermissionRequest $request, $id)
    {
        $validated = $request->validated();
        dd($validated);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
