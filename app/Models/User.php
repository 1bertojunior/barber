<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;


class User extends Authenticatable implements JWTSubject
{
    use HasFactory;

    protected $fillable = [
        'user_type_id',
        'first_name',
        'last_name',
        'email',
        'phone',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    public static function rules()
    {
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|regex:/^(?=.*[!@#$%^&*-])(?=.*[A-Z])(?=.*\d)/',
            'phone' => 'nullable|string|max:255|unique:users',
            'user_type_id' => 'required|exists:user_types,id',
        ];
    }

    public static function messages()
    {
        return [
            'first_name.required' => 'O campo de nome é obrigatório.',
            'last_name.required' => 'O campo de sobrenome é obrigatório.',
            'email.required' => 'O campo de e-mail é obrigatório.',
            'email.email' => 'O e-mail fornecido não é válido.',
            'email.unique' => 'O endereço de e-mail já está sendo utilizado.',
            'password.required' => 'O campo de senha é obrigatório.',
            'password.min' => 'A senha deve ter pelo menos :min caracteres.',
            'password.regex' => 'A senha deve conter pelo menos uma letra maiúscula, um número e um caractere especial.',
            'phone.string' => 'O número de telefone deve ser uma sequência de caracteres.',
            'phone.max' => 'O número de telefone não pode ter mais de :max caracteres.',
            'phone.unique' => 'O número de telefone já está sendo utilizado.',
            'user_type_id.required' => 'O campo de tipo de usuário é obrigatório.',
            'user_type_id.exists' => 'O tipo de usuário selecionado é inválido.',
        ];
    }

    public function userType()
    {
        return $this->belongsTo(UserType::class);
    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

}
