<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'senha',
    ];

    public function getAuthIdentifierName()
    {
        return 'email'; // Retorna o identificador de autenticação
    }

    public function getAuthPassword()
    {
        return $this->senha;  // Referencia a coluna 'senha'
    }

    protected $hidden = [
        'senha', // Altere para 'senha' para corresponder ao seu banco de dados
        'remember_token', // Remova se não for usar a funcionalidade "lembrar de mim"
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    public function cliente()
    {
        return $this->hasOne(Cliente::class, 'email', 'email'); // Relacionamento com Cliente
    }

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
