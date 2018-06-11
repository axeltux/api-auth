<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\App;
use App\Http\Requests\CreateMessageRequest;

class PagesController extends Controller
{
    //protected $request;

    /*public function __construct(Request $request){
        $this->request = $request;
    }*/

    public function __construct(){
        $this->middleware('example', ['only' => ['home']]);
    }

    public function home(){
        return view('home');
    }

    public function contact(){
        return view('contactos');
    }

    public function mensajes(CreateMessageRequest $request){
        $data = $request->all();
        /*return redirect()
                ->route('contactos')
                ->with('info', 'Tu mensaje ha sido enviado');*/
        return back()->with('info', 'Tu mensaje ha sido enviado');
    }

    public function saludo($nombre = "Invitado"){
        $html = "<h2>Contenido HTML</h2>";
        $script = "<script>alert('Esto es un alert de JavaScript')</script>";
        $consolas = [
            "Play Station 4",
            "Xbox One",
            "Wii U"
        ];
        return view('saludo', compact('nombre','html','script','consolas'));
    }
}
