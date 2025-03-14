<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function create() {
		return view('login-form');

    }

    public function store() {
		return view('login-form');
	}
	public function store(Request $request){

		$credentials = $request->validate([
			'email' => ['required', 'email'],
			'password' => ['required'],
		]);
		if(Auth::attempt($credentials)){
			$request->session()->regenerate();
			
			return redirect('dashboard');
		}
		
		return back()->withErrors([
			'email' => 'Invalid credentials. Check the email address and password entered.',])->onlyInput('email');

    }
}
