<?php
    session_start();
    include "pages/head.php";
    include "pages/nav.php";
    include "config/connection.php";
    include "models/funkcije.php";
?>
    <div class="row m-0 mt-5 pt-5" id="poruke">
        <div class="col-10 mx-auto mt-5 pt-5 table-responsive">
        <?php
            $rezultat = vratiSve("porukekorisnika");
            if($rezultat):
        ?>
        <table class="table">
            <thead>
                <tr>
                    <th>RB</th>
                    <th>Ime pošiljaoca</th>
                    <th>Email</th>
                    <th>Telefon</th>
                    <th>Poruka</th>
                    <th>Obriši</th>
                </tr>
            </thead>
        <?php endif; ?>
        <tbody>
        <?php
            $rb=1;
            $rezultat = vratiSve("porukekorisnika");
            if($rezultat)
                foreach($rezultat as $red):
        ?>
           <tr>
                <td><?=$rb++?></td>
                <td><?=$red->ime?> <?=$red->prezime?></td>
                <td><?=$red->email?></td>
                <td><?=$red->telefon?></td>
                <td><?=$red->poruka?></td>
                <td><a href="models/obrisi-poruke-korisnika.php?id=<?=$red->id_poruke?>" class="btn btn-dark">Obriši</a></td>
           </tr>
        <?php endforeach; ?>
        </tbody>
        </table>
        <?php
            $rezultat = vratiSve("porukekorisnika");
            if(!$rezultat):
        ?>
            <p class="alert alert-info">Nemate novih poruka.</p>
        <?php
            endif;
        ?>
        </div>
    </div>
<?php
    include "pages/footer.php";
?>