<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Mail\CreateUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data= User::with('roles')->paginate() ;
        return view('users.index', ['data'=>$data]);
    }

    public function create()
    {
        $roles = Role::all() ;
        return view('users.create', ['roles'=>$roles]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $data = $request->validated();
        $user = User::create($data) ;
        $user->assignRole($request->roles);
        Mail::to($user->email)->send( new CreateUser($user) );
        return redirect()->back()->with('success', 'User created successfully') ;
    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }


    public function delete(User $user)
    {
        $user->delete() ;
        return redirect()->back()->with('success', 'User deleted successfully') ;
    }

    public function showDeletedUsers()
    {
        $data= User::onlyTrashed()->paginate() ;
        return view('users.deleted', ['data'=>$data]);
    }

    public function restore($id){
        $user=User::withTrashed()->findOrFail($id);
        $user->restore() ;
        return redirect()->back()->with('success', 'User restored successfully') ;
    }

}
