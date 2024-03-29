@extends('theme.base')


<!-- se define una seccion a reemplazar dentro del archivo que se extiende-->
@section('content')

    <div class="container py-5 text-center">
        <h1>
            Listado de Clientes!
        </h1>
        <a href="{{ route('client.create') }}" class="btn btn-primary">Crear Clientes</a>

        @if (Session::has('mensaje'))
            <div class="alert alert-info my-5">
                {{Session::get('mensaje')}}
            </div>
        @endif

       <table class="table">
            <thead>
                <th>Nombre</th>
                <th>Saldo</th>
                <th>Acciones</th>
            </thead> 
            <tbody>

                @forelse ($listado_clientes as $client)
                    <tr>
                        <td>{{$client->name}}</td>
                        <td>{{$client->due}}</td>
                        <td>
                            <a href="{{route('client.edit', $client)}}" class="btn btn-warning">
                                editar
                            </a> - 
                            <form method="POST" action="{{route('client.destroy', $client)}}" class="d-inline">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Esta seguro de eliminar este registro?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <td colspan="3">no hay registros!<td>
                @endforelse
              
            </tbody>
       </table>
       
       @if ($listado_clientes->count())
           {{$listado_clientes->links()}}
       @endif
       
    </div>
    
@endsection