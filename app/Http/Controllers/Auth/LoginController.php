<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        return 'identificacion';
    }

    public function loginApi(Request $request)
    {
        $this->validateLogin($request);

        if ($this->attemptLogin($request)) {
            $user = $this->guard()->user();
            $user->api_token = \Str::random(80);
            $user->save();

            $usuario = $user->toArray();

            if ($user->rol->id != 2) {
                return response(['code' => '403', 'message' => 'El usuario no cuenta con los permisos adecuados.']);
            }

            $formulario = \App\Formulario::find(1);

            $usuario['imagen'] = asset('imagenes_usuarios/'. $user->imagen);

            $usuario['actualizado'] = $formulario->updated_at;

            return response()->json([
                'code' => '200',
                'message' => 'Ingreso exitoso',
                'data' => $usuario,
            ]);
        }

        return response(['code' => '500', 'message' => 'email o contraseña incorrecta']);
    }
}
