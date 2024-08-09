<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class MasterUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('users.index');
    }

    public function create(){
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'role' => 'kasir'
        ];

        $create = User::create($data);

        if ($create){
            return redirect('data-users');
        }else{
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $users = User::where('id', $id)->first();
        return view('users.edit', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        $edit = User::where('id', $id)->update($data);

        if ($edit){
            return redirect('data-users');
        }else{
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::where('id', $id)->delete();

        if ($user){
            return redirect('data-users');
        }else{
            return back();
        }
    }
}
