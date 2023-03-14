<?php
    session_start();
    include "pages/head.php";
    include "pages/nav.php";
?>
    <div class="row m-0 mt-5">
        <div class="col-10 mx-auto my-5 pt-5" id="registracija">
            <h4 class="mt-5 text-center">Registracija</h4>
            <form action="#" method="post">
                <div class="row m-0">
                    <div class="form-group col-12 col-sm-6">
                        <label>Ime:*</label>
                        <input type="text" name="regIme"  id="regIme" class="form-control"/>
                        <small id="imeR" class="form-text">npr. Petar</small>
                    </div>
                    <div class="form-group col-12 col-sm-6">
                        <label>Prezime:*</label>
                        <input type="text" name="regPrezime"  id="regPrezime" class="form-control"/>
                        <small id="prezimeR" class="form-text">npr. Petrović</small>
                    </div>
                </div>
                <div class="row m-0">
                    <div class="form-group col-12 col-sm-6">
                        <label>E-mail adresa:*</label>
                        <input type="email" name="regEmail"  id="regEmail" class="form-control"/>
                        <small id="emailR" class="form-text">npr. petar1@gmail.com</small>
                    </div>
                    <div class="form-group col-12 col-sm-6">
                        <label>Telefon:*</label>
                        <input type="text" name="regTel"  id="regTel" class="form-control"/>
                        <small id="telR" class="form-text">Format telefona: 06x/xxx-xxx[x]</small>
                    </div>
                </div>
                <div class="row m-0">
                    <div class="form-group col-12 col-sm-6">
                        <label>Država:</label>
                        <input type="text" name="regDrz"  id="regDrz" class="form-control" value="Srbija" readonly/>
                    </div>
                    <div class="form-group col-12 col-sm-6">
                        <label>Grad:*</label>
                        <input type="text" name="regGrad"  id="regGrad" class="form-control"/>
                        <small id="gradR" class="form-text">npr. Beograd</small>
                    </div>
                </div>
                <div class="row m-0">
                    <div class="form-group col-12 col-sm-6">
                        <label>Poštanski broj:*</label>
                        <input type="text" name="regPosBr"  id="regPosBr" class="form-control"/>
                        <small id="posBrojR" class="form-text">Poštanski broj je u opsegu 11000-38000.</small>
                    </div>
                    <div class="form-group col-12 col-sm-6">
                        <label>Ulica:*</label>
                        <input type="text" name="regUlica"  id="regUlica" class="form-control"/>
                        <small id="ulicaR" class="form-text">npr. Kralja Milana 18</small>
                    </div>
                </div>
                <div class="row m-0">
                    <div class="form-group col-12 col-sm-6">
                        <label>Lozinka:*</label>
                        <input type="password" name="regPass"  id="regPass" class="form-control"/>
                        <small id="passR" class="form-text">Lozinka mora imati minimalno 6 karaktera.</small><br/>
                        <input type="checkbox" name="prikaziPass" class="prikaziPass"/> Prikaži lozinku
                    </div>
                </div>
                <div class="row m-0">
                    <div class="form-group mt-2 col-12">
                        <label>Pol:*</label> <br>
                        <input type="radio" name="rbPol" value="M"/> Muški <br>
                        <input type="radio" name="rbPol" value="Z"/> Ženski <br>
                        <small id="polR" class="form-text"></small><br/>
                    </div>
                </div>
                <div class="row m-0">
                    <div class="form-group mt-2 col-12">
                        <div class="text-center">
                        <input type="submit" value="Registracija" name="btnReg" id="btnReg" class="btn btn-dark"/>
                        </div>
                    </div>
                </div>
            </form>
            <div id="odgovorServera" class="mt-2"></div>
        </div>
    </div>
<?php
    include "pages/footer.php";
?>