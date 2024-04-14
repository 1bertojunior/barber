<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public static function getUserTypeByName($name)
    {
        // Realiza uma consulta para obter o ID do tipo de usuário pelo nome
        $userType = self::where('name', $name)->first();

        // Verifica se encontrou um tipo de usuário com o nome fornecido
        if ($userType) {
            return $userType; 
        } else {
            return null; // Retorna null se o tipo de usuário não for encontrado
        }
    }
}
