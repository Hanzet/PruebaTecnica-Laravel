@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Libros en prestamo de esta sesión') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   
<table>
  <thead>
    <tr>
      <th class="text-center">Titulo</th>
      <th class="text-center">Nombre</th>
      <th class="text-center">Autor</th>
      <th class="text-center">Número de páginas</th>
      <th class="text-center">Isbn</th>
    </tr>
  </thead>
  <tbody>
  @foreach($libros as $libro)
    <tr>
      <td class="text-center">{{$libro->Titulo}}</td>
      <td class="text-center">{{$libro->Nombre}}</td>
      <td class="text-center">{{$libro->Autor}}</td>
      <td class="text-center">{{$libro->Numero_paginas}}</td>
      <td class="text-center">{{$libro->Isbn}}</td>
      <td>
        <form route="{{ route('prestamoslibros.store') }}" method="get">
          @csrf
          <button type='submit' class="btn btn-sm btn-info"><span class="float-right"></span>Regresar Libro</button>
        </form>
      </td>
    </tr>
    
    @endforeach
  </tbody>
</table>

                    
<table>

  <tbody>
  @foreach($librosprestados as $libro)
    <tr>
      <td class="text-center">{{$libro->Titulo}}</td>
      <td class="text-center">{{$libro->Nombre}}</td>
      <td class="text-center">{{$libro->Autor}}</td>
      <td class="text-center">{{$libro->Numero_paginas}}</td>
      <td class="text-center">{{$libro->Isbn}}</td>
      <td>
        <form route="{{ route('retornar_libro',$libro) }}" method="post">
          @method_field('PUT')
          @csrf
          <button type='submit' class="btn btn-sm btn-danger"><span class="float-right">Regresar libro</span></button>
        </form>
      </td>
    </tr>
    
    @endforeach
  </tbody>
</table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
