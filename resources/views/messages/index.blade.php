@extends('layout')

@section('contenido')

    <h1>Todos los mensajes</h1>
    <table width="100%" border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Mensaje</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($messages as $element)
                <tr>
                    <td>{{ $element->id }}</td>
                    <td>
                         <a href="{{ route('messages.show', $element->id) }}">
                            {{ $element->nombre }}
                         </a>
                    </td>
                    <td>{{ $element->email }}</td>
                    <td>{{ $element->mensaje }}</td>
                    <td>
                        <a href="{{ route('messages.edit', $element->id) }}" class="enlaceboton">
                            Editar
                        </a>
                        <form style="display: inline" method="POST" action="{{ route('messages.destroy', $element->id) }}">
                            {!! csrf_field() !!}
                            {!! method_field('DELETE') !!}
                            <button type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@stop
