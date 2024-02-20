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

    <link rel='stylesheet' href='style.css' />
</head>
<body>
    <div class="container-sm">

        <h1 class="my-3">La lista degli hotel</h1>
        <table>
            <thead>
                <tr>
                <!-- Itero tra le chiavi dell'hotel per stamparle nell'header della tabella -->
                <?php foreach($hotels[0] as $hotel_key => $hotel_value):?>
                    <th class="pe-5"><?= ucfirst($hotel_key)?></th>
                    <?php endforeach ?>
                </tr>
            </thead>
            <tbody>
                    <!-- Itero la lista degli hotel -->
                    <?php foreach($hotels as $hotel):?>
                        <!-- Creo una riga per ogni hotel -->
                        <tr>
                            <!-- Itero tra gli attributi dell'hotel -->
                            <?php foreach($hotel as $attribute) :?>
                                <!-- Stampo ogni attributo all'interno di una cella -->
                                <td class="pe-5"><?= $attribute?></td>            
                                <?php endforeach?>
                        </tr>
                     <?php endforeach ?>
            </tbody>
        </table>
    </div>
 </body>
</html>