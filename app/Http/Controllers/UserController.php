<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{

    public function getUsers(){
        $users = User::get();
        return $users;
    }

    public function create(Request $request){
        
        $data = $request->validate([
            'name' => 'string|required',
            'email' => 'string|required',
            'password' => 'required|confirmed',
        ]);

        $data['password'] = Hash::make($data['password']);

        User::create($data);

        return redirect()->route('superAdminDashboardShow');
    }

    public function createForm(){
        return view('createUserDashboard');
    }

    public function update(Request $request, User $user){
        
        $validated = $request->validate([
            'name' => 'string',
            'email' => ['string', 'required', Rule::unique('users')->ignore($user->id)],
        ]);
        
        $user->update($validated);

        return redirect()->route('superAdminDashboardShow');
    }

    public function updateForm(User $user){
        return view('userInfoUpdate', compact('user'));
    }

    public function delete(User $user){
        $user->delete();
        return redirect()->route('superAdminDashboardShow');
    }

}
