<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mail</title>
</head>
<body>
    <p>
        Hai ricevuto un nuovo messaggio , ecco qui i dettagli <br>
        Nome: {{$lead->name}}<br>
        Mail:{{$lead->mail}}<br>
        Messaggio:{{$lead->message}}
    </p>
</body>
</html>