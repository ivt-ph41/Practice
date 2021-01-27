<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);
        $user = User::create($data);
        $user->roles()->attach($request->role_id, ['created_at' => now(),'updated_at' => now()] ); // add 1 role cho user
        // add nhieu quyen cho 1 user 
        // $user->roles()->attach([
        //     '1' => ['created_at' => now(),'updated_at' => now()],
        //     '2' => ['created_at' => now(),'updated_at' => now()]
        //     ]);
        return redirect()->route('users.index')->with(['success' => 'Success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = Role::all();
        $user = User::with('roles')->find($id);
        // dd($user->roles);
        return view('users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // DB::transaction(function () {
            
        // });
        $user = User::find($id);
        $data = $request->except('_token', '_method', 'role_id');
        $data['password']  = bcrypt($data['password']);
        $user->update($data);
        $user->roles()->sync($request->role_id);
        return 'success';
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
