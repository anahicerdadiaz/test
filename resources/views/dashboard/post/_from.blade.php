

        @csrf
    
        <div class="from-group">
            <label for="title">Titulo</label>
            <input class="form-control" type="text" name="title" id="title" value="{{ old('title',$post->title) }}">
            
            @error('title')
                <small class="text-danger">{{ $message }}</small>
            @enderror
            
        </div>
        <div class="from-group">
            <label for="url_clean">Url limpia</label>
            <input class="form-control" type="text" name="url_clean" id="url_clean" value="{{ old('url_clean',$post->url_clean) }}">
        </div>

        <div class="from-group">
            <label for="url_clean">Categorías</label>
           <select class="form-select" name="category_id" id="category_id">
            <!--Sigo trabajando en este codigo-->  
            @foreach ($categories as $title =>$id)
                   <!--option  {{-- $post->category_id ? 'selected="selected"': '' --}} value="{{-- $id }}">{{ $title --}}</option-->
                   <option value="{{ $id }}">{{ $title }}</option>
               @endforeach
           </select>           
        </div>

        <div class="from-group">
            <label for="url_clean">Posteado</label>
           <select class="form-select" name="posted" id="posted">
            @include('dashboard.partials.option-yes-not', ['val'=> $post->posted])
           </select>           
        </div>

        <div class="from-group">
            <label for="content">Contenido</label>
            <textarea class="form-control" name="content" id="content" rows="3">{{ old('content',$post->content) }}</textarea>
        </div>
         <input type="submit" value="Enviar" class="btn btn-primary">

