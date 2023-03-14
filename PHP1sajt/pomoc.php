<?php
    session_start();
    include "pages/head.php";
    include "pages/nav.php";
?>
    <div class="row m-0 mt-5 pt-5" id="pomoc">
        <div class="col-12 col-sm-11 mx-auto mt-5 pt-5">
            <h4 class="text-center mb-4">NAJČEŠĆA PITANJA</h4>
            <p class="text-center p-2 p-sm-0 text-muted">Ako vam je potrebna pomoć, ovde možete potražiti odgovore na najčešće postavljena pitanja ili nam pišite na porudzbine@BookMaster.rs</p>
            <div id="pitanjaOdgovori" class="py-4">
            </div>
        </div>
<?php
    include "pages/footer.php";
?>