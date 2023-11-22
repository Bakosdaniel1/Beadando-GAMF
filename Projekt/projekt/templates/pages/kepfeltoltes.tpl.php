<main class="container mt-4">
        <h1>Képfeltöltés</h1>
        <form action="./logicals/kepfeltoltes.php" method="post" enctype="multipart/form-data">
            <!-- Több fájl input elem -->
            <div class="form-group">
                <label for="kep">Válasszon egy vagy több képet:</label>
                <input type="file" class="form-control-file" id="kep" name="file" accept="image/*" multiple required>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Képfeltöltés</button>
        </form>

        <h2 class="mt-4">Feltöltött képek:</h2>
        <!-- A képek megjelenítése dinamikusan generált div-ben -->
        <div id="preview-container" class="mt-2"></div>
    </main>

