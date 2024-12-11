<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
class AuthController extends Controller
{

    public function __construct()
    {
        if (Auth::check()) {
            View::share('user', Auth::user());
        }
    
    }
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
    public function index()
    {
        // Mengambil seluruh data user dari database
        $users = User::all();
        // Mengirim data users ke view
        return view('auth.index', compact('users'));
    }
    
    
    public function storeUser(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
            'photo' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $photoPath = $request->hasFile('photo') ? $request->file('photo')->store('photos', 'public') : null;

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'photo' => $photoPath,
        ]);

        return redirect('/users')->with('success', 'User added successfully.');
    }

    public function settings()
    {
        $user = Auth::user();
        return view('auth.settings', compact('user'));
    }
    public function add_user()
    {
        return view('auth.add_user'); // Pastikan file view ada di resources/views/add_user.blade.php
    }
    
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'The current password is incorrect.']);
        }

        $user->update([
            'password' => Hash::make($request->new_password),
        ]);

        return redirect('/settings')->with('success', 'Password updated successfully.');
    }

    
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        // Delete the user
        $user->delete();
        // Redirect with success message
        return redirect()->route('auth.index')->with('success', 'User berhasil dihapus.');
    }
    
}
