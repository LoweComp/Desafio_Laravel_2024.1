<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Plano de Saúde</title>
</head>
<body>
<div>
    <p><strong>Nome:</strong> {{ $healthPlan->name }}</p>
    <p><strong>Descrição:</strong> {{ $healthPlan->description }}</p>
    <p><strong>Desconto:</strong> {{ $healthPlan->discount }}</p>
</div>
</body>
</html>

