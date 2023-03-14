<?php
    session_start();
    include "pages/head.php";
    include "pages/nav.php";
    include "config/connection.php";
    include "models/funkcije.php";
?>
    <div class="row m-0 mt-5 pt-5" id="narudzbine">
        <div class="col-10 mx-auto mt-5 pt-5">
            <?php
                $rezultat = vratiSve("narudzbine");
                if($rezultat):
            ?>
            <h4 class="text-center py-2">Narudžbine</h4>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>RB</th>
                            <th>Naručilac</th>
                            <th>Grad</th>
                            <th>Poštanski broj</th>
                            <th>Adresa</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $upit = "SELECT n.id_narudzbine, k.id_korisnik, k.ime, k.prezime, n.grad, n.postanski_broj, n.adresa FROM korisnici k JOIN narudzbine n ON k.id_korisnik=n.id_korisnika";
                            $rez = $conn->query($upit)->fetchAll();
                            $rb=1;
                            foreach($rez as $red):
                        ?>
                        <tr>
                            <td><?=$rb++?></td>
                            <td><?=$red->ime?> <?=$red->prezime?></td>
                            <td><?=$red->grad?></td>
                            <td><?=$red->postanski_broj?></td>
                            <td><?=$red->adresa?></td>
                            <td>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal<?=$red->id_narudzbine?>">
                                Vidi narudžbinu
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal<?=$red->id_narudzbine?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Detalji narudžbine</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>RB</th>
                                                        <th>Proizvod</th>
                                                        <th>Količina</th>
                                                        <th>Cena</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                   <?php
                                                        $id = $red->id_narudzbine;
                                                        $upit2 = "SELECT* FROM narudzbine_stavke ns JOIN narudzbine n ON ns.id_narudzbine=n.id_narudzbine JOIN knjige k ON k.id_knjige=ns.id_proizvoda WHERE n.id_narudzbine=:id";

                                                        $priprema = $conn->prepare($upit2);
                                                        $priprema->bindParam(":id", $id);
                                                        $priprema->execute();

                                                        $rb2=1;
                                                        $rez2 = $priprema->fetchAll();
                                                        foreach($rez2 as $red2):
                                                   ?>
                                                    <tr>
                                                        <td><?=$rb2++?></td>
                                                        <td><?=$red2->naziv_knjige?></td>
                                                        <td><?=$red2->kolicina?></td>
                                                        <td><?=$red2->cena_knjige?></td>
                                                    </tr>
                                                   <?php endforeach;?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
            <?php else:?>
            <h4 class="text-center">Trenutno nema narudžbina</h4>
            <?php endif;?>
        </div>
    </div>
<?php
    include "pages/footer.php";
?>