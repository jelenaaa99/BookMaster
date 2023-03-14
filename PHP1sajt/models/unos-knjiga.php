<?php
    if(isset($_POST['btnUnesiAutora'])){
        include "../config/connection.php";
        $autor = $_POST['noviAutorKnjige'];
        $porukaAutor = "";
        $reImePrezime = "/^[A-ZŠĐČĆŽ][a-zšđčćž]{2,14}(\s[A-Z][a-zzšđčćž]{2,14})+$/";

        if(!preg_match($reImePrezime, $autor)){
            $porukaAutor="Proverite format imena.";
        }
        else{
            $upit = "INSERT INTO autori(ime_autor) VALUES(:ime)";
            $priprema = $conn->prepare($upit);
            $priprema->bindParam(":ime", $autor);
            $priprema->execute();
            $porukaAutor="Uspešno je dodat novi autor. Vratite se na padajuću listu autora.";
        }
        header("Location:../admin.php?porukaAutor=$porukaAutor");
    }
    else if(isset($_POST['btnUnesiZanr'])){
        include "../config/connection.php";
        $zanr = $_POST['noviZanrKnjige'];
        $porukaZanr = "";

        $reZanr = "/^[A-ZŠĐČĆŽ][a-zšđčćž]{2,14}(\s[a-zzšđčćž]{2,14})*$/";

        if(!preg_match($reZanr, $zanr)){
            $porukaZanr="Prvo slovo žanra je veliko, sva ostala su mala.";
        }
        else{
            $upit = "INSERT INTO zanr(naziv_zanr) VALUES(:naziv)";
            $priprema = $conn->prepare($upit);
            $priprema->bindParam(":naziv", $zanr);
            $priprema->execute();
            $porukaZanr="Uspešno je dodat novi žanr. Vratite se na padajuću listu žanrova.";
        }

        header("Location:../admin.php?porukaZanr=$porukaZanr");
    }
    else if(isset($_POST['btnUnesiKnjigu'])){
        include "../config/connection.php";

        $naziv = $_POST['nazivKnjige'];
        $cena = $_POST['cenaKnjige'];
        $sifra = $_POST['sifraKnjige'];
        $isbn = $_POST['isbnKnjige'];
        $zanrID = $_POST['ddlZanr'];
        $autorID= $_POST['ddlAutor'];
        $slika = $_POST['slikaKnjige'];
        $opis = $_POST['opisKnjige'];
        $porukaKnjiga="";

        $br=0;

        if($naziv==""){
            $br++;
        }
        if($cena==""){
            $br++;
        }
        if(strlen($sifra)!=6){
            $br++;
        }
        if(strlen($isbn)!=13){
            $br++;
        }
        if($slika==""){
            $br++;
        }
        if($opis==""){
            $br++;
        }

        if($br==0){
            $upit = "INSERT INTO knjige(naziv_knjige, cena_knjige, sifra_knjige, isbn_knjige, opis_knjige, src_knjige, zanrId_knjige, autorId_knjige) VALUES(:naziv_knjige, :cena_knjige, :sifra_knjige, :isbn_knjige, :opis_knjige, :src_knjige, :zanrId_knjige, :autorId_knjige)";

            $priprema = $conn->prepare($upit);
            $priprema->bindParam(":naziv_knjige", $naziv);
            $priprema->bindParam(":cena_knjige", $cena);
            $priprema->bindParam(":sifra_knjige", $sifra);
            $priprema->bindParam(":isbn_knjige", $isbn);
            $priprema->bindParam(":opis_knjige", $opis);
            $priprema->bindParam(":src_knjige", $slika);
            $priprema->bindParam(":zanrId_knjige", $zanrID);
            $priprema->bindParam(":autorId_knjige", $autorID);
            $priprema->execute();

            $porukaKnjiga="Dodata je nova knjiga.";
        }
        else{
            $porukaKnjiga="Proverite format podataka za unos.";
        }
        header("Location:../admin.php?porukaKnjiga=$porukaKnjiga");
    }
    else{
        header("Location:../admin.php");
    }
?>