<?php
    header("Content-type: application/json");
    if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['sort'])){
        include "../config/connection.php";
        include "funkcije.php";

        try{
            $zanr = isset($_GET['izbor']) ? $_GET['izbor'] : null;
            $sort = $_GET['sort'];
            $pretraga = $_GET['pretraga'];

            if($zanr){
                $zanr = implode(",", $zanr);
            }

            $tabela = filtrirajPoKategorijiSort($zanr, $sort, $pretraga);

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