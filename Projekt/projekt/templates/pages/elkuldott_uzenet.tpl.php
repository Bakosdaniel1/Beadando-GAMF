<?php
if (isset($_SESSION['elkuldott_uzenet'])) {
    // Kapcsolódás
    $sqlSzerver = "localhost";
    $sqlFhnev = "hallgato123";
    $sqlJelszo = "hallgato123";
    $sqlAdatbazis = "Hallgato12345";
    $csatlakozas = new mysqli($sqlSzerver, $sqlFhnev, $sqlJelszo, $sqlAdatbazis);  

    // Üzenetek keresése
    $sqlSelect = "select * from kapcsolat order by id desc limit 1;";
    $sth = $csatlakozas->query($sqlSelect);

    if ($sth->num_rows == 1) {
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

    unset($_SESSION['elkuldott_uzenet']);
} else {
    echo "<h2 style=\"text-align: center;\">Nem küldtél üzenetet.</h2>";
}
?>
