<?php
    function vratiSve($nazivTabele){
        global $conn;

        $upit = "SELECT * FROM $nazivTabele";
        $podaci = $conn->query($upit)->fetchAll();
        return $podaci;
    }

    function spojiSve(){
        global $conn;

        $upit = "SELECT * FROM autori a JOIN knjige k ON a.id_autor=k.autorId_knjige JOIN zanr z ON k.zanrId_knjige=z.id_zanr";
        $podaci = $conn->query($upit)->fetchAll();
        return $podaci;
    }

    function filtrirajPoKategorijiSort($zanr, $sort, $pretraga){
        global $conn;

        $filter = "";
        if($zanr && $pretraga!=""){
            $filter = "WHERE (zanrId_knjige IN($zanr)) AND (naziv_knjige LIKE '%$pretraga%' OR ime_autor LIKE '%$pretraga%')";
        }
        else if($zanr && $pretraga==""){
            $filter = "WHERE zanrId_knjige IN($zanr)";
        }
        else if(!$zanr && $pretraga!=""){
            $filter = "WHERE naziv_knjige LIKE '%$pretraga%' OR ime_autor LIKE '%$pretraga%'";
        }


        $orderBy = "";
        if($sort != "0"){
            $orderBy = "ORDER BY cena_knjige $sort";
        }

        $upit = "SELECT* FROM autori a JOIN knjige k ON a.id_autor=k.autorId_knjige JOIN zanr z ON k.zanrId_knjige=z.id_zanr $filter $orderBy";

        $podaci = $conn->query($upit)->fetchAll();
        return $podaci;
    }

    function porukeKorisnika($ime, $prezime, $email, $telefon, $postanskiBroj, $poruka){
        global $conn;

        $upit = "INSERT INTO porukekorisnika(ime, prezime, email, telefon, postanski_broj, poruka) VALUES(:ime, :prezime, :email, :tel, :posBr, :por)";

        $podaci = $conn->prepare($upit);
        $podaci -> bindParam(":ime", $ime);
        $podaci -> bindParam(":prezime", $prezime);
        $podaci -> bindParam(":email", $email);
        $podaci -> bindParam(":tel", $telefon);
        $podaci -> bindParam(":posBr", $postanskiBroj);
        $podaci -> bindParam(":por", $poruka);

        return $podaci->execute();
    }

    function registracija($ime, $prezime, $telefon, $email, $posBr, $grad, $ulica, $lozinka, $pol){
        global $conn;

        $upit = "INSERT INTO korisnici(ime, prezime, telefon, email, postanski_broj, grad, ulica, lozinka, pol, aktivan, id_uloge) VALUES(:ime, :prezime, :telefon, :email, :postanski_broj, :grad, :ulica, :lozinka, :pol, 1, 1)";

        $priprema = $conn->prepare($upit);
        $priprema->bindParam(":ime", $ime);
        $priprema->bindParam(":prezime", $prezime);
        $priprema->bindParam(":telefon", $telefon);
        $priprema->bindParam(":email", $email);
        $priprema->bindParam(":postanski_broj", $posBr);
        $priprema->bindParam(":grad", $grad);
        $priprema->bindParam(":ulica", $ulica);
        $priprema->bindParam(":lozinka", $lozinka);
        $priprema->bindParam(":pol", $pol);

        $rezultat = $priprema->execute();
        return $rezultat;
    }

    function logovanje($email, $lozinka){
        global $conn;

        $upit = "SELECT* FROM korisnici k JOIN uloge u ON k.id_uloge=u.id_uloge WHERE email=:email AND lozinka=:lozinka AND aktivan=1";

        $priprema = $conn->prepare($upit);
        $priprema->bindParam(":email", $email);
        $priprema->bindParam(":lozinka", $lozinka);
        $priprema->execute();

        $rezultat=$priprema->fetch();
        return $rezultat;
    } 
?>