<?php 
include 'data/data.php';

$headings= array_keys($hotels[0]);


$parking_filter = $_GET['parking_filter'] ?? '';
if($parking_filter==='yes'){
    $filtered_hotels=[];
    foreach($hotels as $hotel){
        if($hotel['parking']) $filtered_hotels[] = $hotel;
    }
    $hotels = $filtered_hotels;
}elseif($parking_filter=== 'no'){
    $filtered_hotels=[];
    foreach($hotels as $hotel){
        if(!$hotel['parking']) $filtered_hotels[] = $hotel;
    }
    $hotels = $filtered_hotels;
}

$rating= $_GET['rating'] ?? '';
if($rating){
    $filtered_hotels=[];
    foreach($hotels as $hotel){
        if($hotel['vote']>=$rating) $filtered_hotels[]= $hotel;
    }
    $hotels= $filtered_hotels;
}


$check_icon= '<i class="fa-solid fa-circle-check text-success"></i>';
$xmark_icon= '<i class="fa-solid fa-circle-xmark text-danger"></i>';

?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
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
        <header class="row row-gap-3 ">

            <h1 class="col-12">La lista degli hotel</h1>
            <form action="" method="get" class="row col-12 align-items-center ">
                <select class="form-select w-auto col-3" name="rating">
                    <option value='' <?= !$rating? 'selected': '' ?> >Rating...</option>
                    <option value="1" <?= $rating==='1'? 'selected' : '' ?>>1</option>
                    <option value="2" <?= $rating==='2'? 'selected' : '' ?>>2</option>
                    <option value="3" <?= $rating==='3'? 'selected' : '' ?>>3</option>
                    <option value="4" <?= $rating==='4'? 'selected' : '' ?>>4</option>
                    <option value="5" <?= $rating==='5'? 'selected' : '' ?>>5</option>
                </select>
                <div class="offset-2 col-5 radio-group d-flex column-gap-4">
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
                <div class="col-2">
                    <button class="btn btn-sm btn-primary " type="submit">Conferma</button>
                </div>
        </form>
    </header>
    <main class="row mt-4">
        <table class="m-auto w-100">
            <thead>
                <tr>
                    <!-- Itero tra le chiavi dell'hotel per stamparle nell'header della tabella -->
                    <?php foreach($headings as $heading):?>
                        <th class="px-3 text-black"><?= $heading==='distance_to_center'? ucfirst($heading).'(km)': ucfirst($heading)?></th>
                        <?php endforeach ?>
                    </tr>
                </thead>
                <tbody>
                    <!-- Itero la lista degli hotel -->
                    <?php foreach($hotels as $hotel):?>
                        <tr>
                            <td class="px-3"><?= $hotel['name']?></td>
                            <td class="px-3"><?= $hotel['description']?></td>
                            <td class="px-3"><?= $hotel['parking']? $check_icon: $xmark_icon?></td>
                            <td class="px-3"><?= $hotel['vote']?>/5</td>
                            <td class="px-3"><?= $hotel['distance_to_center']?></td>
                        </tr>
                    <?php endforeach ; ?>
                </tbody>
            </table>
        </main>
    </div>
 </body>
</html>