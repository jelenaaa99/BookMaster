<?php
    session_start();
    header("Content-type: application/json");
    if(isset($_POST['btn'])){
        include "../config/connection.php";
        include "funkcije.php";

        $email = $_POST['email'];
        $lozinka = $_POST['lozinka'];

        $odgovor = null;
        $statusniKod = "";
        $reEmail = "/^[a-z][a-z\d\_\.\-]+\@[a-z]+(\.[a-z]{2,4})+$/";
        $reLozinka = "/^[A-z0-9\_\.\-]{6,}$/";

        $br=0;

        if(!preg_match($reEmail, $email)){
            $br++;
        }
        if(!preg_match($reLozinka, $lozinka)){
            $br++;
        }

        if($br==0){

            if(isset($_SESSION['korisnik'])){
                $statusniKod = 403;
            }
            else{

                $lozinka = md5($lozinka);
                $upit = logovanje($email, $lozinka);
                if($upit){
                    $_SESSION['korisnik'] = $upit;
                    $odgovor = $_SESSION['korisnik'];
                    $statusniKod = "200";
                }
                else{
                    $_SESSION['greske'] = "Pogresan email ili password";
                    $odgovor = "Proverite ispravnost email-a i lozinke";
                    $statusniKod = 401;
                }
            }
            echo json_encode($odgovor);
            http_response_code($statusniKod);
        }
    }
?>