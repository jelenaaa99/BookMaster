<?php
    header("Content-type: application/json");
    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        include "../config/connection.php";
        include "funkcije.php";

        try{
            $tabelaNaziv = $_GET['tabela'];
            //$tabela = vratiSve($tabelaNaziv);

            if($tabelaNaziv=="meni" || $tabelaNaziv=="zanr"){
                $tabela = vratiSve($tabelaNaziv);
            }
            else if($tabelaNaziv=="knjige" || $tabelaNaziv=="0"){
                $tabela = spojiSve();
            }
            else if($tabelaNaziv="najcesca_pitanja_i_odgovori"){
                $tabela = vratiSve($tabelaNaziv);
            }

            echo json_encode($tabela);
            http_response_code(200);
        }
        catch(PDOException $exception){
            http_response_code(500);
        }
    }
    else{
        http_response_code(404);
    }
?>