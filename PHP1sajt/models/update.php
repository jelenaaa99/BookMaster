<?php
   if(isset($_POST['btnIzmena'])){
    include "../config/connection.php";

    $id = $_POST['id'];
    $ime = $_POST['izmenaIme'];
    $prezime = $_POST['izmenaPrezime'];
    $telefon = $_POST['izmenaTel'];
    $grad = $_POST['izmenaGrad'];
    $posBr = $_POST['izmenaPosBr'];
    $ulica = $_POST['izmenaUlica'];
    $lozinka = $_POST['izmenaPass'];
    $pol = $_POST['izmenaPol'];   

    
    $reImePrezime = "/^[A-ZŠĐČĆŽ][a-zšđčćž]{2,14}(\s[A-Z][a-zzšđčćž]{2,14})*$/";
    $reTelefon = "/^06[01234569]\/[\d]{3}\-[\d]{3,4}$/";
    $rePostanskiBroj = "/^[0-9]{5}$/";
    $reUlica = "/^([\d\.]{1,3}(\s)?|[a-zšđčćžA-ZŠĐČĆŽ\.]{2,14}(\s)?)+(\s[\d\.]{1,3}|[a-zšđčćžA-ZŠĐČĆŽ\.]{2,14})*$/";
    $reLozinka = "/^[A-z0-9\_\.\-]{6,}$/";


    $postanskiBrojInteger = intval($posBr);

    $br=0;
        if(!preg_match($reImePrezime, $ime)){
            $br++;
        }

        if(!preg_match($reImePrezime, $prezime)){
            $br++;
        }

        if(!preg_match($reTelefon, $telefon)){
            $br++;
        }
        if(!preg_match($rePostanskiBroj, $posBr) || ($postanskiBrojInteger<11000 || $postanskiBrojInteger>38000)){
            $br++;
        }
        if(!preg_match($reImePrezime, $grad)){
            $br++;
        }
        if(!preg_match($reUlica, $ulica)){
            $br++;
        }
        if($lozinka!=""){
            if(!preg_match($reLozinka, $lozinka)){
                $br++;
            }
        }
        if(!$pol){
            $br++;
        }

        $poruka="";
        if($br==0){
           if($lozinka!=""){
            $upit = "UPDATE korisnici SET ime=:ime, prezime=:prezime, telefon=:telefon,postanski_broj=:postanski_broj, drzava=:drzava, grad=:grad, ulica=:ulica, lozinka=:lozinka, pol=:pol WHERE id_korisnik=:id";

            $lozinka = md5($lozinka);
            $priprema = $conn->prepare($upit);
            $priprema->bindParam(":ime", $ime);
            $priprema->bindParam(":prezime", $prezime);
            $priprema->bindParam(":telefon", $telefon);
            $priprema->bindParam(":postanski_broj", $postanskiBrojInteger);
            $priprema->bindParam(":drzava", $drzava);
            $priprema->bindParam(":grad", $grad);
            $priprema->bindParam(":ulica", $ulica);
            $priprema->bindParam(":lozinka", $lozinka);
            $priprema->bindParam(":pol", $pol);
            $priprema->bindParam(":id", $id);
            $priprema->execute();

            $poruka="Podaci o korisniku su izmenjeni.";
           }
           else{
            $upit = "UPDATE korisnici SET ime=:ime, prezime=:prezime, telefon=:telefon, postanski_broj=:postanski_broj, drzava=:drzava, grad=:grad, ulica=:ulica, pol=:pol WHERE id_korisnik=:id";

            $priprema = $conn->prepare($upit);
            $priprema->bindParam(":ime", $ime);
            $priprema->bindParam(":prezime", $prezime);
            $priprema->bindParam(":telefon", $telefon);
            $priprema->bindParam(":postanski_broj", $postanskiBrojInteger);
            $priprema->bindParam(":drzava", $drzava);
            $priprema->bindParam(":grad", $grad);
            $priprema->bindParam(":ulica", $ulica);
            $priprema->bindParam(":pol", $pol);
            $priprema->bindParam(":id", $id);
            $priprema->execute(); 

            $poruka="Podaci o korisniku su izmenjeni.";
           }
        }
        else{
            $poruka="Proverite format podataka.";
        }
        header("Location:../izmeni.php?id=$id&poruka=$poruka");
   }
   else{
       header("Location:../admin.php");
   }
?>