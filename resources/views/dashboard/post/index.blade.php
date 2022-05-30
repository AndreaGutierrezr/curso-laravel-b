@extends('dashboard.layout')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">

@endsection

@section('content')
<a class="btn btn-success my-3" href="{{route('post.create')}}">Crear</a>

    <table class="table table-striped table-bordered shadow-lg mt-4" style="width: 100%" id="post">
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Categoria</th>
                <th>Posted</th>
                <th>Contenido</th>
                <th>Descripción</th>
                <th>Imagen</th>
                <th>Acciones</th>
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
    {{$posts->links()}}
    
    @section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    
    <script>
        $(document).ready(function () {
            $('#post').DataTable({
                "lengthMenu" : [[5,10,50,-1],[5,10,50, "All"]]
            });
        });
    </script>
    @endsection

@endsection