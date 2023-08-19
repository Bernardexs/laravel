<?php

namespace App\Http\Controllers;

use App\Models\Puesto;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    private  $rulesLogin = array(
        'email' => 'required|email',
        'password' => 'required'
    );
    private $messagesLogin = array(
        'email.unique' => 'ya existe ese email.',
        'email.required' => 'email es requerido.',
        'email.email' => 'debe ser un email correcto.',
        'password.required' => 'debe ingresar una password',
    );
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), $this->rulesLogin, $this->messagesLogin);
        if ($validator->fails()) {
            $messages = $validator->messages();
            return response()->json(["messages" => $messages], 500);
        }

        $user = User::where("email", "=", $request->email)->first();
        if (isset($user->id)) {
            if (Hash::check($request->password, $user->password)) {
                //creamos el token
                $token = $user->createToken("auth_token")->plainTextToken;
                //si está todo ok
                return response()->json([

                    "messages" => "¡Usuario logueado exitosamente!",
                    "access_token" => $token
                ], 200);
            } else {
                return response()->json([
                    "status" => 0,
                    "message" => "credenciales incorrectas",
                ], 500);
            }
        } else {
            return response()->json([
                "status" => 0,
                "message" => "Usuario no registrado",
            ], 404);
        }
    }
    public function userProfile()
    {
        $usuario = Auth::guard('sanctum')->user();
        $user=User::with('Rol')->where('id','=',$usuario->id)->get();
        return response()->json([
            "msg" => "Acerca del perfil de usuario",
            "user" => $user,
            /* "usuario"=>$user, */
        ]);
    }

    public function logout()
    {
        /*  auth()->user()->tokens()->delete(); */
        Auth::guard('sanctum')->user()->tokens()->delete();
        return response()->json([
            "status" => 1,
            "messages" => "Cierre de Sesión",
        ]);
    }
}
