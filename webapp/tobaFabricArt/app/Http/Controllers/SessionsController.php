<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function create()
    {
        return view('Login');
    }
    
    public function store()
    {
        if (auth()->attempt(request(['username', 'password'])) == false) {
            return back()->withErrors([
                'message' => 'The username or password is incorrect, please try again'
            ]);
        }
        
        if (auth()->check() && auth()->user()->status == 'penjual') {
            // Redirect to seller dashboard
            return redirect()->route('seller');
        }

        // Redirect to home page for other users
        return redirect()->to('/');
    }

    public function destroy()
    {
        auth()->logout();
        
        return redirect()->to('/');
    }
}
