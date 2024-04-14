<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'state_id'];    

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public static function rules()
    {
        return [
            'name' => 'required|string|unique:cities',
            'abb' => 'required|string|size:3|unique:cities',
            'state_id' => 'required|exists:states,id'
        ];
    }

    public static function messages()
    {
        return [
            'name.required' => 'O nome da cidade é obrigatório.',
            'name.string' => 'O nome da cidade deve ser uma string.',
            'name.unique' => 'O nome da cidade já está em uso.',
            'abb.required' => 'A abreviação da cidade é obrigatória.',
            'abb.string' => 'A abreviação da cidade deve ser uma string.',
            'abb.size' => 'A abreviação da cidade deve ter exatamente 3 caracteres.',
            'abb.unique' => 'A abreviação da cidade já está em uso.',
            'state_id.required' => 'O estado associado à cidade é obrigatório.',
            'state_id.exists' => 'O estado associado à cidade não existe.'
        ];
    }
}
