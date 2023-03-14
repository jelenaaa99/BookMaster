<?php
    session_start();
    include "pages/head.php";
    include "pages/nav.php";
    include "config/connection.php";
    include "models/funkcije.php";
?>
    <div class="row m-0 mt-5 pt-5" id="izmeni">
        <div class="col-10 mx-auto mt-5 pt-5">
            <?php
                if(isset($_GET['id'])){
                $id = $_GET['id'];    
                
                $upit = "SELECT* FROM korisnici WHERE id_korisnik=:id";
                $priprema = $conn->prepare($upit);
                $priprema->bindParam(":id", $id);
                $priprema->execute();
                $rez = $priprema->fetch();
                if($rez):
            ?> 
                <h2 class="text-center my-2">Korisnik:</h2>
                <form action="models/update.php" method="post">
                <input type="hidden" name="id" value="<?=$rez->id_korisnik?>">
                    <div class="row m-0">
                        <div class="form-group col-12 col-sm-6">
                            <label>Ime:</label>
                            <input type="text" name="izmenaIme" value="<?=$rez->ime?>" class="form-control"/>
                        </div>
                        <div class="form-group col-12 col-sm-6">
                            <label>Prezime:</label>
                            <input type="text" name="izmenaPrezime" value="<?=$rez->prezime?>" class="form-control"/>
                        </div>
                    </div>
                    <div class="row m-0">
                        <div class="form-group col-12 col-sm-6">
                            <label>E-mail adresa:</label>
                            <input type="email" name="izmenaEmail" value="<?=$rez->email?>" class="form-control" readonly/>
                        </div>
                        <div class="form-group col-12 col-sm-6">
                            <label>Telefon:</label>
                            <input type="text" name="izmenaTel" value="<?=$rez->telefon?>" class="form-control"/>
                        </div>
                    </div>
                    <div class="row m-0">
                        <div class="form-group col-12 col-sm-6">
                            <label>Država:</label>
                            <input type="text" name="izmenaDrz" class="form-control" value="Srbija" readonly/>
                        </div>
                        <div class="form-group col-12 col-sm-6">
                            <label>Grad:</label>
                            <input type="text" name="izmenaGrad" value="<?=$rez->grad?>" class="form-control"/>
                        </div>
                    </div>
                    <div class="row m-0">
                        <div class="form-group col-12 col-sm-6">
                            <label>Poštanski broj:</label>
                            <input type="text" name="izmenaPosBr" value="<?=$rez->postanski_broj?>" class="form-control"/>
                        </div>
                        <div class="form-group col-12 col-sm-6">
                            <label>Ulica:</label>
                            <input type="text" name="izmenaUlica" value="<?=$rez->ulica?>" class="form-control"/>
                        </div>
                    </div>
                    <div class="row m-0">
                        <div class="form-group col-12 col-sm-6">
                            <label>Promenite lozinku:</label>
                            <input type="password" name="izmenaPass"id="izmeniPass" class="form-control"/>
                            <input type="checkbox" name="prikaziPass" class="prikaziPass"/> Prikaži lozinku
                        </div>
                    </div>
                    <div class="row m-0">
                        <div class="form-group mt-2 col-12">
                            <label>Pol:</label> <br>
                            <?php
                                if($rez->pol=="M"):
                            ?>
                            <input type="radio" name="izmenaPol" value="M" checked/> Muški <br>
                            <input type="radio" name="izmenaPol" value="Z"/> Ženski <br>
                            <?php endif;?>
                            <?php
                                if($rez->pol=="Z"):
                            ?>
                            <input type="radio" name="izmenaPol" value="M"/> Muški <br>
                            <input type="radio" name="izmenaPol" value="Z" checked/> Ženski <br>
                            <?php endif;?>
                        </div>
                    </div>
                    <div class="row m-0">
                        <div class="form-group mt-2 col-12">
                            <div class="text-center">
                            <input type="submit" value="Izmeni" name="btnIzmena" id="btnIzmena" class="btn btn-dark"/>
                            </div>
                        </div>
                    </div>
                </form>
            <?php endif;?>
            <?php
            }?>  
            <?php
                if(isset($_GET['poruka'])):
            ?>
            <p class="alert alert-info my-2"><?=$_GET['poruka']?></p>
            <?php
                endif;
            ?> 
        </div>
    </div>
<?php
    include "pages/footer.php";
?>