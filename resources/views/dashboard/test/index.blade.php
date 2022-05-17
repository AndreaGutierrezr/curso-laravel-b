@extends('layout.master')

@section('content')
@include("fragment.subview")

{{--COMENTARIOS--}}
{{-- {{ $name }} --}}
{{-- @if ($name != "Andrea")
    Es true
    @else
        No es true
@endif

@foreach ($array as $a)
    <div class="box item">
        <p>{{ $a }}</p>
    </div>
@endforeach --}}

@forelse ($array as $a)
<div class="box item">
    <p>*{{ $a }}</p>
</div>

@empty
    No hay data
@endforelse

{{$name}}
@endsection

