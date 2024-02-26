<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<form action="{{route('healthplan.update', [$healthplan->id])}}" method="PUT">
    @csrf
    <input value = "{{$healthplan['name']}}" name = 'name'>
    <input value = "{{$healthplan->description}}" name = 'description'>
    <input value = "{{$healthplan->discount}}" name = 'discount'>

    <button type="submit"> Salvar </button>

</form>

</body>
</html>
