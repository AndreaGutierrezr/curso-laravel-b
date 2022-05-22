@extends('dashboard.layout')
@section('content')
<h1>Actualizar Category:  {{ $category->title }}</h1>

@include('dashboard.fragment.errors-form')

<form action="{{ route('category.update', $category->id) }}" method="post">
    {{-- CREA EL TOKEN --}}
    {{-- @csrf  --}}
    @method("PATCH")

    @include('dashboard.category.form')

</form>
@endsection