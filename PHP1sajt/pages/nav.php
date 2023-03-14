<div class="container-fluid p-0 m-0 overflow-hidden">
        <header class="position-fixed overflow-hidden w-100">
            <div class="row m-0 p-1 crnaTraka">
                <div class="col-12 col-md-6 px-4">
                    <div class="row m-0">
                        <div class="col-9 text-center text-md-start">Kupite online i uštedite</div>
                        <?php
                            if(isset($_SESSION['korisnik']) && $_SESSION['korisnik']->id_uloge==2):
                        ?>
                            <div class="col-3 fw-bold"><a href="admin.php" class="text-danger">Admin</a></div>
                        <?php
                            endif;
                        ?>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="row text-center">
                        <?php
                            if(!isset($_SESSION['korisnik'])):
                        ?>
                        <div class="col-4">
                            <a href="logovanje.php"><i class="fa fa-user px-1" aria-hidden="true"></i>Prijava</a>
                        </div>
                        <div class="col-4">
                            <a href="registracija.php">Registracija</a>
                        </div>
                        <?php
                            else:
                        ?>
                        <div class="col-4">
                            <a href="models/logout.php">Odjava</a>
                        </div>
                        <?php
                            endif;
                        ?>
                    </div>
                </div>
            </div>
            <div class="row m-0 border py-2 py-sm-0">
                <div class="col-4 d-flex d-md-block justify-content-between align-items-center text-md-center">
                    <div>
                        <a href="index.php"><img src="assets/img/knjigaLogo.png" alt="Logo" id="Knjiga Logo" class="img-fluid slikaLogo"/></a>
                    </div>
                    <div class="korpa d-flex d-md-none position-relative">
                            <a href="korpa.php" class="prikazKorpe"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                            <div class="brProizvoda position-absolute rounded-circle text-center fw-bold border"></div>
                    </div>
                </div>
                <div class="col-md-4 d-none d-md-block d-md-flex justify-content-center">
                    <div class="dostava p-2 d-flex align-items-center">
                        <i class="fa fa-truck" aria-hidden="true"></i>
                    </div>
                    <div class="dostavaTekst p-2">
                        <p class="m-0">Besplatna dostava</p>
                        <small>Za bilo koji iznos kupovine</small>
                    </div>
                </div>
                <div class="col-md-4 mt-3 pomoc d-none d-md-block">
                    <div class="d-flex justify-content-between align-items-center p-2">
                        <div id="pitanja">
                            <i class="fa fa-question-circle-o mx-2" aria-hidden="true"></i><a href="pomoc.php">Pomoć i najćešća pitanja</a><br>
                            <a href="kontakt.php"><small class="text-muted px-4 mx-3">Kontaktirajte nas</small></a>
                        </div>
                        <div class="korpa d-flex position-relative">
                            <a href="korpa.php" class="prikazKorpe"><i class="fa fa-shopping-cart prikazKorpe" aria-hidden="true"></i></a>
                            <div class="brProizvoda position-absolute rounded-circle text-center fw-bold"></div>
                        </div>
                    </div>
                </div>
                <div class="col-8 col-md-0 d-md-none d-block meni">
                    <div id="barMeni" class="d-flex flex-row-reverse justify-content-between">
                        <i class="fa fa-bars mx-4 position-relative d-block" aria-hidden="true" id="ham"></i>
                        <ul id="hamLista" class="mb-0 mt-4">
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row position-relative border-bottom" id="divMainMenu">
                <div class="col-12">
                    <ul class="d-md-flex d-none justify-content-around align-items-center mb-0 p-1" id="mainMenu">
                    </ul>
                </div>
            </div>
        </header>