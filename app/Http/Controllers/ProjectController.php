<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRequest;
use App\Models\Client;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){
        $data = Project::with('client','user','tasks')->paginate();
        return view('projects.index',compact('data'));
    }

    public function create(){
        $users= User::all();
        $clients = Client::all() ;
        return view('projects.create',compact('users','clients'));
    }

    public function store(StoreProjectRequest $request){
        $data = $request->validated() ;
        Project::create($data);
        return redirect()->back()->with('success','Project created successfully');
    }

    public function show(Project $project){
        return view('projects.show',[
            'project' => $project->load('client','user','tasks')
        ]);
    }

}
