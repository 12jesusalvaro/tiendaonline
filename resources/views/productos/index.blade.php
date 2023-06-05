
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{ __('Users') }}
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

                    <div class="mb-4">
                        <input id="search" class="flex justify-between shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Ingresa un nombre o correo de usuario">
                    </div>

                    <div class="flex justify-between">
                        <h1 class="text-2xl font-bold">{{ __('Table Users') }}</h1>
                        <a href="{{route('admin.users.pdf')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">PDF</a>
                        <a href="{{ route('admin.users.create') }}" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">Crear usuario</a>
                    </div>
                    <div class="mt-4" style="overflow-x: auto; max-height: 400px;">
                        <table class="table-auto w-full">
                            <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                                <tr>
                                    <th class="px-4 py-2">{{ __('ID') }}</th>
                                    <th class="px-4 py-2">{{ __('Name') }}</th>
                                    <th class="px-4 py-2">{{ __('Email') }}</th>
                                    <th class="px-4 py-2">{{ __('Rol') }}</th>
                                    <th class="px-4 py-2">{{ __('Acciones') }}</th>
                                </tr>
                            </thead>
                            <tbody class="text-sm divide-y divide-gray-100">
                                @forelse ($users as $user)
                                    <tr>
                                        <td class="border px-3 py-2">{{ $user->id }}</td>
                                        <td class="border px-3 py-2">{{ $user->name }}</td>
                                        <td class="border px-3 py-2">{{ $user->email }}</td>
                                        <td class="border px-3 py-2">
                                            @if(!empty($user->getRoleNames()))
                                            @foreach($user->getRoleNames() as $rolNombre)
                                            {{ $rolNombre }}
                                            @endforeach
                                          @endif
                                        </td>
                                        <td class="border px-4 py-2" style="width: 270px">
                                            <a href="{{ route('admin.users.edit', $user) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">{{ __('Editar') }}</a>
                                            <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline formulario-eliminar">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">{{ __('Eliminar') }}</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="bg-red-400 text-white text-center">
                                        <td colspan="3" class="border px-4 py-2">{{ __('No hay usuarios para mostrar') }}</td>
                                    </tr>
                                @endforelse
                            </tbody>
                            @if ($users->hasPages())
                                <tfoot class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                                    <tr>
                                        <td colspan="3" class="border px-4 py-2">
                                            {{ $users->links() }}
                                        </td>
                                    </tr>
                                </tfoot>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session('eliminar') == 'ok')
        <script>
            Swal.fire(
                '¡Eliminado!',
                'El usuario se eliminó con éxito.',
                'success'
            )
        </script>
    @endif

    <script>
        $('.formulario-eliminar').submit(function(e){
            e.preventDefault();
            Swal.fire({
            title: '¿Estas seguro?',
            text: "Este usuario se eliminará definitivamente!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '¡Si, eliminar!',
            cancelButtonText:   'Cancelar',
            }).then((result) => {
            if (result.isConfirmed) {
                this.submit();
            }
            })
        });

    </script>

@endsection

</x-app-layout>
