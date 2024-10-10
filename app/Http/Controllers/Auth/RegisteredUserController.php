<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // Validação dos dados de registro
        $request->validate([
            'nome' => ['required', 'string', 'max:255'],
            'cpf' => ['required', 'string', 'size:11', 'unique:cliente'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:cliente'],
            'idade' => ['required', 'integer', 'min:0'],
            'telefone' => ['required', 'string', 'max:15'],
            'endereco' => ['required', 'string', 'max:255'],
            'datanascimento' => ['required', 'date'],
            'historicomedico' => ['nullable', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'regex:/[a-z]/', 'regex:/[A-Z]/', 'confirmed'],
        ], [
            'cpf.size' => 'O CPF deve ter exatamente 11 números.',
            'password.regex' => 'A senha deve conter pelo menos uma letra maiúscula e uma letra minúscula.',
        ]);

        // Cria o registro do cliente
        $cliente = Cliente::create([
            'nome' => $request->nome,
            'cpf' => $request->cpf,
            'email' => $request->email,
            'idade' => $request->idade,
            'telefone' => $request->telefone,
            'endereco' => $request->endereco,
            'datanascimento' => $request->datanascimento,
            'historicomedico' => $request->historicomedico ?: null,
            'senha' => Hash::make($request->password), // Criptografa a senha
        ]);

        // Cria o registro na tabela users
        $user = User::create([
            'email' => $request->email, // Usa o email para login
            'senha' => Hash::make($request->password), // Usa 'senha' em vez de 'password'
        ]);

        // Dispara o evento de registro
        event(new Registered($user));

        // Autentica o usuário e redireciona para o dashboard
        Auth::login($user);

        return redirect()->route('dashboard');
    }
}
