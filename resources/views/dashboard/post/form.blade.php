    {{-- CREA EL TOKEN --}}
    @csrf 

    <label for="">Título</label>
    <input type="text" name="title" id="" value="{{ old("title", $post->title) }}" >
    
    <label for="">Slug</label>
    <input type="text" name="slug" id="" value="{{ old("slug", $post->slug) }}">

    {{-- <label for="">Categoria</label>
    <select name="category_id" id="">
        <option value=""></option>
        @foreach ($categories as $c)
            <option value="{{ $c->id }}">{{ $c->title }}</option>
        @endforeach
    </select> --}}
    
    <label for="">Categoria</label>
    <select name="category_id" id="">
        <option value=""></option>
        @foreach ($categories as $title => $id)
            <option {{ old("category_id", $post->category_id) == $id ? "selected" : "" }} value="{{ $id }}">{{ $title }}</option>
        @endforeach
    </select>

    <label for="">Posteado</label>
    <select name="posted" id="">
        <option {{ old("posted", $post->posted) == "not" ? "selected" : "" }} value="not">No</option>
        <option {{ old("posted", $post->posted) == "yes" ? "selected" : "" }} value="yes">Si</option>
    </select>

    <label for="">Contenido</label>
    <textarea name="content" id="" cols="30" rows="10">{{ old("content", $post->content) }}</textarea>
    
    <label for="">Descripción</label>
    <textarea name="description" id="" cols="30" rows="10">{{ old("description", $post->description) }}</textarea>

    @if ( isset($task) && $task == "edit")
        <label>Imagen</label>
        <input type="file" name="image" id="">
    @endif

    <button type="submit">Enviar</button>