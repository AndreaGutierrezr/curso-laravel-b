@extends('dashboard.layout')

@section('content')
<a class="btn btn-success my-3" href="{{route('post.create')}}">Crear</a>

    <table class="table mb-3">
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Categoria</th>
                <th>Posted</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
           @foreach ($posts as $p)
            <tr>
                <td>{{$p->title}}</td>
                <td>{{$p->category->title}}</td>
                <td>{{$p->posted}}</td>
                <td>
                    <a class="btn mt-2 btn-primary" href="{{route('post.edit', $p)}}">Editar</a>
                    <br>
                    <a class="btn mt-2 btn-primary" href="{{route('post.show', $p)}}">Ver</a>
                    <br>
                    <form  action="{{ route("post.destroy", $p) }}" method="post">
                        @method("DELETE")
                        @csrf
                        <button class="btn mt-2 btn-danger" type="submit">Eliminar</button>
                    </form>
                </td>
            </tr>
           @endforeach
        </tbody>
    </table>
    {{$posts->links()}}
@endsection