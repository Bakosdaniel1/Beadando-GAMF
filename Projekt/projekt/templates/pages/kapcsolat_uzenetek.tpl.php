<?php
    // Kapcsolódás
    $sqlSzerver = "localhost";
    $sqlFhnev = "root";
    $sqlJelszo = "";
    $sqlAdatbazis = "projekt";
    $csatlakozas = new mysqli($sqlSzerver, $sqlFhnev, $sqlJelszo, $sqlAdatbazis);  

    // Üzenetek keresése
    $sqlSelect = "select * from kapcsolat order by id desc;";
    $sth = $csatlakozas->query($sqlSelect);

    if ($sth->num_rows > 0) {
        foreach ($sth as $uzenet) {
            echo "
            <div style=\"text-align: center;\">
            <p>Dátum: " . $uzenet['datum'] . "</p>
            <p>Név: " . $uzenet['nev'] . "</p>
            <p>Email: " . $uzenet['email'] . "</p>
            <p>Üzenet: " . $uzenet['uzenet'] . "</p>
            <br>
            </div>
            ";
        }
    }

    if ($csatlakozas->connect_error) {
        die("Hiba: " . $csatlakozas->connect_error);
    }
?>
