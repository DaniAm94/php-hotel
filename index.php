<?php 
include 'data/data.php';

$parking_filter = $_GET['parking_filter'] ?? '';

$check_icon= '<i class="fa-solid fa-circle-check text-success"></i>';
$xmark_icon= '<i class="fa-solid fa-circle-xmark text-danger"></i>';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Hotels</title>

    <!-- FontAwesome -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css' integrity='sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==' crossorigin='anonymous'/>

    <!-- Bootstrap -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.2/css/bootstrap.min.css' integrity='sha512-b2QcS5SsA8tZodcDtGRELiGv5SaKSk1vDHDaQRda0htPYWZ6046lr3kJ5bAAQdpV2mmA/4v0wQF9MyU6/pDIAg==' crossorigin='anonymous'/>

    <link rel='stylesheet' href='style.css' />
</head>
<body>
    <div class="container-sm">
        <header class="d-flex justify-content-between mb-3 py-3 ">

            <h1>La lista degli hotel</h1>
            <form action="" method="get" class="d-flex align-items-center column-gap-3">
                <div class="radio-group d-flex column-gap-4">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="parking_filter" value="" id="flexRadioDefault1" <?= !$parking_filter ? 'checked' : '' ?>>
                        <label class="form-check-label" for="flexRadioDefault1">
                            Select all
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="parking_filter" value="yes" id="flexRadioDefault1" <?= $parking_filter ==='yes' ? 'checked' : '' ?>>
                        <label class="form-check-label" for="flexRadioDefault1">
                            Have parking
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="parking_filter" value="no" id="flexRadioDefault2" <?= $parking_filter ==='no' ? 'checked' : '' ?>>
                        <label class="form-check-label" for="flexRadioDefault2">
                            No parking
                        </label>
                    </div>
                </div>
            <button type="submit">Conferma</button>
        </form>
    </header>
        <table class="m-auto w-100">
            <thead>
                <tr>
                <!-- Itero tra le chiavi dell'hotel per stamparle nell'header della tabella -->
                <?php foreach($hotels[0] as $hotel_key => $hotel_value):?>
                    <th class="px-3"><?= ucfirst($hotel_key)?></th>
                <?php endforeach ?>
                </tr>
            </thead>
            <tbody>
                <!-- Itero la lista degli hotel -->
                <?php foreach($hotels as $hotel):?>
                    <!-- Uso un switch per controllare il valore di parking_filter -->
                    <?php switch($parking_filter) : 
                        // case yes ovvero prendo gli hotel con parcheggio
                            case 'yes': ?>
                                <?php if($hotel['parking'] === true) :?>
                                <tr>
                                 <!-- Itero tra gli attributi dell'hotel -->
                                    <?php foreach($hotel as $key => $attribute) :?>
                                        <!-- Stampo ogni attributo all'interno di una cella -->
                                        <td class="px-3">
                                            <!-- Se la chiave e parking -->
                                            <?php if($key === 'parking') :?>
                                            <!-- Stampo un template, predisposto, a seconda del suo valore -->
                                             <?= $attribute ? $check_icon : $xmark_icon ?>
                                             <!-- Altrimenti stampo il suo valore -->
                                            <?php else :?>
                                            <?= $attribute?>
                                            <?php endif ?>
                                        </td>            
                                    <?php endforeach?>
                                </tr>
                                <?php endif ?>
                            <?php break; ?>
                            <!-- case no ovvero prendo gli hotel senza parcheggio -->
                            <?php case 'no': ?>
                                <?php if($hotel['parking'] === false) :?>
                                <tr>
                                    <!-- Itero tra gli attributi dell'hotel -->
                                    <?php foreach($hotel as $key => $attribute) :?>
                                    <!-- Stampo ogni attributo all'interno di una cella -->
                                    <td class="px-3">
                                        <!-- Se la chiave e parking -->
                                        <?php if($key === 'parking') :?>
                                        <!-- Stampo un template, predisposto, a seconda del suo valore -->
                                        <?= $attribute ? $check_icon : $xmark_icon ?>
                                        <!-- Altrimenti stampo il suo valore -->
                                        <?php else :?>
                                        <?= $attribute?>
                                        <?php endif ; ?>
                                    </td>            
                                    <?php endforeach ; ?>
                                </tr>
                                <?php endif ; ?>
                            <?php break; ?>
                            <!-- caso defaul ovvero filtro su all -->
                            <?php default: ?>
                            <tr>
                                <!-- Itero tra gli attributi dell'hotel -->
                                <?php foreach($hotel as $key => $attribute) :?>
                                <!-- Stampo ogni attributo all'interno di una cella -->
                                <td class="px-3">
                                    <!-- Se la chiave e parking -->
                                    <?php if($key === 'parking') :?>
                                    <!-- Stampo un template, predisposto, a seconda del suo valore -->
                                    <?= $attribute ? $check_icon : $xmark_icon ?>
                                     <!-- Altrimenti stampo il suo valore -->
                                    <?php else :?>
                                     <?= $attribute?>
                                    <?php endif ?>
                                </td>            
                                <?php endforeach?>
                            </tr>
                    <?php endswitch ;?>
                <?php endforeach ; ?>
            </tbody>
        </table>
    </div>
 </body>
</html>