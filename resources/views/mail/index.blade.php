<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enviar Email</title>
</head>
<body>
<form action="{{ route('mail.send') }}" method="post">
    @csrf
    <div>
        <label for="subject">Assunto:</label>
        <input type="text" id="subject" name="subject" required>
    </div>
    <div>
        <label for="body">Corpo:</label>
        <textarea id="body" name="body" rows="5" required></textarea>
    </div>
    <button type="submit">Enviar Email</button>
</form>
</body>
</html>
