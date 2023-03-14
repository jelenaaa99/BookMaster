<?php
    session_start();
    include "pages/head.php";
    include "pages/nav.php";
?>
    <div class="row m-0 mt-5 pt-5" id="autor">
        <div class="col-12 col-sm-10 mx-auto mt-5 pt-5">
            <h4 class="text-center my-2">Autor</h4>
            <div class="d-flex justify-content-around flex-column flex-md-row">
                <div id="slika" class="text-center">
                    <img src="assets/img/profilSlika.jpg" alt="Jelena Bisevac"/>
                </div>
                <div id="tekst" class="px-2 py-2 text-center text-muted">
                Zdravo! Zovem se Jelena Biševac i trenutno sam na drugoj godini studija Visoke ICT škole, smer internet tehnologije. Želja mi je da postanem full stack developer, i zato se trudim da stalno unapređujem svoja znanja. Ovaj sajt je rađen kao deo predispitne obaveze iz predmeta PHP 1. Ukoliko želite da pogledate neke od mojih ranijih radova, to možete uraditi klikom na ovaj <a href="https://jelenabisevacportfolio.netlify.app/" class="text-decoration-none text-success fw-bold" target="_blank">Link</a>.
                </div>
            </div>
        </div>
    </div>
<?php
    include "pages/footer.php";
?>