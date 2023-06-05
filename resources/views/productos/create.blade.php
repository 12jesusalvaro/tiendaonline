
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ 'Crear usuario' }}
        </h2>
    </x-slot>


<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])


        <!--  Datatables  -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css"/>

        <!--  extension responsive  -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">
    </head>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if ($errors->any())
                            <div class="flex p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-200 dark:text-red-500" role="alert">
                            <strong>¡Revise los campos!</strong>
                                @foreach ($errors->all() as $error)
                                    <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                                    <span class="badge badge-danger">{{ $error }}</span>
                                @endforeach
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                        @endif

                {!! Form::open(array('route' => 'admin.users.store','method'=>'POST')) !!}

                    <div class="py-2 form-group">
                        <label for="name">{{'Nombre'}}</label>
                        {!! Form::text('name', null, array('class' => 'shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline')) !!}
                    </div>

                    <div class="py-2 form-group">
                        <label for="dni">{{'Dni'}}</label>
                        {!! Form::text('dni', null, array('class' => 'shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline')) !!}
                    </div>

                    <div class="py-2 form-group">
                        <label for="email">{{'Email'}}</label>
                        {!! Form::text('email', null, array('class' => 'shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline')) !!}
                    </div>

                    <div class="py-2 form-group">
                        <label for="password">{{'Password'}}</label>
                        {!! Form::text('password', null, array('class' => 'shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline')) !!}
                    </div>

                    <div class="py-2 form-group">
                        <label for="confirm-password">{{'Confirmar Password'}}</label>
                        {!! Form::text('confirm-password', null, array('class' => 'shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline')) !!}
                    </div>


                    <div class="py-2 form-group">
                        <label for="">Roles</label>
                        {!! Form::select('roles[]', $roles,[], array('class' => 'shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline')) !!}
                    </div>

                    <div class="py-4 col-xs-12 col-sm-12 col-md-12">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-5 rounded">Guardar</button>
                    <a href="{{ route('admin.users.index') }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-5 rounded">{{ __('Cancelar') }}</a>
                    </div>

                {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
