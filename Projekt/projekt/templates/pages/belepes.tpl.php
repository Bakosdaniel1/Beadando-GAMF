<?php

if (isset($_SESSION['sikeres_regisztracio'])) {
    echo "<h2 style=\"text-align: center;\">Sikeres regisztráció.</h2>";
    unset($_SESSION['sikeres_regisztracio']);
}

?>

<div class="container mx-auto mt-4">
        <h1>Belépés</h1>
        <form action="./logicals/belep.php" method="post">
            <div class="form-group">
                <label for="felhasznalo">Felhasználónév:</label>
                <input type="text" class="form-control" id="felhasznalo" name="felhasznalo" required>
            </div>

            <div class="form-group">
                <label for="jelszo">Jelszó:</label>
                <input type="password" class="form-control" id="jelszo" name="jelszo" required>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Belépés</button>
        </form>
    </div>

    <div class="container mx-auto mt-4">
        <div class="form-group">
            <a href="regisztracio.tpl.php" class="btn btn-primary">Regisztráció</a>
        </div>
    </div>