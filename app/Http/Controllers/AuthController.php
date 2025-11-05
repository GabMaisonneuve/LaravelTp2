<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:80',
             'email' => 'required|email|exists:students,email|unique:users,email',
            'password' => 'required|string|min:6|confirmed'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Account created. Please login.');
    }

 public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required|string',
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        // On regarde si il y a un étudiant avec cet email
        $student = \App\Models\Student::where('email', Auth::user()->email)->first();

        if (!$student) {
            // Si aucun étudiant n'est trouvé, on déconnecte l'utilisateur et on redirige avec une erreur
            Auth::logout();
            return redirect()->route('login')
                ->withErrors('No student record found for this email. Please contact admin.');
        }

        // On s'assure de garder l'ID dans la session
        session(['student_id' => $student->id]);

        // Si on passe la vérification, redirige vers student index
        return redirect()->route('student.index');
    }

    return back()->withErrors([
        'email' => 'Invalid credentials.',
    ]);
}

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}