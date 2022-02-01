@extends('dashboard.master')

@section('content')
    
        <div class="from-group">
            <label for="title">Titulo</label>
            <input readonly class="form-control" type="text" name="title" id="title" value="{{ $post->title }}">
            
        </div>
        <div class="from-group">
            <label for="url_clean">Url limpia</label>
            <input readonly class="form-control" type="text" name="url_clean" id="url_clean" value="{{ $post->url_clean  }}">
        </div>
        <div class="from-group">
            <label for="content">Contenido</label>
            <textarea readonly class="form-control" name="content" id="content" rows="3">{{  $post->content }}</textarea>
        </div>

@endsection