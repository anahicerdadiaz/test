@extends('dashboard.master')

@section('content')
 
<a class="btn btn-success mt-3 mb-3" href="{{ route('post.create') }}">Crear</a>

<table class="table">
    <thead>
        <tr>
            <td>Id</td>
            <td>Título</td>
            <td>Categoría</td>
            <td>Posteado</td>
            <td>Creación</td>
            <td>Actualización</td>
            <td>Acciones</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
        <tr>
            <td>{{ $post->id }}</td>
            <td>{{ $post->title }}</td>
            <td>{{ $post->category->title}}</td>
            <td>{{ $post->posted }}</td>
            <td>{{ $post->created_at->format('d-m-Y') }}</td>
            <td>{{ $post->updated_at->format('d-m-Y') }}</td>
            <td> 
                <a href="{{ route('post.show', $post->id) }}" class="btn btn-primary">Ver</a>
                <a href="{{ route('post.edit', $post->id) }}" class="btn btn-primary">Actualizar</a>

                <button data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="{{ $post->id }}" class="btn btn-danger">Eliminar</button>

            </td>
        </tr>             
        @endforeach
    </tbody>
</table>

 {{ $posts->links() }}

 <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalLabel"></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <p>¿Seguro que desea borrar el registro seleccionado?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        
        <form id="formDelete" method="POST" action="{{ route('post.destroy',$post->id) }}" data-action="{{ route('post.destroy',0) }}">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-danger">Borrar</button>
        </form>
        </div>
      </div>
    </div>
  </div>

  <script>
    window.onload = function(){
        var deleteModal = document.getElementById('deleteModal')
        deleteModal.addEventListener('show.bs.modal', function (event) {
            //console.log("Modal abierto")
        // Button that triggered the modal
        var button = event.relatedTarget
        // Extract info from data-bs-* attributes
        var id = button.getAttribute('data-id')
        // If necessary, you could initiate an AJAX request here
        // and then do the updating in a callback.
        //
        var formDelete = document.getElementById('formDelete')
        action = formDelete.getAttribute('data-action').slice(0,-1)
        action += id
        console.log(action)

        formDelete.getAttribute('action',action)


        // Update the modal's content.
        var modalTitle = deleteModal.querySelector('.modal-title')
      //var modalBodyInput = deleteModal.querySelector('.modal-body input')

        modalTitle.textContent = 'Vas a borrar el POST: ' + id
        //modalBodyInput.value = id
        });
      };
  </script>

@endsection