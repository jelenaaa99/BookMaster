<?php
    session_start();
    header("Content-Type:application/json");
    include "../config/connection.php";

    $id=$_GET['id'];
    $odgovor="";
    $statusniKod="";

    $st = implode(", ", $id);
    $upit="SELECT * FROM autori a JOIN knjige k ON a.id_autor=k.autorId_knjige JOIN zanr z ON k.zanrId_knjige=z.id_zanr WHERE id_knjige IN($st)";

    $rezultat = $conn->query($upit)->fetchAll();

    if($rezultat){
        $odgovor=$rezultat;
        $statusniKod=200;
    }
    else{
        $odgovor="Nema proizvoda u korpi";
        $statusniKod=404;
    }

    echo json_encode($odgovor);
    http_response_code($statusniKod);
?>