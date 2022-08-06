@extends('layouts.app')

@section('content')
        
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
    <tr id="{{$libro->id}}">
      <td class="text-center">{{$libro->Titulo}}</td>
      <td class="text-center">{{$libro->Nombre}}</td>
      <td class="text-center">{{$libro->Autor}}</td>
      <td class="text-center">{{$libro->Numero_paginas}}</td>
      <td class="text-center">{{$libro->Isbn}}</td>
      </td>
    </tr>
    
<form action="{{route('libros.update',$libro)}}" method='post' id="formEdicion{{$libro->id}}" class="form-control d-none">
    @method('put')
    @csrf
    <label for="nombre">Editar libro</label> <br>
    <input type="text" name='Titulo' require value='{{$libro->Titulo}}'> <br><br>
    <input type="text" name='Nombre' require value='{{$libro->Nombre}}'> <br><br>
    <input type="text" name='Autor' require value='{{$libro->Autor}}'> <br><br>
    <input type="text" name='Numero_paginas' require value='{{$libro->Numero_paginas}}'> <br><br>
    <input type="text" name='Isbn' require value='{{$libro->Isbn}}'> <br><br>
    <button class="btn btn-info" type="submit"> Editar </button>

</form>

@if (isset($libro) && !$libro->prestado)
		{{-- expr --}}
		<form action="{{ route('libros.destroy',$libro) }}" method="post">
			@method('delete')
			@csrf
			<button type="submit" class="btn btn-danger"> Eliminar libro </button>
		</form>
	@endif

    @endforeach
  </tbody>
</table>

<form action="{{route('libros.store')}}" method='post' id="formCreacion" class="form-control">

    @csrf
    <label for="nombre">Crear un nuevo libro</label> <br>
    <input type="text" name='Titulo' required placeholder='Titulo' autofocus=''> <br><br>
    <input type="text" name='Nombre' required placeholder='Nombre' autofocus=''> <br><br>
    <input type="text" name='Autor' required placeholder='Autor' autofocus='' autocomplete='Autor'> <br><br>
    <input type="text" name='Numero_paginas' required placeholder='Número de páginas' autofocus='' autocomplete='Numero_paginas'> <br><br>
    <input type="text" name='Isbn' required placeholder='Isbn' autofocus='' autocomplete='Isbn'> <br><br>

    <button type='submit' class='btn btn-success' > Crear </button>
</form>

<script>
    $("#btnEditar").click(()=>{
        console.log($(this));
        console.log(this);
        console.log(this.closest('tr'));
        console.log(this.closest('tr').attr('id'));
        id = this.closest('tr').attr('id');
        fomr = $("form#formEdicion"+id);
        $("#modalPatodo h5.modal-title").text('Editando...');

        $("#modalPatodo .modal-body").empty('form');
        $("#modalPatodo .modal-body").append(fomr);
        $("#modalPatodo").modal('show');    
    });
    
    $("#crearLibro").click(()=>{
        //    $("#formCreacion")[0].reset();
        $("#modalPatodo h5.modal-title").text('Formulario Creacion');

        $("#modalPatodo .modal-body").append($("#formCreacion"));
        $("#formCreacion").removeClass('d-none');
        $("#modalPatodo").modal('show');    
    });

    //guardar formcreacion..
</script>
@endsection