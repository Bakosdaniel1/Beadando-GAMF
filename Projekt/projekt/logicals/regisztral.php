<?php
if(isset($_POST['felhasznalo']) && isset($_POST['jelszo']) && isset($_POST['vezeteknev']) && isset($_POST['utonev'])) {
    try {
        // Kapcsolódás
        $dbh = new PDO('mysql:host=localhost;dbname=hallgato123', 'hallgato123', 'Hallgato12345',
                        array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
        $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
        
        // Létezik már a felhasználói név?
        $sqlSelect = "select id from felhasznalok where bejelentkezes = :bejelentkezes";
        $sth = $dbh->prepare($sqlSelect);
        $sth->execute(array(':bejelentkezes' => $_POST['felhasznalo']));
        if($row = $sth->fetch(PDO::FETCH_ASSOC)) {
            $uzenet = "A felhasználói név már foglalt!";
            $ujra = "true";
        }
        else {
            // Ha nem létezik, akkor regisztráljuk
            $sqlInsert = "insert into felhasznalok(id, csaladi_nev, uto_nev, bejelentkezes, jelszo)
                          values(0, :csaladinev, :utonev, :bejelentkezes, :jelszo)";
            $stmt = $dbh->prepare($sqlInsert); 
            $stmt->execute(array(':csaladinev' => $_POST['vezeteknev'], ':utonev' => $_POST['utonev'],
                                 ':bejelentkezes' => $_POST['felhasznalo'], ':jelszo' => sha1($_POST['jelszo']))); 
            if($count = $stmt->rowCount()) {
                session_start();
                $_SESSION['sikeres_regisztracio'] = true;
                $ujra = false;
                header("Location: ./../index.php?oldal=belepes");
            }
            else {
                $_SESSION['sikertelen_regisztracio'] = true;
                $ujra = true;
                header("Location: ./../index.php?oldal=regisztracio");
            }
        }
    }
    catch (PDOException $e) {
        $uzenet = "Hiba: ".$e->getMessage();
        $ujra = true;
    }      

    echo $uzenet;
}
else {
    header("Location: .");
}
?>