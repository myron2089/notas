@extends('layouts.app')


    @include('score.partials.scoreregisterform', ['type'=>'c'])



<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>@yield('title','| Registrar Nota')</title>
        


    </head>
    <body>
        <div class="container">
            @section('main-content')
                    

                        @yield('form-sc')
                   
            @endsection
       </div> 
    </body>

</html>