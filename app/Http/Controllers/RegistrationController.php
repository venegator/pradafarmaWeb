<?php

namespace App\Http\Controllers;

use App\User;

class RegistrationController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    
    public function create()
    {
    	return view('registration.create');
    }

    public function store()
    {
    	//validate the form

    	$this->validate(request(), [
    		'name' => 'required' ,
    		'email' => 'required|email',
    		'password' => 'required|confirmed'
    	]);

    	//Create and save the user.

        $user = User::create([ 
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password'))
        ]);

    	//Sign them in

    	auth()->login($user);

    	//redirect

        session()->flash('message', 'Gracias por registrarte');

    	return redirect()->home();
    }
}
