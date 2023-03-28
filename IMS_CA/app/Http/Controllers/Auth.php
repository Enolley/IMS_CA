<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Session;

class Auth extends Controller
{
    public function login()
    {
        return view('Auth/login');
    }

    public function registration()
    {
        return view('Auth/registration');
    }

    public function registerUser(Request $request)
    {
       $request->validate([
        'firstname'=>'required',
        'lastname'=>'required',
        'email'=>'required|email|unique:users',
        'password'=>'required|min:8|max:20',
        'department'=>'required',
        'role'=>'required',
       ]);

       $user = new User();
       $user->firstname = $request->firstname;
       $user->lastname = $request->lastname;
       $user->email = $request->email;
       $user->password = Hash::make($request->password);
       $user->department = $request->department;
       $user->role = $request->role;
       $res = $user->save();

       if($res)
       {
        return back()->with('success', 'Successful registration');
       }
       else
       {
        return back()->with('fail', 'Failed registration');
       }
    }

    public function loginUser(Request $request)
    {
         $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:8|max:20',
         ]);

        $user = User::where('email', '=', $request->email)->first();
        
        if($user)
        {
            if(Hash::check($request->password, $user->password))
            {
                $request->session()->put('loginId', $user->id);

                if($user->department!='ICT')
                {
                    return redirect('user-dashboard');
                }
                if($user->role=='Principle Officer' && $user->department=='ICT')
                {
                    return redirect('manager-dashboard');
                }
                if($user->role=='Senior Assistant Officer' && $user->department=='ICT')
                {
                    return redirect('dashboard');
                }
                if($user->role=='Contract Staff' || $user->role=='Intern' && $user->department=='ICT')
                {
                    return redirect('deliver-equipment');
                }

            }
            else
            {
                return back()->with('fail', 'This password is incorrect.');
            }
        }
        else
        {
            return back()->with('fail', 'This email is not registered.');
        }
    }

    public function logout()
    {
        if (Session::has('loginId'))
        {
            Session::pull('loginId');
            return redirect('/');
        }
    }

    
}
