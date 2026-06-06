<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = DB::table('users')->get();

        return view('users', compact('users'));
    }

    public function create(Request $request)
{
    $request->validate([
        'name' => 'required|min:3|max:50',
        'email' => 'required|email',
        'password' => 'required|min:6'
    ]);

    DB::table('users')->insert([
        'name' => $request->name,
        'email' => $request->email,
        'password' => $request->password
    ]);

    return redirect()->back();
}

    public function destroy($id)
    {
      $user = User::find($id);
      $user->delete();
      return redirect()->back();
    }

    public function edit($id)
    {
       $user = User::find($id);
       $users = User::all();
       return view('users', compact('user', 'users'));
    }


    public function update(Request $request)
{
    $request->validate([
        'name' => 'required|min:3|max:50',
        'email' => 'required|email',
        'password' => 'required|min:6'
    ]);

    $user = User::find($request->id);
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = $request->password;
    $user->save();

    return redirect('users');
}
}
