<?php
    session_start();
    include "pages/head.php";
    include "pages/nav.php";
    include "config/connection.php";
    include "models/funkcije.php";
?>
        <div class="position-absolute w-100 overflow-hidden mainSection">
            <div id="kontakt" class="mt-4">
                <h1 class="text-center mb-4">Kontakt</h1>
                <p class="text-center p-2 p-sm-0">Niste uspeli da pronađete odgovor na Vaše pitanje u sekciji za <a href="pomoc.php" class="fw-bold">Pomoć?</a><br/>
                    Sva pitanja možete da nam postavite putem forme:</p>
                
                <form>
                    <div id="forma" class="row my-4">
                        <div class="col-10 col-md-8 mx-auto">
                            <div class="form-group row my-2">
                                <div class="col-12 col-sm-6">
                                    <label>Ime i prezime:*</label>
                                    <input type="text" class="form-control" id="imePrezime" name="tbImePrezime">
                                    <small id="imeGreska" class="form-text">npr. Petar Petrović</small>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label>Email adresa:*</label>
                                    <input type="email" class="form-control" id="email" name="tbemail">
                                    <small id="emailGreska" class="form-text">npr. petar1@gmail.com</small>
                                </div>
                              </div>
                              <div class="form-group row my-2">
                                <div class="col-12 col-sm-6">
                                    <label>Telefon:*</label>
                                    <input type="text" class="form-control" id="tel" name="tbTel">
                                    <small id="telGreska" class="form-text">Format telefona: 06x/xxx-xxx[x]</small>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label>Poštanski broj:*</label>
                                    <input type="text" class="form-control" id="postanskiBroj" name="tbPostanskiBroj">
                                    <small id="postanskiBrojGreska" class="form-text">Poštanski broj je u opsegu 11000-38000.</small>
                                </div>
                            </div>
                            <div class="form-group row my-2">
                                <div class="col-12">
                                    <label>Poruka:*</label>
                                    <textarea class="form-control" rows="3" id="tekstPoruke"></textarea>
                                    <small id="tekstPorukeGreska" class="form-text">Poruka se sastoji od minimum 3 karaktera.</small>
                                </div>
                            </div>
                            <div class="row my-2">
                               <div class="col-12 text-center">
                                    <input type="submit" id="btnPosalji" name="btnPosalji" class="btn btn-primary" value="Pošaljite"/>
                               </div>
                            </div>
                            <p class="text-center" id="odgovorServera"></p>
                        </div>
                    </div>
                </form>
            </div>
<?php
    include "pages/footer.php";
?>