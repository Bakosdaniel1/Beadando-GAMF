    <section id="fooldal" class="page">
        <div class="container">
            <h1>Videók</h1>
            <div class="video-container">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/YOUR_VIDEO_ID_1" allowfullscreen></iframe>
                </div>
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="./videos/americ.mp4" allowfullscreen></iframe>
                </div>
            </div>
            <h1 id="fotogaleria">Fotógaléria</h1>

            <?php
            $dir = "./images/uploads/";

            if (is_dir($dir)){
                if ($kepek = opendir($dir)){
                    while (($kep = readdir($kepek)) !== false){
                        if ($kep != "." && $kep != "..") {
                            echo "<image src=\"$dir$kep\">";
                        }
                    }
                    closedir($kepek);
                }
            }
            ?>

        </div>
    </section>
    
    <section id="kapcsolat" class="page bg-light">
        <div class="container">
            <h2 style="text-align: center;">Kapcsolat</h2>
            <div class="contact-container">
                <div class="contact-info">
                    <p><strong>Cím:</strong><br>6000 Kecskemét, Szolnoki út 31.</p>
                    <p><strong>Nyitva tartás:</strong><br>Hétfő - Csütörtök: 07:00 - 16:30<br>Péntek: 07:00 - 14:00</p>
                    <p><strong>Telefon:</strong><br>+36-76-507-458</p>
                    <p><strong>E-mail:</strong><br><a href="mailto:titkarsag@ketiszk.hu">titkarsag@ketiszk.hu</a></p>
                </div>
                <div class="map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2737.141233003977!2d19.667389016000343!3d46.91263477221509!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4767a20615315045%3A0x59d4e6c3e30a7ea3!2sSzolnoki%20%C3%BAt%2031%2C%206000%20Kecskem%C3%A9t!5e0!3m2!1sen!2shu!4v1665042769316!5m2!1sen!2shu" width="600" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </section>