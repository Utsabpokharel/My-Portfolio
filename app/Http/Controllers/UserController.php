<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //index
    public function index()
    {
        $roles = Role::all();
        $user = User::orderBy('id', 'desc')->get();
        return view('Backend.User.view', compact('user', 'roles'));
    }
    //create
    public function create()
    {
        $role = Role::all();
        return view('Backend.User.add', compact('role'));
    }
    //store
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
            'status' => 'required',
            'role' => 'required',
            'contact' => 'required',
            'password' => 'required',
            'dob' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'degree' => 'required',
        ]);

        $data = $request->except('confirm_password');
        $password = Hash::make($request->password);
        $data['password'] = $password;
        $user = User::create($data);
        return redirect()->route('user.index')->with('success', 'User added sucessfully');
    }
    //details
    public function show($id)
    {
        //
    }
    //edit
    public function edit($id)
    {
        $role = Role::all();
        $user = User::findorfail($id);
        return view('Backend.User.edit', compact('user', 'role'));
    }
    //update
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'status' => 'required',
            'role' => 'required',
            'contact' => 'required',
            'dob' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'degree' => 'required',
        ]);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->status = $request->status;
        $user->contact = $request->contact;
        $user->address = $request->address;
        $user->dob = $request->dob;
        $user->gender = $request->gender;
        $user->degree = $request->degree;
        $update = $user->save();
        if ($update) {
            return redirect()->route('user.index')->with('success', 'Users details updated successfully');
        } else {
            return redirect()->back()->with('error', 'Some error occured while updating Admin');
        }
    }
    public function destroy(User $user)
    {
        $user = User::find($user);
        $user->delete();
        return redirect()->route('user.index')->with('warning', 'Deleted Successfully');
    }
}
