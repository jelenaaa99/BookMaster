<?php
    session_start();
    include "pages/head.php";
    include "pages/nav.php";
?>
    <div class="row m-0 mt-5 pt-5" id="korpa">
        <div class="col-12 col-sm-10 mx-auto mt-5 pt-5">
            <h4 class="text-center"></h4>
            <div id="ispisProizvodaUKorpi" class="table-responsive">
            </div>
            <?php
                if(isset($_SESSION['korisnik'])):
            ?>
                    <!-- Button trigger modal -->
               <p class="text-center"><button type="button" id="btnDovrsi" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Dovrši kupovinu
                </button></p>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Narudžbina korisnika: <?=$_SESSION['korisnik']->ime?> <?=$_SESSION['korisnik']->prezime?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <p class="mx-2 form-text text-muted">Ukoliko je pošiljku potrebno poslati na drugu adresu, molimo unesite promenu.</p>
                       <div class="row m-0">
                            <div class="form-group col-6">
                                <label>Grad:</label>
                                <input type="text" name="regGrad"  id="regGrad" class="form-control" value="<?=$_SESSION['korisnik']->grad?>"/>
                            </div>
                            <div class="form-group col-6">
                                <label>Poštanski broj:</label>
                                <input type="text" name="regPosBr"  id="regPosBr" class="form-control" value="<?=$_SESSION['korisnik']->postanski_broj?>"/>
                            </div>
                       </div>
                       <div class="row m-0">
                            <div class="form-group col-12 my-2">
                                <label>Ulica:</label>
                                <input type="text" name="regUlica"  id="regUlica" class="form-control" value="<?=$_SESSION['korisnik']->ulica?>"/>
                            </div>
                       </div>
                       <div class="row m-0">
                            <div class="col-12">
                                Ukupan iznos: <input type="text" id="ukupanIznosModal" class="form-control" readonly/>
                            </div>
                       </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Odustani</button>
                        <button type="button" id="zavrsi" class="btn btn-primary">Pošalji</button>
                    </div>
                    </div>
                </div>
                </div>
            <?php
                endif;
            ?>
            <?php
                if(!isset($_SESSION['korisnik'])):
            ?>
            <p class="alert alert-warning" id="upozorenje">Da biste dovršili kupovinu morate biti prijavljeni na sistem.</p>
            <?php
                endif;
            ?>
        </div>
    </div>
<?php
    include "pages/footer.php";
?>