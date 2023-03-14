<?php
    session_start();
    include "pages/head.php";
    include "pages/nav.php";
    include "config/connection.php";
    include "models/funkcije.php";
?>
        <div class="position-absolute w-100 overflow-hidden mainSection" id="index">
            <div id="baner" class="mx-2">
                <img src="assets/img/baner1.jpg" alt="BookMaster baner popusti" class="w-100">
            </div>
            <div id="oNama" class="mt-4">
                <h1 class="text-center mb-4">O nama</h1>
                <div id="tekstOnama" class="mx-3 mx-sm-5 text-justify">
                    <p>Lanac Knjižare BookMaster nastao je u junu 2010. godine.<br/> <br/>
                        U Beogradu se nalazi petnast od ukupno dvadeset osam knjižara (Kulturni centar Beograda, Ušće Shopping Center, Delta City, TC Merkator, SC Stadion Voždovac, RK Zvezda Zemun, Sremska 2, SC Rajićeva, Bulevar Tašmajdan, Bulevar City Store, SC Big Fashion, Beteks Banovo brdo, Ada Mall, Big Rakovica, Beo SC). Ostalih dvanaest knjižara nalazi se širom Srbije i to u Nišu, Novom Sadu, Zrenjaninu, Čačku, Kragujevcu, Šapcu, Užicu, Kruševcu i Pančevu. <br/> 
                        Osnovu naše ponude čine knjige svih domaćih izdavača. Vodili smo se idejom da čitalačkoj publici na jednom mestu ponudimo kvalitetan izbor.
                        Knjižare BookMaster potrudiće se da vam pomognu da živite bogatije i zadovoljnije kroz zabavu, obrazovanje i inspiraciju!</p>

                        <div class="w-100 d-flex flex-column flex-sm-row justify-content-between">
                            <div id="prvi" class="m-0">
                                <p class="m-0">Broj telefona: 011 454 0900</p>
                                <p class="m-0">Adresa: Sremska 2 Beograd</p>
                                <p class="m-0">E-mail: info&#64;bookmaster&#46;rs</p>
                            </div>
                            <div id="drugi">
                                <p class="m-0">Račun: Banka Intesa 106-336484-06</p>
                                <p class="m-0">PIB: 106614339</p>
                                <p class="m-0">Matični broj: 20644834</p>
                            </div>
                        </div>
                </div>
            </div>

            <div id="knjige" class="mt-4">
                <h1 class="text-center mb-4">Knjige</h1>
                <div id="sveKnjige" class="row pt-4">
                    <div class="col-12 col-lg-2 d-flex justify-content-around d-md-block">
                        <div class="row">
                            <div class="col-6 col-lg-12">
                                <ul id="zanrovi" class="px-2 my-2">
                                    <li class="fw-bold mb-2">Žanrovi</li>
                                    <?php
                                        $upit="SELECT* FROM zanr";
                                        $rezultat=$conn->query($upit);

                                        foreach($rezultat as $red):
                                    ?>
                                        <li>
                                            <input type="checkbox" class="zanr" name="zanrChb" value="<?=$red->id_zanr?>"/> <?=$red->naziv_zanr?>
                                        </li>
                                    <?php
                                        endforeach;
                                    ?>
                                </ul>
                            </div>
                            <div class="col-6 col-lg-12">
                                <div id="pretraga" class="form-group mx-1 my-2">
                                    <input type="text" id="pretrazi" name="pretrazi" placeholder="Pretraži" class="form-control"/>
                                </div>
                                <div class="form-group mx-1 my-2">
                                    <select name="ddlSort" id="ddlSort" class="form-select">
                                        <option value="0">Izbor</option>
                                        <option value="asc">Cena rastuće</option>
                                        <option value="desc">Cena opadajuće</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-10">
                        <div class="row" id="ispisKnjiga">
                        </div>
                        <p class="alert alert-danger" id="nemaProizvoda">Trenutno nema proizvoda za izabranu kategoriju.</p>
                    </div>
                </div>
            </div>
<?php
    include "pages/footer.php";
?>