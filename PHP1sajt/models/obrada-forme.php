<?php
    header("Content-type: application/json");

    if(isset($_POST['btn'])){
        include "../config/connection.php";
        include "funkcije.php";

        $ime = $_POST['ime'];
        $prezime = $_POST['prezime'];
        $telefon = $_POST['tel'];
        $email = $_POST['email'];
        $postanskiBroj = $_POST['posBr'];
        $poruka = $_POST['por'];
        $odgovor = "";
        $statusniKod = "";

        $reImePrezime = "/^[A-ZŠĐČĆŽ][a-zšđčćž]{2,14}(\s[A-ZŠĐČĆŽ][a-zšđčćž]{2,14})*$/";
        $reEmail = "/^[a-z][a-z\d\_\.\-]+\@[a-z]+(\.[a-z]{2,4})+$/";
        $reTelefon = "/^06[01234569]\/[\d]{3}\-[\d]{3,4}$/";
        $rePostanskiBroj = "/^[0-9]{5}$/";


        $postanskiBrojInteger = intval($postanskiBroj);

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
        if(!preg_match($reEmail, $email)){
            $br++;
        }
        if(!preg_match($rePostanskiBroj, $postanskiBroj)){
            $br++;
        }
        if(strlen($poruka)<3){
            $br++;
        }

        if($br!=0){
            $odgovor = ["poruka"=>"Proverite format unetih podataka."];
            $statusniKod = 422;
        }
        else{
            $upis = porukeKorisnika($ime, $prezime, $email, $telefon, $postanskiBroj, $poruka);

            if($upis){
                $odgovor = ["poruka"=>"Poruka je uspešno poslata."];
                $statusniKod = 201;
            }
            else{
                $odgovor = ["poruka"=>"Doslo je do greske prilikom unosa podataka."];
                $statusniKod = 500;
            }
        }

        echo json_encode($odgovor);
        http_response_code($statusniKod);
    }
?>