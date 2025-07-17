<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(){
        $data = Client::paginate() ;
        return view('clients.index', compact('data'));
    }

    public function create(){
        return view('clients.create');
    }
    public function store(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);
        try {
            Client::create($data);
        }catch (\Exception $e){
            return back()->withErrors(['error' => $e->getMessage()]);
        }
        return redirect()->back()->with('success', 'Client added successfully');
    }
}
