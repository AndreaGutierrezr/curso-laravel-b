<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    {{--COMENTARIOS--}}
    {{-- {{ $name }} --}}
    @if ($name != "Andrea")
        Es true
        @else
            No es true
    @endif

    @foreach ($array as $a)
        <div class="box item">
            <p>{{ $a }}</p>
        </div>
    @endforeach

    @forelse ($array1 as $a)
    <div class="box item">
        <p>*{{ $a }}</p>
    </div>

    @empty
        No hay data
    @endforelse
</body>
</html>