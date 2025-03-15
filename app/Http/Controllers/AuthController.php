<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function create() {
		return view('suth.login');

    }

    public function store() {
		return view('auth.login');
	}
	public function store(Request $request){

		$credentials = $request->validate([
			'email' => ['required', 'email'],
			'password' => ['required'],
		]);

		if(Auth::attempt($credentials)){
			$request->session()->regenerate();
			
			return redirect()->intended('/dashboard')->with('success', 'Login successful');
		}
		
		return back()->withErrors([
			'error' => 'Invalid credentials. Check the email address and password entered.',])->onlyInput('email');

    }

    public function logout(Request $request)
{
    Auth::logout(); // Log the user out

    $request->session()->invalidate(); // Invalidate the session
    $request->session()->regenerateToken(); // Regenerate the CSRF token

    return redirect('/')->with('success', 'You have been logged out!'); 
    }
}
