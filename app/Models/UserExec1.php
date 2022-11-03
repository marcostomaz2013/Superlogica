<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserExec1 extends Model
{
    use HasFactory;
    protected $table = 'user_exec1';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nome_completo',
        'login',
        'cep',
        'email',
        'senha',
    ];
}
