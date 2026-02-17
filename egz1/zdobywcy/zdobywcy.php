<?php
    
    $conn = mysqli_connect('localhost', 'root', '', 'zdobywcy');
    
    function skrypt1($conn){
        $zap = "SELECT nazwisko, imie, funkcja, email FROM osoby;";
        $q = mysqli_query($conn, $zap);
        while($r = mysqli_fetch_row($q)) {
            echo "<tr>
            <td>" . $r[0] . "</td>
            <td>" . $r[1] . "</td>
            <td>" . $r[2] . "</td>
            <td>" . $r[3] . "</td>
            </tr>";
        }
    }

    function skrypt2($conn){
        if($_POST['nazwisko'] != '' and $_POST['imie'] != '' and $_POST['funkcja'] != '' and $_POST['email'] != ''){
            $zap = "INSERT INTO osoby() VALUES(NULL, '". $_POST['nazwisko'] ."', '". $_POST['imie'] ."', '".$_POST['funkcja']."', '". $_POST['email'] ."');";
            $q = mysqli_query($conn, $zap);
            if($q) echo "<script>alert('dodano!')</script>";    
        }
    }

    if(isset($_POST['submit'])) skrypt2($conn);
?>

<!DOCTYPE html>
<html lang="PL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>ZDOBYWCY GÓR</title>
</head>
<body>
    <header><h1>Klub zdobywców gór polskich</h1></header>
    <nav>
        <a href="#1">kwerenda1</a>
        <a href="#2">kwerenda2</a>
        <a href="#3">kwerenda3</a>
        <a href="#4">kwerenda4</a>
    </nav>
    <section id="left">
        <img src="assets/logo.jpg" alt="logo zdobywcy">
        <h3>razem z nami:</h3>
        <ul>
            <li>wyjazdy</li>
            <li>szkolenia</li>
            <li>rekreacja</li>
            <li>wypoczynek</li>
            <li>wyzwania</li>
        </ul>
    </section>
    <section id="right">
        <h2>Dołącz do naszego zespołu!</h2>
        <p>Wpisz swoje dane do formularza:</p>
        <form method="post">
            <label>Nazwisko: <input type="text" name="nazwisko"></label>
            <label>Imię: <input type="text" name="imie"></label>
            <label>Funkcja:
                <select name="funkcja" id="funkcjaSelect">
                    <option value="uczestnik">uczestnik</option>
                    <option value="przewodnik">przewodnik</option>
                    <option value="zaopatrzeniowiec">zaopatrzeniowiec</option>
                    <option value="organizator">organizator</option>
                    <option value="ratownik">ratownik</option>
                </select>
            </label>
            <label>Email: <input type="email" name="email"></label>
            <button type="submit" name="submit">Dodaj</button>
            <table>
                <tr>
                    <th>Nazwisko</th>
                    <th>Imie</th>
                    <th>Funkcja</th>
                    <th>Email</th>
                </tr>
                <?php
                    skrypt1($conn);
                ?>
            </table>
        </form>
    </section>
    <footer>
        <p>Strone wykonał: Filip Matusik</p>
    </footer>
</body>
</html>