<?php
        $conn = mysqli_connect('localhost', 'root', '', 'samochody');
        mysqli_error($conn);
        ?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodaj pojazd</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header></header>
    <nav></nav>
    <main>
        <section id="left">
            <form method="POST">
                <label for="marka">Podaj markę: <input type="text" name="marka"></label><br>
                <label for="model">Podaj model: <input type="text" name="model"></label><br>
                <label for="cena">Podaj cenę: <input type="number" name="cena" min="0" step = "0.1"></label><br>
                <label for="idKolor">Podaj id koloru: <input type="number" name="idKolor" min="0"></label><br>
                <button type="submit" name="submit">Dodaj</button>
            </form>
                <?php
                    if(isset($_POST['submit'])){
                        $marka = $_POST['marka'];
                        $model = $_POST['model'];
                        $cena = $_POST['cena'];
                        $idKolor = $_POST['idKolor'];

                        if(!empty($marka) && !empty($model) && !empty($cena) && !empty($idKolor)){
                            $zap = "INSERT INTO pojazdy(marka, model, cena, kolor) VALUES('$marka', '$model', $cena, $idKolor)";
                            $q = mysqli_query($conn, $zap);
                            if($q){
                                echo "pomyslnie dodano";
                            }
                            
                        }
                    }
                ?>
        </section>
        <section id="middle">
            <table>
                <tr>
                    <th>Marka</th>
                    <th>Model</th>
                    <th>Cena</th>
                    <th>Kolor</th>
                </tr>
                <?php
                    $zap = "SELECT * from pojazdy";
                    $q = mysqli_query($conn, $zap);
                    if(mysqli_num_rows($q) > 0){
                        while($r = mysqli_fetch_array($q)){
                            echo "<tr><td><a href='dodaj_pojazd.php?idPoj=".$r[0]."'>".$r[1]."</a></td><td>".$r['model']."</td><td>".$r['cena']."</td><td>".$r['kolor']."</td></tr>";
                        }
                    }else{
                        echo "Brak wyników :(";
                    }
                ?>
            </table>
        </section>
        <section id="right">
            <?php
                if(isset($_GET['kolorId'])){
                    $zap = "SELECT * from pojazdy WHERE kolor = ".$_GET['kolorId']."";
                    $q = mysqli_query($conn, $zap);
                    if(mysqli_num_rows($q) > 0){
                        while($r = mysqli_fetch_array($q)){
                            echo "Marka: " . $r['marka'] . "<br/>Model: " . $r['model'] . "<br/>Cena:" . $r['cena'] . "<br/>idKolor:" . $r['kolor'] . "<br/>";
                        }
                    }else{
                        echo "Brak wyników :(";
                    }
                }
            ?>
            <?php
                    $zap = "SELECT * from kolory";
                    $q = mysqli_query($conn, $zap);
                    if(mysqli_num_rows($q) > 0){
                        while($r = mysqli_fetch_array($q)){
                            echo "<a href='dodaj_pojazd.php?kolorId=".$r[0]."'>".$r[1]."</a><br>";
                        }
                    }else{
                        echo "Brak wyników :(";
                    }
            ?>

        </section>
    </main>
    <footer>

    </footer>

</body>
</html>
<?php
    mysqli_close($conn);
?>