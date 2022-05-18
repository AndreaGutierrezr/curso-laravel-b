@extends('dashboard.layout')
@section('content')
<h1>Actualizar Post:  {{ $post->title }}</h1>

@include('dashboard.fragment.errors-form')

<form action="{{ route('post.update', $post->id) }}" method="post" enctype="multipart/form-data">
    {{-- CREA EL TOKEN --}}
    {{-- @csrf  --}}
    @method("PATCH")

    @include('dashboard.post.form',["task" => "edit"])

{{-- 
    <label for="">Título</label>
    <input type="text" name="title" id=""  value="{{ $post->title }}">
    
    <label for="">Slug</label>
    <input readonly type="text" name="slug" id="" value="{{ $post->slug }}" >

    {{-- <label for="">Categoria</label>
    <select name="category_id" id="">
        <option value=""></option>
        @foreach ($categories as $c)
            <option value="{{ $c->id }}">{{ $c->title }}</option>
        @endforeach
    </select> --}}
    
    {{-- <label for="">Categoria</label>
    <select name="category_id" id="">
        <option value=""></option>
        @foreach ($categories as $title => $id)
            <option {{ $post->category_id == $id ? 'selected'  : '' }}  value="{{ $id }}">{{ $title }}</option>
        @endforeach
    </select> --}}

    {{-- <label for="">Posteado</label>
    <select name="posted" id="">
        <option {{ $post->posted == "not" ? 'selected' : '' }} value="not">No</option>
        <option {{ $post->posted == "yes" ? 'selected' : '' }} value="yes">Si</option>
    </select>

    <label for="">Contenido</label>
    <textarea name="content" id="" cols="30" rows="10">{{ $post->content }}</textarea>
    
    <label for="">Descripción</label>
    <textarea name="description" id="" cols="30" rows="10">{{ $post->description }}</textarea>

    <button type="submit">Enviar</button> --}}
</form>
@endsection