<?php
    header("Content-type: application/json");

    if(isset($_POST['btn'])){
        include "../config/connection.php";
        include "funkcije.php";

        $ime = $_POST['ime'];
        $prezime = $_POST['prezime'];
        $telefon = $_POST['telefon'];
        $email = $_POST['email'];
        $postanskiBroj = $_POST['posBr'];
        $grad = $_POST['grad'];
        $ulica = $_POST['ulica'];
        $lozinka = $_POST['lozinka'];
        $pol = isset($_POST['pol']) ? $_POST['pol'] : null;
        $odgovor = "";
        $statusniKod = "";

        $reImePrezime = "/^[A-ZŠĐČĆŽ][a-zšđčćž]{2,14}(\s[A-ZŠĐČĆŽ][a-zšđčćž]{2,14})*$/";
        $reEmail = "/^[a-z][a-z\d\_\.\-]+\@[a-z]+(\.[a-z]{2,4})+$/";
        $reTelefon = "/^06[01234569]\/[\d]{3}\-[\d]{3,4}$/";
        $rePostanskiBroj = "/^[0-9]{5}$/";
        $reUlica = "/^([\d\.]{1,3}(\s)?|[a-zšđčćžA-ZŠĐČĆŽ\.]{2,14}(\s)?)+(\s[\d\.]{1,3}|[a-zšđčćžA-ZŠĐČĆŽ\.]{2,14})*$/";
        $reLozinka = "/^[A-z0-9\_\.\-]{6,}$/";


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
        if(!preg_match($reImePrezime, $grad)){
            $br++;
        }
        if(!preg_match($reUlica, $ulica)){
            $br++;
        }
        if(!preg_match($reLozinka, $lozinka)){
            $br++;
        }
        if(!$pol){
            $br++;
        }
        

        if($br!=0){
            $odgovor = ["poruka"=>"Proverite format unetih podataka."];
            $statusniKod = 422;
        }
        else{
            $lozinka = md5($lozinka);
            $upis = registracija($ime, $prezime, $telefon, $email, $postanskiBroj, $grad, $ulica, $lozinka, $pol);

            if($upis){
                $odgovor = ["poruka"=>"Uspešno ste se registrovali."];
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