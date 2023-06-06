<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Http\Requests\StorePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.permission.index', [
            'permissions' => Permission::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePermissionRequest $request)
    {
        Permission::create([
            'permission' => $request->permission,
        ]);

        return redirect('/permission')->with(
            'success',
            "Permission $request->permission has been Added"
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Permission $permission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        UpdatePermissionRequest $request,
        Permission $permission
    ) {
        Permission::where('id', $permission->id)->update([
            'permission' => $request->permission,
        ]);

        return redirect('/permission')->with(
            'success',
            "User Permission $request->permission has been updated!"
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();

        return redirect('/permission')->with(
            'success',
            "User Permission $permission->permission has been deleted!"
        );
    }
}
