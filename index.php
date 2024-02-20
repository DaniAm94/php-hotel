<?php 
include 'data/data.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Hotels</title>

    <!-- Bootstrap -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.2/css/bootstrap.min.css' integrity='sha512-b2QcS5SsA8tZodcDtGRELiGv5SaKSk1vDHDaQRda0htPYWZ6046lr3kJ5bAAQdpV2mmA/4v0wQF9MyU6/pDIAg==' crossorigin='anonymous'/>
</head>
<body>
    <h1>La lista degli hotel</h1>
    <ul class="list-unstyled">
        <?php foreach($hotels as $index => $hotel) :?>
            <li class="mb-4"> <h4>Hotel <?= $index+1?></h4>
                <ul>
                <?php foreach($hotel as $key => $value):?>
                    <li><em><?= $key?>: <strong><?= $value?></strong></em></li>
                <?php endforeach ?>
                </ul>
            </li>
            
            <?php endforeach ?>
    </ul>
</body>
</html>