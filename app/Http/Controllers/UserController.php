<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Menampilkan halaman register
     *
     *
     */
    public function showRegisterView()
    {
        return view('register');
    }

    /**
     * Menangani pendaftaran user
     *
     *
     */
    public function register(Request $request): RedirectResponse
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users',
            'password' => [
                'required',
                'string',
                Password::min(8)
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
                    ->uncompromised(),

            ],
            'name' => 'required|string',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        }
        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'name' => $request->name,
            'role' => sizeof(User::get()) == 0 ? 'admin' : 'basic',
        ]);
        if (
            $user
        ) {
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'register-error' => 'Data gagal disimpan',
        ]);
    }
    /**
     * Menampilkan halaman login
     *
     *
     */
    public function showLoginView()
    {
        return view('login');
    }

    /**
     * Menangani autentikasi atau login user
     *
     *
     */
    public function login(Request $request): RedirectResponse
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required|string',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        }

        $remember = $request->has('remember_me');

        if (
            Auth::attempt([
                'email' => $request->email,
                'password' => $request->password,
            ], $remember)
        ) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'logine' => 'Kombinasi email dan password salah',
        ]);
    }

    /**
     * Menangani logout
     *
     *
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        return redirect('/');
    }
}
