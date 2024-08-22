<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\account;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class RegisteredUserController extends Controller
{
    public function render_register()  {
        return view('auth.register');
    }
  

    public function register_akun(Request $request)
    {
       
    
        $request->validate([
            'name' => 'required',
            'email' => 'required|string|email|unique:accounts,email',
            'password' => 'required',
        ]);
    
        try {
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ];
    
            Account::create($data);
    
            return redirect()->route('login')->with('success', 'Registration successful! You can now login.');
        } catch (\Exception $e) {
            Log::error('Error creating account: ' . $e->getMessage());
            return redirect()->route('register')->with('error', 'Error creating account: ' . $e->getMessage());
        }
    }
    


    public function render_login() {
        return view('auth.login');
    }
    

    public function auth_login(Request $request)
    {
        // Validate the login form data
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
    
        // Retrieve the account with the provided email
        $user = Account::where('email', $request->email)->first();
    
        // Use Hash::check to compare the plain text password with the hashed password
        if ($user && Hash::check($request->password, $user->password)) {
            // If the user exists and the password is correct, log them in
            session_start();
            $_SESSION['email'] = $user->email;
            $_SESSION['name'] = $user->name;
            return redirect('dashboard')->with('success', 'You are logged in!');
        } else {
            // If the credentials don't match, redirect back to the login form
            return redirect('login')->with('error', 'Login details are not valid');
        }
    }
    
    

     public function logout() {
        session_start();
        session_destroy(); // Destroy the session

        return redirect()->route('login')->with('success', 'You have been logged out');
    }

}
