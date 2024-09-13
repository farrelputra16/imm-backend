<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function redirectTo()
    {
        session()->flash('success', 'You are logged in!');
        return $this->redirectTo;
    }

    protected function attemptLogin(Request $request)
    {
        // Get the login credentials
        $credentials = $this->credentials($request);

        // Add the role condition to the credentials
        $credentials['role'] = 'ADMIN';

        // Attempt to log in with the credentials including the role
        return $this->guard()->attempt(
            $credentials,
            $request->filled('remember')
        );
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        $errors = [$this->username() => trans('auth.failed')];

        // Check if the user exists but has a different role
        if (User::where($this->username(), $request->{$this->username()})->exists()) {
            $errors = [$this->username() => 'Only admin can log in.'];
        }

        if ($request->expectsJson()) {
            return response()->json($errors, 422);
        }

        return redirect()->back()
            ->withInput($request->only($this->username(), 'remember'))
            ->withErrors($errors);
    }
}
