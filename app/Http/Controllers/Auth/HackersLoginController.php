<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HackersLoginController extends Controller
{
	public function __construct()
	{
		$this->middleware('guest:hacker', ['except' => ['logout']]);
	}

    public function showLogin()
    {
    	return view('auth.hacker_login');
    }

    public function login(Request $request)
    {
    	$this->validate($request, [
                'user' => 'required',
                'password' => 'required',
        ]);

    	if (Auth::guard('hacker')->attempt(['user' => $request->user, 'password' => $request->password], $request->remember)) {
    		return redirect()->intended(route('exploit.index'));
    	}

    	return redirect()->back()->withInput($request->only('user', 'remember'));

    }

    public function logout()
    {
        Auth::guard('hacker')->logout();
        return redirect()->route('exploit.login');
    }
}
