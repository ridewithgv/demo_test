<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\ApiService;



class LoginController extends Controller
{

    protected $apiService;

    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function create()
    {
        return view('session.login-session');
    }

    public function login(Request $request)
    {
        $attributes = request()->validate([
            'email'=>'required|email',
            'password'=>'required' 
        ]);

        try {
           
            $response = $this->apiService->post('/api/v2/token', [
                'email' => $request->input('email'),
                'password' => $request->input('password'),
            ]);

            if (isset($response['token_key'])) {
                // Store the user data in the session
                session([
                    'user' => $response['user'],
                    'access_token' => $response['token_key'],
                    'refresh_token' => $response['refresh_token_key'],
                    // ... other user data you might want to store
                ]);
        
                return redirect('/dashboard'); // Redirect to the dashboard or any other authenticated route
            } else {
                return redirect('/login')->with('error', 'Invalid credentials');
            }
        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'Error occurred while logging in');
        }
    }
    
    public function destroy()
    {

        Auth::logout();

        return redirect('/login')->with(['success'=>'You\'ve been logged out.']);
    }
}
