<?php
    session_start();
    include "pages/head.php";
    include "pages/nav.php";
    include "config/connection.php";
    include "models/funkcije.php";
?>
    <div id="admin">
    <div class="row m-0 mt-5 pt-5">
        <div class="col-10 mx-auto mt-5 pt-5 table-responsive">
        <div class="text-end"><a href="narudzbine.php" class="btn btn-success mx-2 text-white fw-bold">Narudžbine korisnika</a><a href="poruke-korisnika.php" class="btn btn-info text-white fw-bold">Poruke</a></div>
            <h2 class="text-center my-2">Korisnici</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Ime i prezime</th>
                        <th>Uloga</th>
                        <th>Detaljnije</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $upit = "SELECT* FROM korisnici k JOIN uloge u ON k.id_uloge=u.id_uloge";
                    $rezultat=$conn->query($upit)->fetchAll();
                   
                    foreach($rezultat as $red):
                ?>
                    <tr>
                        <td><?=$red->id_korisnik?></td>
                        <td><?=$red->ime?> <?=$red->prezime?></td>
                        <td><?=$red->naziv?></td>
                        <td>
                            <a href="models/brisanje.php?id=<?=$red->id_korisnik?>" class="btn btn-dark">Obriši</a>
                            <a href="izmeni.php?id=<?=$red->id_korisnik?>" class="btn btn-success">Izmeni</a>
                        </td>
                    </tr>
                <?php
                    endforeach;
                ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="row m-0 my-4">
        <div class="col-10 mx-auto">
            <h2 class="text-center my-2">Unesite novu knjigu</h2>
            <form action="models/unos-knjiga.php" method="post">
                <div class="row m-0">
                    <div class="from-group col-12 col-md-6">
                        <label>Naziv knjige:</label>
                        <input type="text" id="nazivKnjige" name="nazivKnjige" class="form-control"/>
                    </div>
                    <div class="from-group col-12 col-md-6">
                        <label>Cena knjige:</label>
                        <input type="text" id="cenaKnjige" name="cenaKnjige" class="form-control"/>
                    </div>
                </div>
                <div class="row m-0 my-2">
                    <div class="from-group col-12 col-md-6">
                        <label>Šifra knjige:</label>
                        <input type="text" id="sifraKnjige" name="sifraKnjige" class="form-control"/>
                    </div>
                    <div class="from-group col-12 col-md-6">
                        <label>ISBN knjige:</label>
                        <input type="text" id="isbnKnjige" name="isbnKnjige" class="form-control"/>
                    </div>
                </div>
                <div class="row m-0 my-2">
                    <div class="from-group col-12 col-md-6">
                        <label>Žanr knjige:</label>
                        <select name="ddlZanr" id="ddlZanr" class="form-select">
                            <?php

                                $rezultat=vratiSve("zanr");
                                foreach($rezultat as $red):
                            ?>
                            <option value="<?=$red->id_zanr?>"><?=$red->naziv_zanr?></option>
                            <?php
                                endforeach;
                            ?>
                        </select>
                    </div>
                    <div class="from-group col-12 col-md-6">
                        <label>Autor knjige:</label>
                        <select name="ddlAutor" id="ddlAutor" class="form-select">
                            <?php

                                $rezultat=vratiSve("autori");
                                foreach($rezultat as $red):
                            ?>
                            <option value="<?=$red->id_autor?>"><?=$red->ime_autor?></option>
                            <?php
                                endforeach;
                            ?>
                        </select>
                    </div>
                </div>
                <div class="row m-0 my-2">
                    <div class="col-12 col-md-6">
                        <div class="row m-0 d-flex align-items-end">
                            <div class="from-group col-12 col-md-6">
                                <label>Novi žanr knjige:</label>
                                <input type="text" id="noviZanrKnjige" name="noviZanrKnjige" class="form-control"/>
                            </div>
                            <div class="from-group col-12 col-md-6 text-center">
                                <input type="submit" name="btnUnesiZanr" class="btn btn-success" value="Unesi žanr"/>
                            </div>
                            <?php
                            if(isset($_GET['porukaZanr'])):
                            ?>
                            <p class="alert alert-info my-2"><?=$_GET['porukaZanr']?></p>
                            <?php
                                endif;
                            ?>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="row m-0 d-flex align-items-end">
                            <div class="from-group col-12 col-md-6">
                                <label>Novi autor knjige:</label>
                                <input type="text" id="noviAutorKnjige" name="noviAutorKnjige" class="form-control"/>
                            </div>
                            <div class="from-group col-12 col-md-6 text-center">
                                <input type="submit" name="btnUnesiAutora" class="btn btn-success" value="Unesi autora"/>
                            </div>
                        </div>
                        <?php
                            if(isset($_GET['porukaAutor'])):
                        ?>
                          <p class="alert alert-info my-2"><?=$_GET['porukaAutor']?></p>
                        <?php
                            endif;
                        ?>
                    </div>
                </div>
                <div class="row m-0 my-2">
                    <div class="from-group col-12">
                        <label>Naziv fajla(slika knjige):</label>
                        <input type="text" id="slikaKnjige" name="slikaKnjige" class="form-control p-0"/>
                    </div>
                </div>
                <div class="row m-0 my-5">
                    <div class="from-group col-12">
                        <label>Opis knjige:</label> <br>
                        <textarea name="opisKnjige" id="opisKnjige" class="w-100" cols="30" rows="10"></textarea>
                    </div>
                </div>
                <div class="row m-0">
                    <div class="col-12 text-center">
                        <input type="submit" name="btnUnesiKnjigu" class="btn btn-success" value="Unesi knjigu"/>
                    </div>
                </div>
                <?php
                    if(isset($_GET['porukaKnjiga'])):
                ?>
                <p class="alert alert-info mt-2"><?=$_GET['porukaKnjiga']?></p>
                <?php
                    endif;
                ?>
            </form>
        </div>
    </div>


    <div class="row m-0">
        <div class="col-10 mx-auto mt-5 table-responsive">
            <h2 class="text-center my-2">Knjige</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th></th>
                        <th>Naziv knjige</th>
                        <th>Obriši</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $rez = spojiSve();
                   
                    foreach($rez as $red):
                ?>
                    <tr>
                        <td><?=$red->id_knjige?></td>
                        <td><img src="assets/img/<?=$red->src_knjige?>" alt="<?=$red->naziv_knjige?>" class="adminSlika"></td>
                        <td><?=$red->naziv_knjige?></td>
                        <td>
                            <a href="models/brisanjeknjige.php?id=<?=$red->id_knjige?>" class="btn btn-dark">Obriši</a>
                        </td>
                    </tr>
                <?php
                    endforeach;
                ?>
                </tbody>
            </table>
        </div>
    </div>
    </div>
<?php
    include "pages/footer.php";
?>