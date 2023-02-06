<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Answer;
use App\User;
use App\Pregunta;
use App\GrupoPregunta;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AnswerController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $permitirFormulario = $this->validarIntentos($request);
        if(!$permitirFormulario){
            return redirect('/empresa')->with('success', 'Supero el limitede intentos permitidos!');
        }

        try {
        $answer = new Answer();

        if($request->file('19') != null){
            $imagen = $request->file('19');
            $destinationPath = 'files/images/';
            $imageName = time() . '-' .$imagen->getClientOriginalName();
            $uploadSuccess = $request->file('19')->move($destinationPath, $imageName);
        // $routeImg = $destinationPath . $imageName;
        }
        $answer->user_id =auth()->user()->id;
        $answer->save();

        $preguntasIds = [];
        $respuestas = [];
        foreach ($request->except('_token') as $key => $value) {
            $answer->preguntas()->attach($key,['respuesta'=> $key == 19 ?  $imageName : $value ]);
        }

        //return redirect('/empresa')->with('success', 'Formulario creado correctamente!');
        return \Redirect::back()->with('success', 'Formulario creado correctamente!');
        } catch (\Throwable $th) {
            dd( $th);
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    private function validarIntentos($request){
        $pregunta_id=null;
        foreach ($request->all() as $key => $request) {
            if(gettype($key) == 'integer'){
                $pregunta_id=$key;
                break;
            }
        }
        $sum=0;
        if($pregunta_id){
            $pregunta = Pregunta::find($pregunta_id);
            $answers = Answer::where('user_id',auth()->user()->id)->get();
            foreach ($answers as $key => $answer) {
                    if($answer->preguntas[0]->grupoPregunta->formularios->id == $pregunta->grupoPregunta->formularios->id){
                    $sum++;
                }
            }
        }
        return $sum >= 5 ? false : true;
    }

}
