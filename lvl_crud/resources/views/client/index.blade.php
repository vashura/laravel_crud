@extends('theme.base')


<!-- se define una seccion a reemplazar dentro del archivo que se extiende-->
@section('content')

    <div class="container py-5 text-center">
        <h1>
            Listado de Clientes!
        </h1>
        <a href="{{ route('client.create') }}" class="btn btn-primary">Crear Clientes</a>

       <table class="table">
            <thead>
                <th>Nombre</th>
                <th>Saldo</th>
                <th>Acciones</th>
            </thead> 
            <tbody>
                <tr>
                    <td>FelinoHost</td>
                    <td>0.0</td>
                    <td>editar - eliminar </td>
                </tr>
            </tbody>
       </table>
    </div>
    
@endsection