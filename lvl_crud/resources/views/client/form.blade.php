@extends('theme.base')


@section('content')

    <div class="container py-5 text-center">

        @if (isset($cliente))
            <h1>Editar Cliente</h1>
            <form action="{{ route('client.update', $cliente) }}" method="post">
            @method('PUT')
        @else
            <h1>Crear Cliente</h1>
            <form action="{{ route('client.store') }}" method="post">
        @endif

       

        <!-- dentro de un form se habilita un token para mayor seguridad con csrf-->
       
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" name="name" class="form-control" placeholder="Nombre del Cliente" value="{{old('name') ?? @$cliente->name}}">
                <p class="form-text">Escriba el nombre del cliente</p>
                @error('name')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>


            <div class="mb-3">
                <label for="due" class="form-label">Saldo</label>
                <!-- el valor toma el old en caso de tener valor o el valor de la variable cliente, el @ espara que en caso de que no exista la variable cliente no generer error-->
                <input type="number" name="due" class="form-control" placeholder="saldo del Cliente" step="0.01" value="{{old('due') ?? @$cliente->due}}">
                <p class="form-text">Escriba el saldo del cliente</p>
                @error('due')
                    <p class="form-text text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="comments" class="form-label">Comentarios</label>
                <textarea name="comments"  cols="30" rows="4" class="form-control">{{old('comments') ?? @$cliente->comments}}</textarea>
                <p class="form-text">Escriba algun comentario</p>
                @error('comments')
                    <p class="form-text text-danger">{{$message}}</p>
                @enderror
            </div>

            @if (isset($cliente))
                <button type="submit" class="btn-info">Actualizar Cliente</button>
            @else
                <button type="submit" class="btn-info">Guardar Cliente</button>
            @endif

            
        </form>
    </div>
    
@endsection