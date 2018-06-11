@extends('layout')

@section('contenido')
    <h1>Saludos para {{ $nombre }}</h1>
    {!! $html !!}
    {{--{!! $script !!}--}}
    <ul>
        @forelse($consolas as $consola)
            <li>
                {{$consola}}
            </li>
        @empty
             <p>No hay consolas :(</p>
        @endforelse
    </ul>
    @if(count($consolas) === 1)
        <p>Solo tienes una consola</p>
    @elseif(count($consolas) > 1)
        <p>Tienes mas de una consola</p>
    @else
        <p>No tienes ninguna consola :(</p>
    @endif
@stop
