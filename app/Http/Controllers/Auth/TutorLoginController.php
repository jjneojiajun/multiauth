<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TutorLoginController extends Controller
{
    //

    public function __construct(){
        $this->middleware('guest:tutor', ['except' => ['tutorLogout']]);
    }

    public function showLoginForm(){
        return view('auth.tutor-login');
    }

    public function login(Request $request){

        //Validate the form data
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        //Attempt to log the user in
        if (Auth::guard('tutor')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)){
            return redirect()->intended(route('tutors.dashboard'));
        }

        return redirect()->back()->withInput($request->only('email', 'remember'));

    }

    public function tutorLogout()
    {
        Auth::guard('tutor')->logout();

        return redirect('/');

    }

    protected function guard()
    {
        return Auth::guard('tutor');
    }

}
