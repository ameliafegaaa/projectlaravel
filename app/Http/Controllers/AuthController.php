<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('welcome');
    }

    public function signin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
    
        $user = User::where('email', $credentials['email'])->first();
    
        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            $request->session()->flash('fail', 'Email atau Password salah.');
            return redirect()->intended('/login');
        }
    
        Auth::login($user);
        $user->unhashed_password = $credentials['password'];
        $request->session()->regenerate();
        $request->session()->put('user', $user);
        

        if($user->role == 'admin')
            return redirect()->intended('/dashboard');
        else
            return redirect()->intended('/');
    }

    public function signup(Request $request) {

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'phone_number' => 'required',
        ], [
            'name.required' => 'Please enter your name.',
            'email.required' => 'Please enter your email address.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email address is already taken.',
            'password.required' => 'Please enter a password.',
            'password.min' => 'Your password must be at least :min characters long.',
            'password.confirmed' => 'Your password confirmation does not match.',
            'phone_number.required' => 'Please enter your phone number.',
        ]);

        $user = new User([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'phone_number' => $request->input('phone_number'),
            'role' => 'customer',
        ]);
        $user->save();

        return redirect('/login')->with('success', 'Sign up success.');
    }

    public function signout(Request $request) {
        $request->session()->flush();
        return redirect()->intended('/');
    }
}
