@extends('layout')

@section('contenido')

    <h1>Todos los mensajes</h1>
    <table width="100%" border="1">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Mensaje</th>
            </tr>
        </thead>
        <tbody>
            @foreach($messages as $element)
                <tr>
                    <td>{{ $element->nombre }}</td>
                    <td>{{ $element->email }}</td>
                    <td>{{ $element->mensaje }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

@stop
