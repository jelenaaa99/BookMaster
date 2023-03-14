<?php

    session_start();
    include "../config/connection.php";


    if(!isset($_SESSION['korisnik']) || !isset($_POST['korpa'])){

        echo json_encode(["response" => "Not found."]);
        http_response_code(404);

    }

    else {

        $korpa = json_decode($_POST['korpa']);

        $grad = $_POST['grad'];
        $adresa = $_POST['adresa'];
        $posBroj = $_POST['pb'];

        $idKor = $_SESSION['korisnik']->id_korisnik;

        $novaNarudzbina = $conn->prepare("INSERT INTO narudzbine(grad, postanski_broj, adresa, id_korisnika) VALUES(?, ?, ?, ?)");
        $rez = $novaNarudzbina->execute([$grad, $posBroj, $adresa, $idKor]);

        if(!$rez){
            echo json_encode(["response" => "DB error."]);
            http_response_code(500);
        }

        $idNar = $conn->lastInsertId();




        $values = [];
        foreach($korpa as $stavka){
            $values []= "($idNar, $stavka->id, $stavka->quantity)";
        }
        $values = implode(",", $values);



        $noveStavke =  $conn->prepare("INSERT INTO narudzbine_stavke(id_narudzbine, id_proizvoda, kolicina) VALUES$values");
        $rez = $noveStavke->execute();

        if(!$rez){
            echo json_encode(["response" => "DB error."]);
            http_response_code(500);
        }

        
        echo json_encode(["success" => true, "response" => "Uspesno ste narucili."]);
        http_response_code(200);
    }
?>