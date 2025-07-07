<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

use App\Helpers\LoggerHelper;

class AuthenticatedSessionController extends Controller
{
    public function create(): View
    {
        return view('user.auth.login');
    }

    public function store(LoginRequest $request): RedirectResponse
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();

            if ($user->status !== 1) {
                Auth::logout();
                return redirect()->back()->withErrors(['email' => 'Your account is pending activation.']);
            }

            $request->session()->regenerate();

            LoggerHelper::log('auth', 'login', "[{$user->email}] User logged in successfully.");

            return redirect()->intended(route('index', absolute: false));
        }
        return redirect()->back()->withErrors(['email' => 'These credentials do not match our records.']);
    }

    public function destroy(Request $request): RedirectResponse
    {
        $user = Auth::user();

        LoggerHelper::log('auth', 'logout', "[{$user->email}] User logout in successfully.");

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
