<?php
    if(isset($_GET["id"])){
        include "../config/connection.php";

        $id=$_GET["id"];

        $upit = "DELETE FROM porukekorisnika WHERE id_poruke=:id";
        $priprema=$conn->prepare($upit);
        $priprema->bindParam(":id", $id);
        $priprema->execute();
        header("Location:../poruke-korisnika.php");
    }
    else{
        header("Location:../poruke-korisnika.php");
    }
?>