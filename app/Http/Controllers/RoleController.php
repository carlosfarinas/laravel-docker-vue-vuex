<?php

namespace App\Http\Controllers;

use App\Http\Resources\RoleResource;
use App\Models\Role;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleController extends Controller
{
    public function index()
    {
        $this->authorize('view','users');

        return RoleResource::collection(Role::all());
    }

    public function store(Request $request)
    {
        $this->authorize('edit','users');

        $role = Role::create($request->only('name'));
        $role->permissions()->attach($request->input('permissions'));

        return response(new RoleResource($role->load('permissions')), Response::HTTP_CREATED);
    }

    public function show($id)
    {
        $this->authorize('view','users');

        return new RoleResource(Role::with('permissions')->find($id));
    }

    public function update(Request $request, $id)
    {
        $this->authorize('edit','users');

        $role = Role::find($id);
        $role->update($request->only('name'));
        $role->permissions()->sync($request->input('permissions'));

        return response(new RoleResource($role->load('permissions')), Response::HTTP_ACCEPTED);
    }

    public function destroy($id)
    {
        $this->authorize('edit','users');

        Role::destroy($id);

        return \response(null, Response::HTTP_NO_CONTENT);
    }

}
