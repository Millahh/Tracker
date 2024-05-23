<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * 
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'NIP' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $url = "";
            if($request->user()->role === "employer"){
                $url = "employer/dashboard";
            }elseif($request->user()->role === "employee"){
                $url = "employee/dashboard";
            }else{
                $url = "/";  
            }
            return redirect()->intended($url);
        };
        // $request->session()->regenerate();

        return redirect(route('/', absolute: false));
    
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
