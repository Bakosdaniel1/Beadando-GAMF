<?php
session_start();

if(isset($_POST['nev']) && isset($_POST['email']) && isset($_POST['uzenet'])) {
    $hibak = [];

    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $hibak = "Hibás e-mail formátum.";
    }

    if (strlen($_POST['email']) > 255) {
        $hibak = "Túl hosszú az e-mail cím.";
    }

    if (strlen($_POST['nev']) > 255) {
        $hibak = "Túl hosszú a név.";
    }

    if (count($hibak) === 0) {
        try {
            // Kapcsolódás
            $dbh = new PDO('mysql:host=localhost;dbname=hallgato123', 'hallgato123', 'Hallgato12345',
                            array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
            $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
            
            // Üzenet eltárolása
            $sqlInsert = "INSERT INTO kapcsolat(nev, email, uzenet) VALUES (:nev, :email, :uzenet);";
            $sth = $dbh->prepare($sqlInsert);
            $sth->execute(array(':nev' => $_POST['nev'], ':email' => $_POST['email'], ':uzenet' => $_POST['uzenet']));
            if($count = $sth->rowCount()) {
                $ujra = false;
                $_SESSION['elkuldott_uzenet'] = true;
                header("Location: ./../index.php?oldal=elkuldott_uzenet");
            }
            else {
                $_SESSION['sikertelen_uzenet'] = true;
                $ujra = true;
                header("Location: ./../index.php?oldal=kap");
            }
        }
        catch (PDOException $e) {
            $errormessage = "Hiba: ".$e->getMessage();
        }      
    } else {
        $_SESSION['uzenet_hibak'] = $hibak;
        header("Location: ./../index.php?oldal=kap");
    }
}
else {
    header("Location: ./../index.php");
}
?>
