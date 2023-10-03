<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ApiService;
use Illuminate\Support\Facades\Session;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    protected $apiService;

    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    /**
     * show login form for admin guard
     *
     * @return void
     */
    public function showLoginForm()
    {
        return view('backend.auth.login');
    }


    /**
     * login admin
     *
     * @param Request $request
     * @return void
     */
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

          //      dd($response);
            if (isset($response['token_key'])) {
                // Store the user data in the session
                session([
                    'user' => $response['user'],
                    'access_token' => $response['token_key'],
                    'refresh_token' => $response['refresh_token_key'],
                    // ... other user data you might want to store
                ]);
        
                return redirect(route('admin.dashboard')); // Redirect to the dashboard or any other authenticated route
            } else {
                return redirect(route('admin.login'))->with('error', 'Invalid credentials');
            }
        } catch (\Exception $e) {
            return redirect(route('admin.login'))->with('error', 'Error occurred while logging in');
        }
    }

    /**
     * logout admin guard
     *
     * @return void
     */
    public function logout()
    {
        // Clear the session data
        Session::forget('user');
        Session::forget('access_token');
        Session::forget('refresh_token');
        // Optionally, you can also use Session::flush() to clear all session data:
        // Session::flush();

        // Redirect to the login page
        return redirect()->route('admin.login');
    }
}
