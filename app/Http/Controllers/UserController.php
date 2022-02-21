<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

use App\Models\User;

class UserController extends Controller
{
    
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user_table');
    }

    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
       $user->name = $request->input('name');
       $user->lastname = $request->input('lastname');
       $user->fechaNacimiento = $request->input('fechaNacimiento');
     
       $user->rol_id = $request->input('rol_id');

       $user->save();

       return redirect()->route('user_table');
    }


}
