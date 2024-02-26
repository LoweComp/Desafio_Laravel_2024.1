<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Planos de Saúde</title>
</head>
<body>

<table>
    <thead>
    <tr>
        <th>Nome</th>
        <th>Descrição</th>
        <th>Desconto</th>
    </tr>
    </thead>
    <tbody>
    @foreach($healthPlans as $healthPlan)
        <tr>
            <td>{{ $healthPlan->name }}</td>
            <td>{{ $healthPlan->description }}</td>
            <td>{{ $healthPlan->discount }}</td>
            <td>
                <a href="{{ route('healthplan.show', $healthPlan->id) }}">Detalhes</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

</body>
</html>
