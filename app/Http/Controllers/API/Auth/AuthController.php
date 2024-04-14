<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        
        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'Credenciais inválidas'], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'Não foi possível criar o token'], 500);
        }

        return response()->json([
            'token' => $this->token($token),
            'user' => $this->user()
        ]);
    }

    public function register(Request $request)
    {
        try {
            $defaultUserType = UserType::getUserTypeByName('Cliente');
            
            $data = $request->all();
            $user = new User();
            $rules = $user->rules();
            $rules['user_type_id'] = 'sometimes|' . $rules['user_type_id'];
            $messages = $user->messages();

            $validatedData = $request->validate($rules, $messages);

            $user->first_name = $data['first_name'];
            $user->last_name = $data['last_name'];
            $user->email = $data['email'];
            $user->phone = $data['phone'];
            $user->password = bcrypt($data['password']);
            $user->user_type_id = $defaultUserType->id;        
            $user->save();

            return response()->json([
                'msg' => 'Usuário criado com sucesso',
                'user' => $user
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'msg' => 'Erro ao criar usuário: ' . $e->getMessage()
            ], 500);
        }
    }


    public function user()
    {
        return Auth::user();
    }

    protected function respondWithToken($token)
    {
        return response()->json( $this->token($token));
    }

    protected function token($token) {
        return [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => JWTAuth::factory()->getTTL()
        ];
    }
}
