<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- CPF -->    
        <div>
            <x-input-label for="cpf" :value="__('CPF')" />
            <x-text-input id="cpf" class="block mt-1 w-full" type="cpf" name="cpf" :value="old('cpf')" required autofocus
                autocomplete="cpf" />
            <x-input-error :messages="$errors->get('cpf')" class="mt-2" />
        </div>

        <!-- Name -->
        <div>
            <x-input-label for="nome" :value="__('Nome')" />
            <x-text-input id="nome" class="block mt-1 w-full" type="text" name="nome" :value="old('nome')" required autofocus autocomplete="nome" />
            <x-input-error :messages="$errors->get('nome')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Idade -->
        <div class="mt-4">
            <x-input-label for="idade" :value="__('Idade')" />
            <x-text-input id="idade" class="block mt-1 w-full" type="number" name="idade" :value="old('idade')" required
                autocomplete="idade" />
            <x-input-error :messages="$errors->get('idade')" class="mt-2" />
        </div>

        <!-- Telefone -->
        <div class="mt-4">
            <x-input-label for="telefone" :value="__('Telefone')" />
            <x-text-input id="telefone" class="block mt-1 w-full" type="text" name="telefone" :value="old('telefone')" required
                autocomplete="telefone" />
            <x-input-error :messages="$errors->get('telefone')" class="mt-2" />
        </div>

        <!-- Endereço -->
         <div class="mt-4">
            <x-input-label for="endereco" :value="__('Endereço')" />
            <x-text-input id="endereco" class="block mt-1 w-full" type="text" name="endereco" :value="old('endereco')" required
                autocomplete="endereco" />
            <x-input-error :messages="$errors->get('endereco')" class="mt-2" />
        </div>

        <!-- Data de Nascimento -->
        <div class="mt-4">
            <x-input-label for="datanascimento" :value="__('Data de Nascimento')" />
            <x-text-input id="datanascimento" class="block mt-1 w-full" type="text" name="datanascimento"
                :value="old('datanascimento')" required autocomplete="off" />
            <x-input-error :messages="$errors->get('datanascimento')" class="mt-2" />
        </div>


        <!-- Histórico Médico -->
         <div class="mt-4">
            <x-input-label for="historicomedico" :value="__('Histórico Médico')" />
            <textarea id="historicomedico" class="block mt-1 w-full" name="historicomedico" :value="old('historicomedico')"
                autocomplete="historicomedico"></textarea>
            <x-input-error :messages="$errors->get('historicomedico')" class="mt-2" />
        </div>

        <!-- Senha -->
<div class="mt-4">
    <x-input-label for="password" :value="__('Senha')" />
    <x-input-password id="password" class="block mt-1 w-full" name="password" required autocomplete="new-password" />
    <x-input-error :messages="$errors->get('password')" class="mt-2" />
</div>

<!-- Confirmação de Senha -->
<div class="mt-4">
    <x-input-label for="password_confirmation" :value="__('Confirmar Senha')" />
    <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
</div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Já está regstrado?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Registrar') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

