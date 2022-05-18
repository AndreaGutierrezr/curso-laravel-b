@extends('dashboard.layout')
@section('content')
<h1>Crear Post</h1>

@include('dashboard.fragment.errors-form')

<form action="{{ route('post.store') }}" method="post">
    {{-- CREA EL TOKEN --}}
    @csrf 

    <label for="">Título</label>
    <input type="text" name="title" id="">
    
    <label for="">Slug</label>
    <input type="text" name="slug" id="">

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
            <option value="{{ $id }}">{{ $title }}</option>
        @endforeach
    </select>

    <label for="">Posteado</label>
    <select name="posted" id="">
        <option value="not">No</option>
        <option value="yes">Si</option>
    </select>

    <label for="">Contenido</label>
    <textarea name="content" id="" cols="30" rows="10"></textarea>
    
    <label for="">Descripción</label>
    <textarea name="description" id="" cols="30" rows="10"></textarea>

    <button type="submit">Enviar</button>
</form>
@endsection