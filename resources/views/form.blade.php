<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Enviar imagem</title>
</head>
<body>
    <form action="{{ route('form') }}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="avatar">Selecione uma imagem: </label>
        <input type="file" name="avatar" id="avatar">
        <button type="submit">Enviar</button>
    </form>
    @if (session('mensagem'))
        {{ session('mensagem') }}
    @endif
</body>
</html>