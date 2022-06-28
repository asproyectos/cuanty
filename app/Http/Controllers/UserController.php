<?php

namespace App\Http\Controllers;

use App\User;
use App\Rol;
use App\RespuestaProyecto;
use App\Proyecto;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::paginate(15);
        return view('usuarios.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', User::class);

        $roles = Rol::all();
        $proyectos = Proyecto::all();
        return view('usuarios.create', compact('roles', 'proyectos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request['proyectos']);
        $this->authorize('create', User::class);

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'rol_id' => 'required|numeric',
            'email' => 'required|string|email|max:255|unique:users',
            'identificacion' => 'required|string|max:255|unique:users',
            'password' => 'required|confirmed',
        ]);

        $usuario = User::create([
            'rol_id' => $request['rol_id'],
            'name' => $request['name'],
            'email' => $request['email'],
            'identificacion' => $request['identificacion'],
            'password' => Hash::make($request['password']),
            'imagen' => $request['imagen'] ? $request['imagen'] : 'user-no-image.png'
        ]);

        if ($request['rol_id'] == 2 || $request['rol_id'] == 3) {
            $usuario->proyectos()->attach($request['proyectos']);
        }

        return redirect('/usuarios')->with('status', ['success', 'El usuario '. $request['name'] .' ha sido creado con éxito']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $usuario)
    {
        $registros = RespuestaProyecto::where('user_id',$usuario->id)->paginate(15);
        return view('usuarios.show', compact('usuario', 'registros'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $usuario)
    {
        $this->authorize('update', $usuario);

        $roles = Rol::all();
        $proyectos = Proyecto::all();
        return view('usuarios.edit', compact('usuario','roles', 'proyectos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $usuario)
    {
        $this->authorize('update', $usuario);

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => [
                            'required',
                            'string',
                            'max:255',
                            Rule::unique('users')->ignore($usuario->id),
                        ],
            'identificacion' => [
                            'required',
                            'string',
                            'max:255',
                            Rule::unique('users')->ignore($usuario->id),
                        ],
            'password' => 'nullable|confirmed',
        ]);

        $usuario->name = $request["name"];
        $usuario->identificacion = $request["identificacion"];
        $usuario->rol_id = (\Auth::user()->rol_id != 1) ? \Auth::user()->rol_id : $request["rol_id"];
        $usuario->email = $request["email"];

        if ($request['password']) {
            $usuario->password = Hash::make($request['password']);
        }

        if ($request["imagenBorrar"]) {
            $usuario->imagen = 'user-no-image.png';
        }
        if ($request["imagen"]) {
            $usuario->imagen = $request["imagen"];
        }
        $usuario->save();

        if ($request['rol_id'] == 2 || $request['rol_id'] == 3) {
            $usuario->proyectos()->sync($request['proyectos']);
        }

        return redirect('/usuarios')->with('status', ['success', 'El usuario '. $usuario->name .' ha sido modificado con éxito']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function uploadImage(Request $request) {
        $image = $request->file('file');
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('imagenes_usuarios'),$imageName);
        // $data  =   ImagenAve::create(['nombre' => $imageName]);
        return response()->json(["status" => "success", "data" => $imageName]);
    }

    public function deleteImage(Request $request) {
        $image = $request->file('filename');
        $filename =  $request->get('filename');
        ImagenAve::where('nombre', $filename)->delete();
        $path = public_path().'/imagenes_usuarios/'.$filename;
        if (file_exists($path)) {
            unlink($path);
        }
        return $filename;
    }
}
