<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function UserSignUp(Request $request)
    {
        $this->validate($request,[
            "email"=>"required|email|unique:users",
            "name"=>"required|max:20",
            "password"=>"required|min:4",

        ]);
        $user=new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=bcrypt($request->password);
        $user->save();
        Auth::login($user);
        return redirect("/dashboard");
    }
    public function UserSignIn(Request $request)
    {
        if(Auth::attempt(['email'=>$request->email,"password"=>$request->password ])){
            return redirect("/dashboard");
        }
        return redirect()->back();
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->refresh();
    }

    public function getAccount()
    {
        return view("account",['user'=>Auth::user()]);
    }

    public function save(Request $request)
    {
//        $this->validate($request,[
//           "name"=>"required"
//        ]);
//        $user=Auth::user();
          return $request->all();
//        $user->update();
//        return redirect()->back();

    }
}
