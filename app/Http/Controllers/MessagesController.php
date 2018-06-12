<?php

namespace App\Http\Controllers;

use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\CreateMessageRequest;
use App\Message;

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$messages = DB::table('messages')->get();
        $messages = Message::all();
        return view('messages.index', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return "Mostrar el formulario de mensajes";
        return view('messages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateMessageRequest $request)
    {
        //Guardar mensaje con Query Builder
        /*DB::table('messages')->insert([
            "nombre"=>$request->input('nombre'),
            "email"=>$request->input('email'),
            "mensaje"=>$request->input('mensaje'),
            "created_at"=>Carbon::now(),
            "updated_at"=>Carbon::now(),
        ]);*/

        //Primera forma con Eloquent
        /*$message = new Message();
        $message->nombre = $request->input('nombre');
        $message->email = $request->input('email');
        $message->mensaje = $request->input('mensaje');
        $message->save();*/

        //Segunda forma con Eloquent
        Message::create($request->all());

        //Redireccionar a la vista index
        return redirect()->route('mensajes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //return "Este es el mensaje con el id " . $id;
        //Mostrar registro por Query Builder
        //$message = DB::table('messages')->where('id', $id)->first();
        //Mostrar registro con Eloquent
        $message = Message::findOrFail($id);
        return view('messages.show', compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //$message = DB::table('messages')->where('id', $id)->first();
        $message = Message::findOrFail($id);
        return view('messages.edit', compact('message'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Actualizar mensaje
        /*DB::table('messages')->where('id', $id)->update([
            "nombre"=>$request->input('nombre'),
            "email"=>$request->input('email'),
            "mensaje"=>$request->input('mensaje'),
            "updated_at"=>Carbon::now(),
        ]);*/
        Message::findOrFail($id)->update($request->all());
        //Redireccionar a la vista index
        return redirect()->route('mensajes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Eliminar mensaje
        //DB::table('messages')->where('id', $id)->delete();
        Message::findOrFail($id)->delete();
        //Redireccionar a la vista index
        return redirect()->route('mensajes.index');
    }
}
