<?php
    $conn = mysqli_connect('localhost', 'root', '', 'samochody');
    mysqli_error($conn);

    $marka = $_POST['marka'];
    $model = $_POST['model'];
    $cena = $_POST['cena'];
    $idKolor = $_POST['idKolor'];

    if(!empty($marka) && !empty($model) && !empty($cena) && !empty($idKolor)){
        $zap = "INSERT INTO pojazdy(marka, model, cena, kolor) VALUES('$marka', '$model', $cena, $idKolor)";
        $q = mysqli_query($conn, $zap);
        if($q){
            echo "<script>alert('pomyslnie dodano');</script>";
            header('Location:dodaj_pojazd.html');
        }
    }else{
        
    }
    mysqli_close($conn);
?>