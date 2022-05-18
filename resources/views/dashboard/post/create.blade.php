@extends('dashboard.layout')
@section('content')
<h1>Crear Post</h1>

@include('dashboard.fragment.errors-form')

<form action="{{ route('post.store') }}" method="post">
@include('dashboard.post.form')
</form>
@endsection