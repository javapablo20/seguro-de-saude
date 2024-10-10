<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest; // Certifique-se de que este Request está configurado corretamente
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(Request $request)
    {
        // Validação dos dados de login
        $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);


        // Tenta autenticar o usuário
        if (Auth::attempt(['email' => $request->email, 'senha' => $request->password], $request->remember)) {
            // Redireciona para o dashboard se a autenticação for bem-sucedida
            return redirect()->intended('dashboard');
        }

        // Se falhar, retorna um erro
        return back()->withErrors([
            'email' => 'As credenciais não correspondem.',
        ]);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        // Invalida e regenera o token da sessão
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redireciona para a página inicial
        return redirect('/');
    }
}
