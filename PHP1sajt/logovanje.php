<?php
    session_start();
    if(isset($_SESSION['korisnik'])){
        header("Location: index.php");
    }
    include "pages/head.php";
    include "pages/nav.php";
?>
    <div class="row m-0 mt-5">
        <div class="col-10 col-sm-6 mx-auto my-5 pt-5" id="logovanje">
            <h4 class="mt-5 text-center">Prijava</h4>
            <!-- <h6 class="my-4 mx-2 fw-bold">
                <?php
                    //if(isset($_SESSION['korisnik'])):
                ?>
                    Dobro došli, <?=$_SESSION['korisnik']->ime?> <?=$_SESSION['korisnik']->prezime?>
                <?php
                    //endif;
                ?>
            </h6> -->
            <form action="#" method="post">
                <div class="row m-0">
                    <div class="form-group col-12">
                        <label>E-mail adresa:*</label>
                        <input type="email" name="logEmail"  id="logEmail" class="form-control"/>
                        <small id="emailL" class="form-text">npr. petar1@gmail.com</small>
                    </div>
                    <div class="form-group col-12 mt-2">
                        <label>Lozinka:*</label>
                        <input type="password" name="logPass"  id="logPass" class="form-control"/>
                        <small id="passL" class="form-text">Lozinka mora imati minimalno 6 karaktera.</small><br/>
                        <input type="checkbox" name="prikaziPass" class="prikaziPass"/> Prikaži lozinku
                    </div>
                </div>
                <div class="row m-0">
                    <div class="form-group mt-2 col-12">
                        <div class="text-center">
                        <input type="submit" value="Prijava" name="btnPrijava" id="btnPrijava" class="btn btn-dark"/>
                        </div>
                    </div>
                </div>
            </form>
            <div id="odgovorServera2" class="mt-2"></div>
        </div>
    </div>
<?php
    include "pages/footer.php";
?>