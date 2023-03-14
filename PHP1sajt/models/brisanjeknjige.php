<?php
    if(isset($_GET['id'])){
        include "../config/connection.php";

        $id = $_GET['id'];

        $upit = "DELETE FROM knjige WHERE id_knjige=:id";
        $priprema = $conn->prepare($upit);
        $priprema->bindParam(":id", $id);
        $priprema->execute();

        header("Location:../admin.php");
    }
    else{
        header("Location:../admin.php");
    }
?>