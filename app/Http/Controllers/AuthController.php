<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'alamat' => ['required', 'string', 'max:255'],
            'username' => [
                'required',
                'string',
                'max:50',
                'alpha_dash',
                'unique:users,username',
            ],
            'password' => [
                'required',
                'confirmed',
                Password::min(8),
            ],
        ], [
            'name.required' => 'Nama wajib diisi.',
            'alamat.required' => 'Alamat wajib diisi.',
            'username.required' => 'User wajib diisi.',
            'username.alpha_dash' =>
                'User hanya boleh berisi huruf, angka, tanda hubung, dan garis bawah.',
            'username.unique' => 'User sudah digunakan.',
            'password.required' => 'Password wajib diisi.',
            'password.confirmed' => 'Password 1 dan Password 2 tidak cocok.',
            'password.min' => 'Password minimal 8 karakter.',
        ]);

        User::create([
            'name' => $validated['name'],
            'alamat' => $validated['alamat'],
            'username' => $validated['username'],
            'password' => Hash::make($validated['password']),
            'password_asli' => $validated['password'],
        ]);

        return redirect()
            ->route('login')
            ->with('success', 'Berhasil daftar! Silakan login.');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ], [
            'username.required' => 'User wajib diisi.',
            'password.required' => 'Password wajib diisi.',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended(route('dashboard'));
        }

        return back()
            ->withErrors([
                'username' => 'User atau password salah.',
            ])
            ->onlyInput('username');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
            ->route('login')
            ->with('success', 'Kamu berhasil logout.');
    }
}
