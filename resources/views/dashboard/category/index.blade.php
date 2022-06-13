@extends('dashboard.master')

@section('content')
 
<a class="btn btn-success mt-3 mb-3" href="{{ route('category.create') }}">Crear</a>

<table class="table">
    <thead>
        <tr>
            <td>Id</td>
            <td>Título</td>     
            <td>Creación</td>
            <td>Actualización</td>
            <td>Acciones</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->title }}</td>
            <td>{{ $category->created_at->format('d-m-Y/H:i:s') }}</td>
            <td>{{ $category->updated_at->format('d-m-Y/H:i:s') }}</td>
            <td> 
                <a href="{{ route('category.show',$category->id) }}" class="btn btn-secondary btn-sm" title="Ver">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                    <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                  </svg>
                </a>
                <a href="{{ route('category.edit',$category->id) }}" class="btn btn-primary btn-sm" title="Modificar">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                  </svg>
                </a>

                <button data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="{{ $category->id }}" class="btn btn-danger btn-sm" title="Eliminar">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                  </svg>
                </button>

            </td>
        </tr>             
        @endforeach
    </tbody>
</table>

 {{ $categories->links() }}

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
        
        <form id="formDelete" method="POST" action="{{ route('category.destroy',$category->id) }}" data-action="{{ route('category.destroy',0) }}">
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

        modalTitle.textContent = 'Vas a borrar la categoría: ' + id
        //modalBodyInput.value = id
        });
      };
  </script>

@endsection