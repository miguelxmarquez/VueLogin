<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $users = User::orderBy('id','DESC')->paginate(5);
        $roles = Role::orderBy('id','ASC')->pluck('name', 'id');
       
        return view('admin.users.index', ['users' => $users, 'roles' => $roles]); 
    }

    public function create(){
        $roles = Role::orderBy('id','ASC')->pluck('name', 'id');
        
        return view('admin.users.new')->with([
            'roles' => $roles
         ]);  
    }

    public function show($id){
          $user = User::findOrFail($id);
          $roles = Role::orderBy('id','ASC')->pluck('name', 'id');
        
          return view('admin.users.profile', ['user' => $user, 'roles' => $roles]);
    }

    public function edit($id){
        $user = User::find($id);
        $roles = Role::orderBy('id','ASC')->pluck('name', 'id');

        return view('admin.users.edit', ['user' => $user, 'roles' => $roles]);
    }

    public function update(Request $request, User $user){

        $user->fill($request->all());
        $user->notify(new NotificationUser());

        $user->save();

        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required|min:5',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8'
        ]);

        try {

            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'role' => $request->role,
                'status' => $request->status,
                'password' => $request->password,
            ]);
            return redirect()->route('users.index')->with('success', 'User saved successfully');

        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->route('users.index')->with('error', 'User cant saved, try later');

        }

    }

    public function destroy($id){
        $user = User::findorfail($id);
        $user->delete();
        
        return redirect()->route('users.index')->with('success', 'User deleted successfully');
        
        
    }
}
