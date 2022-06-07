@extends('dashboard.layout')

@section('content')
<a class="btn btn-success my-3" style="width: 50%" href="{{route('post.create')}}">Crear</a>
    <div class="table-responsive">
        <table class="table table-bordered caption-top text-center" id="post">
            <caption>List of users</caption>
            <thead>
                <tr>
                    <th class="text-center">Titulo</th>
                    <th class="text-center">Categoria</th>
                    <th class="text-center">Posted</th>
                    <th class="text-center">Contenido</th>
                    <th class="text-center">Descripción</th>
                    <th class="text-center">Imagen</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
               @foreach ($posts as $p)
                <tr>
                    <td>{{$p->title}}</td>
                    <td>{{$p->category->title}}</td>
                    <td>{{$p->posted}}</td>
                    <td>{{$p->content}}</td>
                    <td>{{$p->description}}</td>
                    <td>
                        <center>
                            <img src="{{asset('image/otro/'.$p->image)}}" width="50%" alt="" srcset="">
                        </center>
                    </td>
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
    </div>

@endsection