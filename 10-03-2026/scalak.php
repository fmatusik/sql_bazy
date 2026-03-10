<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Document</title>

<style>
#left, #center{
    width:50%;
    float:left;
}
</style>

</head>
<body>

<section id="left">
<?php
$conn = mysqli_connect('localhost','root','','scalak');

if(!$conn){
    die("Błąd połączenia: ".mysqli_connect_error());
}

$zap1 = "SELECT nazwa, id FROM producenci";
$wyn1 = mysqli_query($conn,$zap1);

echo "<ul>";

while($r = mysqli_fetch_array($wyn1)){
    echo "<li><a href='scalak.php?prod=".$r['id']."'>".$r['nazwa']."</a></li>";
}

echo "</ul>";

mysqli_close($conn);
?>
</section>

<section id="center">
<?php

$prodId = (int)($_GET['prod'] ?? 0);

$conn = mysqli_connect('localhost','root','','scalak');

if($prodId > 0){

    $zap2 = "SELECT * FROM podzespoly WHERE producenci_id = $prodId";
    $wyn2 = mysqli_query($conn,$zap2);

    if(mysqli_num_rows($wyn2) > 0){
        echo "<ul>";

        while($r = mysqli_fetch_array($wyn2)){
            echo "<li>".$r["nazwa"]." ". $r["cena"] ."</li>";
        }

        echo "</ul>";
    }
    else{
        echo "<p>Brak wyników</p>";
    }

}

mysqli_close($conn);

?>
</section>

</body>
</html>