@extends('layouts.app')

@if($person =='student')
    @include('person.partials.studentform', ['type'=>'c'])

@endif
@if($person =='mandated')
    @include('person.partials.mandatedform', ['type'=>'c'])
@endif


<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>@yield('title','| Crear Nuevo')</title>
        


    </head>
    <body>
        <div class="container">
            @section('main-content')
                    @if($person =='student')
                        @yield('form-st')

                    @endif
                    @if($person =='mandated')
                        @yield('forme')
                    @endif
            @endsection
       </div> 
    </body>

</html>
