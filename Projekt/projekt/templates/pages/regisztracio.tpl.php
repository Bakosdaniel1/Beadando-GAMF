<?php

if (isset($_SESSION['sikertelen_regisztracio'])) {
    echo "<h2>A felhasználónév már foglalt.</h2>";
    unset($_SESSION['sikertelen_regisztracio']);
}

?>

<main class="container mt-4">
        <h1>Regisztráció</h1>
        <form action="./logicals/regisztral.php" method="post">
            <div class="form-group">
                <label for="felhasznalo">Felhasználónév:</label>
                <input type="text" class="form-control" id="felhasznalo" name="felhasznalo" required>
            </div>

            <div class="form-group">
                <label for="jelszo">Jelszó:</label>
                <input type="password" class="form-control" id="jelszo" name="jelszo" required>
            </div>

            <div class="form-group">
                <label for="vezeteknev">Vezetéknév:</label>
                <input type="text" class="form-control" id="vezeteknev" name="vezeteknev" required>
            </div>

            <div class="form-group">
                <label for="utonev">Utónév:</label>
                <input type="text" class="form-control" id="utonev" name="utonev" required>
            </div>


            <button type="submit" class="btn btn-primary">Regisztráció</button>
        </form>
    </main>