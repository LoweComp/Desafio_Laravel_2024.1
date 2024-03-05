<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Relatorio</title>
    <style></style>
</head>

<body>

<table width="100%">
    <tr>
        <td>
            <h1>{{ Auth::guard('doctor')->user()->name }}</h1>
            <pre>
                <h2>Emissão:{{ \Carbon\Carbon::now() }}</h2>
            </pre>
        </td>
    </tr>
</table>

@foreach($surgeries as $surgery)
    <table width="100%">
        <tr>
            <td align="center"><h3>{{ (new DateTime($surgery->start))->format('F') }} </h3></td>
        </tr>
    </table>
    <table width="100%">
        <tr>
            <th>Médico(a)</th>
            <th>Tipo</th>
            <th>Paciente</th>
            <th>Inicio</th>
            <th>Fim</th>
            <th>Valor</th>
        </tr>
        <tbody>
        <tr>
            <th scope="row">{{ \App\Models\Doctor::find($surgery->doctor_id)->name }}</th>
            <td align="right">{{ $surgery->specialty->name }}</td>
            <td align="right">{{ \App\Models\Patient::find($surgery->patient_id)->name }}</td>
            <td align="right">{{ $surgery->start }}</td>
            <td align="right">{{ $surgery->end }}</td>
            <td align="right">{{ $surgery->value }}</td>
        </tr>
        </tbody>
    </table>
@endforeach
</body>
</html>
