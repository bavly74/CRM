<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionController extends Controller
{
    public function index()
    {
        $data = Role::with('permissions')->get();
        return view('roles.index', compact('data'));
    }

    public function create()
    {
        return view('roles.create');
    }

    public function store( Request $request)
    {
        $data=$request->validate([
            'name'=>'required',
        ]);
        Role::create($data);
        return redirect()->back()->with('success','Role created successfully');
    }

    public function syncPermission($id)
    {
        $role = Role::with('permissions')->findOrFail($id);
        $permissions = Permission::all();
        return view('roles.sync-permissions',compact('permissions','role'));
    }

    public function StoreSyncPermission(Request $request ,$id){
        $role = Role::with('permissions')->findOrFail($id);
        $role->syncPermissions($request->permissions);
        return redirect()->back()->with('message','Permissions Synced Successfully');

    }
}
