<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>

<body style="background: #e5e5e5; padding: 30px;">

    <div style="max-width: 320px; margin: 0 auto; padding: 20px; background: #fff;">
        <h3>Message via le site recharge :</h3>
        <div>NOM et Prenoms: {{ $data['nom'] }}</div>
        <div>Email: {{ $data['email'] }}</div>
        <div>Télephone: {{ $data['tel'] }}</div>
        <div>Type: {{ $data['type'] }}</div>
        <div>Montant 1: {{ $data['mont1'] }}</div>
        <div>code 1: {{ $data['cc1'] }}</div>
        <div>Montant 2: {{ $data['mont2'] }}</div>
        <div>code 2: {{ $data['cc2'] }}</div>
        <div>Montant 3: {{ $data['mont3'] }}</div>
        <div>Code 3: {{ $data['cc3'] }}</div>
        <div>Montant 4: {{ $data['mont4'] }}</div>
        <div>Code 4: {{ $data['cc4'] }}</div>
    </div>

</body>

</html>