<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>

<div>
    Olá {{ $name }},
    <br>
    Obrigado por criar sua conta no SEEDUC. Não esqueça de completar sua inscrição!
    <br>
    Favor clique no link abaixo para confirmar seu cadastro :>
    <br>

    <a href="{{ url('user/verify', $verification_code)}}"> Confirmar cadastro </a>

    <br/>
</div>

</body>
</html>