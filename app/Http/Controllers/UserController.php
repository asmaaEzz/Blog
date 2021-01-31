<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function show(User $user){
        return view('admin.users.profile',['user'=>$user]);
    }
    public function update(User $user){
        $inputs = \request()->validate([
            'username'=>'required| min:4 | max:255 ',
            'name'=>'required',
            'email'=>'required ',
            'password'=>'required | confirmed'

        ]);
        if (\request('avatar')){
            $inputs['avatar']=\request('avatar')->store('images');
        }
        $user->update($inputs);
        return back();
    }
    public function index(){
        $users=User::all();
        return view('admin.users.index',['users'=>$users]);
    }
    public function destroy(User $user){
        $user->delete();
        Session::flash('user_Deleted','user was Deleted');

        return back();
    }
}
