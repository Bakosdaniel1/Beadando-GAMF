<?php

if (isset($_SESSION['sikertelen_uzenet'])) {
    echo "<h2>Az üzenet küldése nem sikerült.</h2>";
    unset($_SESSION['sikertelen_uzenet']);
}

if (isset($_SESSION['uzenet_hibak']) && count($_SESSION['uzenet_hibak']) !== 0) {
    foreach ($_SESSION['uzenet_hibak'] as $hiba) {
        echo $hiba . "<br>";
    }

    unset($_SESSION['uzenet_hibak']);
}

?>

<main class="container mt-4">
        <h1>Kapcsolat</h1>
        <form action="./logicals/kapcsolat.php" method="post" onsubmit="return ellenorzes();">
            <div class="form-group">
                <label for="nev">Név:</label>
                <?php if (isset($_SESSION['login'])) {
                    echo "
                    <input type=\"text\" class=\"form-control\" id=\"nev\" name=\"nev\" required readonly maxlength=\"255\" value=" . $_SESSION['login'] . ">
                    ";
                } else {
                    echo "
                    <input type=\"text\" class=\"form-control\" id=\"nev\" name=\"nev\" required readonly maxlength=\"255\" value=\"Vendég\">
                    ";
                } ?>
            </div>

            <div class="form-group">
                <label for="email">E-mail cím:</label>
                <input type="email" class="form-control" id="email" name="email" required maxlength="255">
            </div>

            <div class="form-group">
                <label for="uzenet">Üzenet:</label>
                <textarea class="form-control" id="uzenet" name="uzenet" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Küldés</button>
        </form>
    </main>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script>
        function ellenorzes() {
            var nev = document.getElementById("nev").value;
            var email = document.getElementById("email").value;
            var uzenet = document.getElementById("uzenet").value;

            if (nev === "" || email === "" || uzenet === "") {
                alert("Minden mezőt ki kell tölteni!");
                return false;
            }
            return true;
        }
    </script>