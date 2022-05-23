    {{-- CREA EL TOKEN --}}
    @csrf 

    <label for="">Título</label>
    <input type="text" class="form-control" name="title" id="" value="{{ old("title", $category->title) }}" >
    
    <label for="">Slug</label>
    <input type="text" class="form-control" name="slug" id="" value="{{ old("slug", $category->slug) }}">
    
    <button class="btn mt-3 btn-success" type="submit">Enviar</button>