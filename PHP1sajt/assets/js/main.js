var reimePrezime = /^[A-ZŠĐČĆŽ][a-zšđčćž]{2,14}(\s[A-ZŠĐČĆŽ][a-zšđčćž]{2,14})+$/;
var reEmail = /^[a-z][a-z\d\_\.\-]+\@[a-z]+(\.[a-z]{2,4})+$/;
var reTelefon = /^06[01234569]\/[\d]{3}\-[\d]{3,4}$/;
var rePostanskiBroj = /^[0-9]{5}$/;
var reLozinka = /^[A-z0-9\_\.\-]{6,}$/;

window.onload = () => {
    $("#hamLista").hide();
    document.getElementById("ham").addEventListener("click", function(){
        var listaClass = document.getElementById("ham").classList;

        for(let i=0; i<listaClass.length; i++){
            if(listaClass[i]=="fa-bars"){
                document.getElementById("ham").classList.remove("fa-bars");
                document.getElementById("ham").classList.add("fa-times");
                break;
            }
            else if(listaClass[i]=="fa-times"){
                document.getElementById("ham").classList.remove("fa-times");
                document.getElementById("ham").classList.add("fa-bars");
                break;
            }
        }

        $("#hamLista").slideToggle();
    })


    if(document.getElementById("index") || document.getElementById("kontakt") || document.getElementById("registracija") || document.getElementById("logovanje") || document.getElementById("korpa")  || document.getElementById("admin") || document.getElementById("izmeni") || document.getElementById("poruke") || document.getElementById("narudzbine") || document.getElementById("pomoc") || document.getElementById("autor")){
        ajaxCallBack("models/dohvatanjeTabela.php", ispisMeni, "meni");
        stampajBrojProizvodaKorpe();
    }

    if(document.getElementById("index")){
        ajaxCallBack("models/dohvatanjeTabela.php", ispisKnjiga, "knjige");
        $("#zanrovi, #ddlSort, #pretrazi").on("change keyup", function(){
            filtrirajKnjige("models/filtriranjeZanra.php", ispisKnjiga);
        })
    }

    if(document.getElementById("kontakt")){
        $("#btnPosalji").click(function(e){
            provera(e);
        })
    }

    if(document.getElementById("registracija")){
        $("#btnReg").click(function(e){
            registracija(e);
        })
    }

    if(document.getElementById("logovanje")){
        $("#btnPrijava").click(function(e){
           logovanje(e);
        })
    }

    if(document.getElementById("registracija") || document.getElementById("logovanje") || document.getElementById("izmeni")){
        $("#btnReg").click(function(e){
            registracija(e);
        })

        $(".prikaziPass").click(function(){
            let obj = $("#regPass");
            let obj2 = $("#logPass");
            let obj3 = $("#izmeniPass");

            if(obj.attr("type")=="password")
                obj.attr("type", "text");
            else
                obj.attr("type", "password");

            if(obj2.attr("type")=="password")
                obj2.attr("type", "text");
            else
                obj2.attr("type", "password");

            if(obj3.attr("type")=="password")
                obj3.attr("type", "text");
            else
                obj3.attr("type", "password");
        })
    }

    if(document.getElementById("korpa")){

        let proizvodi = getItemLS("cart");

        if(!proizvodi || proizvodi.length==0){
            $("#korpa h4").html("Vaša korpa je prazna.");
            $("#btnDovrsi").hide();
            $("#upozorenje").hide();
        }
        else{
            $("#korpa h4").html("Vaša korpa");
            $("#btnDovrsi").show();
            $("#upozorenje").show();
            $("#zavrsi").click(zavrsiKupovinu);
        }
        $(document).on("click", ".obrisiIkonica", obrisiPojedinacanProizvodIzKorpe)
        idProizvoda = izvuciId();  

                $.ajax({
                    url:"models/proizvodi-u-korpi.php",
                    method:"get",
                    dataType:"json",
                    data:{
                        id:idProizvoda,
                    },
                    success:function(data){
                        //console.log(data);
                        ispisKorpe(data);
                    },
                    error:function(xhr){
                        console.log(xhr);
                    }
                })
    }

    if(document.getElementById("pomoc")){
        ajaxCallBack("models/dohvatanjeTabela.php", pitanjaOdgovori, "najcesca_pitanja_i_odgovori");
    }
}

function ajaxCallBack(url, callBack, imeTabele){
    $.ajax({
        url: url,
        method: "get",
        data: {
            tabela:imeTabele
        },
        dataType: "json",
        success: function(response){
           // console.log(response)
            callBack(response);
        },
        error: function(err){
            console.log(err);
        }
    });
}

function ispisMeni(data){
    var ispis="";

    for(let obj of data){
        if(obj.href_meni=="oNama" || obj.href_meni=="knjige")
            ispis+=`<li><a href="index.php#${obj.href_meni}">${obj.naziv_meni}</li></a>`;
        else
            ispis+=`<li><a href="${obj.href_meni}">${obj.naziv_meni}</li></a>`;
    }

    $("#mainMenu").html(ispis);
    $("#hamLista").html(ispis);
    $("#infoFooter").html(ispis);
}

function ispisKnjiga(data){
    var ispis="";

    if(data.length!=0){
        $("#nemaProizvoda").hide();
        for(let obj of data){
            ispis+=`<div class="col-6 col-sm-4 col-md-3 text-center d-flex flex-column justify-content-between py-2">
                        <div class="prviPrikaz d-flex flex-column justify-content-end">
                            <div id="slikaKnjige">
                                <img src="assets/img/${obj.src_knjige}" alt="${obj.naziv_knjige}" class="w-100"/>
                            </div>
                            <p class="p-1 m-0">${obj.ime_autor}</p>
                            <small class="fw-bold p-2">${obj.cena_knjige} RSD</small>
                        </div>
                        <div class="modalKnjige">
                            <button type="button" class="btn detaljnijeDugme" data-bs-toggle="modal" data-bs-target="#exampleModal${obj.id_knjige}">
                            Detaljnije
                            </button>
    
                            <div class="modal fade" id="exampleModal${obj.id_knjige}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title fw-bold" id="exampleModalLabel">
                                        ${obj.naziv_knjige}
                                        <span class="mx-5 text-danger obavestenje">Dodato u korpu!</span>
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="prviDeoKontejner row">
                                        <div class="col-12 col-sm-6">
                                            <div class="slikaModal">
                                                <img src="assets/img/${obj.src_knjige}" alt="${obj.naziv_knjige}"/>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 mt-4 mt-sm-0 text-muted text-start kjigaInfo">
                                            <p class="fw-bold">${obj.naziv_zanr.toUpperCase()}</p>
                                            <small>Šifra artikla: ${obj.sifra_knjige}</small><br/>
                                            <small>Isbn: ${obj.isbn_knjige}</small>
                                            <p class="m-0 mt-2">Autor: ${obj.ime_autor}</p>
                                            <p class="m-0 mt-2 cena">Cena na sajtu: <span class="fw-bold">${obj.cena_knjige} RSD</span></p>
                                            <button type="button" class="btn btn-danger mt-5 dodaj" data-id="${obj.id_knjige}">Dodajte u korpu</button>
                                        </div>
                                    </div>
                                    <div class="row opis">
                                        <div class="col-12 mt-4">
                                            <p class="text-muted text-justify">${obj.opis_knjige}</p>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>`;
        }
    }
    else{
        $("#nemaProizvoda").show();
    }

    $("#ispisKnjiga").html(ispis);

    $(".dodaj").click(dodajUKorpu);
    $(".obavestenje").hide();
}

function filtrirajKnjige(url, callBack){
    let cekirane = document.getElementsByClassName("zanr");
    let izabrano = [];

    for(let i of cekirane){
        if(i.checked){
            izabrano.push(i.value);
        }
    }

    let vrednost = $("#ddlSort").val();
    let pretrazi = $("#pretrazi").val().toLowerCase();

    dataObjekat = {
        sort: vrednost,
        pretraga:pretrazi
    };
    if(izabrano.length){
        dataObjekat.izbor = izabrano;
    }

    $.ajax({
        url: url,
        method: "get",
        data: dataObjekat,
        dataType: "json",
        success: function(response){
            callBack(response);
        },
        error: function(err){
            console.log(err);
        }
    });
}

function provera(e){
    e.preventDefault();

    var imePrezime, email, telefon, postanskiBroj, poruka;

    imePrezime = document.getElementById("imePrezime").value.trim();
    telefon = document.getElementById("tel").value.trim();
    email = document.getElementById("email").value.trim();
    postanskiBroj = document.getElementById("postanskiBroj").value.trim();
    poruka = document.getElementById("tekstPoruke").value.trim();

    var imeGreska, emailGreska, telefonGreska, postanskiBrojGreska, porukaGreska;

    imeGreska = document.getElementById("imeGreska");
    emailGreska = document.getElementById("emailGreska");
    telefonGreska = document.getElementById("telGreska");
    postanskiBrojGreska = document.getElementById("postanskiBrojGreska");
    porukaGreska = document.getElementById("tekstPorukeGreska");

    var br=0;
    if(imePrezime==""){
        br++;
        imeGreska.innerHTML="Obavezno polje.";
        imeGreska.classList.add("text-danger");
    }
    else{
        if(!reimePrezime.test(imePrezime)){
            br++;
            imeGreska.innerHTML="Prvo slovo imena mora biti veliko. Moraju biti upisani i ime i prezime.";
            imeGreska.classList.add("text-danger");
        }
        else{
            imeGreska.innerHTML="";
        }
    }

    if(telefon==""){
        br++;
        telefonGreska.innerHTML="Obavezno polje.";
        telefonGreska.classList.add("text-danger");
    }
    else{
        if(!reTelefon.test(telefon)){
            br++;
            telefonGreska.innerHTML="Format telefona: 06x/xxx-xxx[x]";
            telefonGreska.classList.add("text-danger");
        }
        else{
            telefonGreska.innerHTML="";
        }
    }

    if(email==""){
        br++;
        emailGreska.innerHTML="Obavezno polje.";
        emailGreska.classList.add("text-danger");
    }
    else{
        if(!reEmail.test(email)){
            br++;
            emailGreska.innerHTML="Email mora imati karakter @.";
            emailGreska.classList.add("text-danger");
        }
        else{
            emailGreska.innerHTML="";
        }
    }

    if(postanskiBroj==""){
        br++;
        postanskiBrojGreska.innerHTML="Obavezno polje.";
        postanskiBrojGreska.classList.add("text-danger");
    }
    else{
        if((!rePostanskiBroj.test(postanskiBroj)) || (Number(postanskiBroj)<11000 || Number(postanskiBroj>38000))){
            br++;
            postanskiBrojGreska.innerHTML="Poštanski broj je u opsegu 11000-38000.";
            postanskiBrojGreska.classList.add("text-danger");
        }
        else{
            postanskiBrojGreska.innerHTML="";
        }
    }

    if(poruka.length<3){
        porukaGreska.innerHTML = "Poruka se sastoji od minimum 3 karaktera.";
        porukaGreska.classList.add("text-danger");
    }
    else{
        porukaGreska.innerHTML = "";
    }

    let nizImePrezime=imePrezime.split(" ");
    let samoIme=nizImePrezime[0];
    let samoPrezime=nizImePrezime[1];
    if(br==0){
        $.ajax({
            url:"models/obrada-forme.php",
            method:"post",
            data:{
                ime:samoIme,
                prezime:samoPrezime,
                tel:telefon,
                email:email,
                posBr:postanskiBroj,
                por:poruka,
                btn:true
            },
            dataType:"json",
            success: function(result){
                $("#odgovorServera").html(`<p class="alert alert-success">${result.poruka}</p>`);
            },
            error:function(xhr){
                console.error(xhr);
                if(xhr.status==422){
                    $("#odgovorServera").html(`<p class="alert alert-warning">Doslo je do greske prilikom obrade podataka.</p>`);
                }
            }
        })
        document.querySelector("#kontakt > form").reset();
    }
}

function registracija(e){
    e.preventDefault();
    
    var ime, prezime, email, telefon, postanskiBroj, grad, ulica, lozinka, pol;
    let reimePrezime = /^[A-ZŠĐČĆŽ][a-zšđčćž]{2,14}(\s[A-ZŠĐČĆŽ][a-zšđčćž]{2,14})*$/;
    let reUlica = /^([\d\.]{1,3}(\s)?|[a-zšđčćžA-ZŠĐČĆŽ\.]{2,14}(\s)?)+(\s[\d\.]{1,3}|[a-zšđčćžA-ZŠĐČĆŽ\.]{2,14})*$/;

    ime = document.getElementById("regIme").value.trim();
    prezime = document.getElementById("regPrezime").value.trim();
    telefon = document.getElementById("regTel").value.trim();
    email = document.getElementById("regEmail").value.trim();
    postanskiBroj = document.getElementById("regPosBr").value.trim();
    grad = document.getElementById("regGrad").value.trim();
    ulica = document.getElementById("regUlica").value.trim();
    lozinka = document.getElementById("regPass").value.trim();
    pol = $("input[name=rbPol]:checked").val();

    var imeGreska, prezimeGreska, emailGreska, telefonGreska, postanskiBrojGreska, gradGreska, ulicaGreska, lozinkaGreska, polGreska;

    imeGreska = document.getElementById("imeR");
    prezimeGreska = document.getElementById("prezimeR");
    emailGreska = document.getElementById("emailR");
    telefonGreska = document.getElementById("telR");
    postanskiBrojGreska = document.getElementById("posBrojR");
    gradGreska = document.getElementById("gradR");
    ulicaGreska = document.getElementById("ulicaR");
    lozinkaGreska = document.getElementById("passR");
    polGreska = document.getElementById("polR");

    var br=0;
    if(ime==""){
        br++;
        imeGreska.innerHTML="Obavezno polje.";
        imeGreska.classList.add("text-danger");
    }
    else{
        if(!reimePrezime.test(ime)){
            br++;
            imeGreska.innerHTML="Prvo slovo imena mora biti veliko.";
            imeGreska.classList.add("text-danger");
        }
        else{
            imeGreska.innerHTML="";
        }
    }

    if(prezime==""){
        br++;
        prezimeGreska.innerHTML="Obavezno polje.";
        prezimeGreska.classList.add("text-danger");
    }
    else{
        if(!reimePrezime.test(prezime)){
            br++;
            prezimeGreska.innerHTML="Prvo slovo prezimena mora biti veliko.";
            prezimeGreska.classList.add("text-danger");
        }
        else{
            prezimeGreska.innerHTML="";
        }
    }

    if(telefon==""){
        br++;
        telefonGreska.innerHTML="Obavezno polje.";
        telefonGreska.classList.add("text-danger");
    }
    else{
        if(!reTelefon.test(telefon)){
            br++;
            telefonGreska.innerHTML="Format telefona: 06x/xxx-xxx[x]";
            telefonGreska.classList.add("text-danger");
        }
        else{
            telefonGreska.innerHTML="";
        }
    }

    if(email==""){
        br++;
        emailGreska.innerHTML="Obavezno polje.";
        emailGreska.classList.add("text-danger");
    }
    else{
        if(!reEmail.test(email)){
            br++;
            emailGreska.innerHTML="Email mora imati karakter @.";
            emailGreska.classList.add("text-danger");
        }
        else{
            emailGreska.innerHTML="";
        }
    }

    if(grad==""){
        br++;
        gradGreska.innerHTML="Obavezno polje.";
        gradGreska.classList.add("text-danger");
    }
    else{
        if(!reimePrezime.test(grad)){
            br++;
            gradGreska.innerHTML="Grad počinje velikim slovom.";
            gradGreska.classList.add("text-danger");
        }
        else{
            gradGreska.innerHTML="";
        }
    }

    if(ulica==""){
        br++;
        ulicaGreska.innerHTML="Obavezno polje.";
        ulicaGreska.classList.add("text-danger");
    }
    else{
        if(!reUlica.test(ulica)){
            br++;
            ulicaGreska.innerHTML="Ulica može da počne brojem ili slovima.";
            ulicaGreska.classList.add("text-danger");
        }
        else{
            ulicaGreska.innerHTML="";
        }
    }

    if(postanskiBroj==""){
        br++;
        postanskiBrojGreska.innerHTML="Obavezno polje.";
        postanskiBrojGreska.classList.add("text-danger");
    }
    else{
        if((!rePostanskiBroj.test(postanskiBroj)) || (Number(postanskiBroj)<11000 || Number(postanskiBroj>38000))){
            br++;
            postanskiBrojGreska.innerHTML="Poštanski broj je u opsegu 11000-38000.";
            postanskiBrojGreska.classList.add("text-danger");
        }
        else{
            postanskiBrojGreska.innerHTML="";
        }
    }

    if(lozinka==""){
        br++;
        lozinkaGreska.innerHTML="Obavezno polje.";
        lozinkaGreska.classList.add("text-danger");
    }
    else{
        if((!reLozinka.test(lozinka))){
            br++;
            lozinkaGreska.innerHTML="Lozinka se sastoji od slova i brojeva.";
            lozinkaGreska.classList.add("text-danger");
        }
        else{
            lozinkaGreska.innerHTML="";
        }
    }


    if(pol){
        polGreska.innerHTML="";
    }
    else{
        polGreska.innerHTML="Morate izabrati pol";
        polGreska.classList.add("text-danger");
    }

    if(br==0){
        $.ajax({
            url:"models/registracija.php",
            method:"post",
            data:{
                ime:ime,
                prezime:prezime,
                email:email,
                telefon:telefon,
                grad:grad,
                ulica:ulica,
                posBr:postanskiBroj,
                lozinka:lozinka,
                pol:pol,
                btn:true
            },
            dataType:"json",
            success: function(result){
                console.log(result)
                $("#odgovorServera").html(`<p class="alert alert-success">${result.poruka}</p>`);
            },
            error:function(xhr){
                console.error(xhr);
                if(xhr.status==422){
                    $("#odgovorServera").html(`<p class="alert alert-warning">Doslo je do greske prilikom obrade podataka</p>`);
                }
            }
        })
        
        document.querySelector("#registracija > form").reset();
    }
}

function logovanje(e){
    e.preventDefault();
    
    let email = $("#logEmail").val();
    let lozinka = $("#logPass").val();

    let emailGreska = document.getElementById("emailL");
    let lozinkaGreska = document.getElementById("passL");

    let br=0;

    if(email==""){
        br++;
        emailGreska.innerHTML="Obavezno polje.";
        emailGreska.classList.add("text-danger");
    }
    else{
        if(!reEmail.test(email)){
            br++;
            emailGreska.innerHTML="Email mora imati karakter @.";
            emailGreska.classList.add("text-danger");
        }
        else{
            emailGreska.innerHTML="";
        }
    }

    if(lozinka==""){
        br++;
        lozinkaGreska.innerHTML="Obavezno polje.";
        lozinkaGreska.classList.add("text-danger");
    }
    else{
        if((!reLozinka.test(lozinka))){
            br++;
            lozinkaGreska.innerHTML="Lozinka se sastoji od slova i brojeva.";
            lozinkaGreska.classList.add("text-danger");
        }
        else{
            lozinkaGreska.innerHTML="";
        }
    }

    if(br==0){
        $.ajax({
            url:"models/logovanje.php",
            method:"post",
            data:{
                email:email,
                lozinka:lozinka,
                btn:true
            },
            dataType:"json",
            success: function(result){
                console.log(result)
                //$("#odgovorServera2").html(`<p class="alert alert-success">Uspesno logovanje</p>`);
                window.location.reload();
            },
            error:function(xhr){
                console.error(xhr);
                if(xhr.status==422){
                    $("#odgovorServera2").html(`<p class="alert alert-warning">Doslo je do greske prilikom obrade podataka.</p>`);
                }
                if(xhr.status==401){
                    $("#odgovorServera2").html(`<p class="alert alert-warning">Proverite ispravnost email-a i lozinke.</p>`);
                }
                if(xhr.status==403){
                    $("#odgovorServera2").html(`<p class="alert alert-warning">Morate se odjaviti da biste se prijavili sa drugim nalogom.</p>`);
                }
            }
        })
    }
}

function setItemLS(name, data) {
    return localStorage.setItem(name, JSON.stringify(data));
}

function getItemLS(name){
    return JSON.parse(localStorage.getItem(name));
}

function dodajUKorpu(){
    let id = $(this).data("id");
    let proizvodi = getItemLS("cart");

    $(".obavestenje").fadeIn(700, function(){
        $(this).fadeOut(2000);
    });

    if(proizvodi){
        if(istiProizvod(id)){
            povecajKolicinu(id);
            stampajBrojProizvodaKorpe();
        }
        else{
            dodajDrugiProizvod(id);
            stampajBrojProizvodaKorpe();
        }
    }
    else{
        dodajPrviProizvod(id);
        stampajBrojProizvodaKorpe();
    }
}

function dodajPrviProizvod(id){
    let proizvodi = [];

    proizvodi[0] = {
        id:id,
        quantity:1
    };
    setItemLS("cart", proizvodi);
}

function dodajDrugiProizvod(id){
    let proizvodi = getItemLS("cart");

    proizvodi.push({
        id:id,
        quantity:1
    });
    setItemLS("cart", proizvodi);
}

function istiProizvod(id){
    let proizvodi = getItemLS("cart");
    return proizvodi.filter(p => p.id==id).length;
}

function povecajKolicinu(id){
    let proizvodi = getItemLS("cart");

    for(let i of proizvodi){
        if(i.id==id){
            i.quantity++;
        }
    }
    setItemLS("cart", proizvodi);
}

function stampajBrojProizvodaKorpe(){
    let proizvodi = getItemLS("cart");

    let br=0;
    if(proizvodi!=null){
        for(let i of proizvodi){
            br+=i.quantity;
        }
    }
    else{
        br=0;
    }

    $(".korpa div").html(br);
}

function ispisKorpe(data){
    let ukupno=0;
    let ispis=`<table class="table table-hover">
                    <thead>
                    <th></th>
                    <th>Proizvod</th>
                    <th>Cena</th>
                    <th>Količina</th>
                    <th>Ukupno</th>
                </thead>`;

    let korpa=getItemLS("cart");
    for(let obj of data){
        for(let i of korpa){
            if(obj.id_knjige==i.id){
                ispis+=`<tbody>
                    <tr>
                        <td>
                            <img src="assets/img/${obj.src_knjige}" alt="${obj.naziv_knjige}" class="img-fluid slikaUKorpi d-none d-sm-block"/>
                        </td>
                        <td>
                            <p class="text-muted fw-bold">${obj.naziv_zanr}</p>
                            <p class="fw-bold">${obj.naziv_knjige}</p>
                            <p class="text-muted">Šifra artikla: ${obj.sifra_knjige}</p>
                        </td>
                        <td class="text-muted">${obj.cena_knjige} RSD</td>
                        <td class="text-muted">${i.quantity}</td>
                        <td class="text-muted">
                            <p>${i.quantity*Number(obj.cena_knjige)} RSD</p>
                            <p><a href="#" class="obrisiIkonica" data-idproizvoda="${i.id}"><i class="fa fa-trash-o" aria-hidden="true"></i></a></p>
                        </td>
                    </tr>`;
                    ukupno+=i.quantity*Number(obj.cena_knjige);
            }
        }
    }

    ispis+=`</tbody></table><p class="fw-bold text-end">Ukupno: ${ukupno} RSD</p>`;
    $("#ispisProizvodaUKorpi").html(ispis);
    $("#ukupanIznosModal").val(ukupno+" RSD");
    // $(document).on("click", ".obrisiIkonica", obrisiPojedinacanProizvodIzKorpe)
}

function obrisiPojedinacanProizvodIzKorpe(){
    let id = $(this).data("idproizvoda");
    let proizvodi = getItemLS("cart");
    let filtrirano = proizvodi.filter(p => p.id!=id);
    setItemLS("cart", filtrirano);
    window.location.reload();
}

function izvuciId(){
    let proizvodi = getItemLS("cart");
    let idProizvoda=[];

    if(proizvodi){
        for(let i of proizvodi){
            idProizvoda.push(i.id);
        }
    }
    return idProizvoda;
}

function zavrsiKupovinu(){
    let adresa = $("#regUlica").val();
    let postBr = $("#regPosBr").val();
    let grad = $("#regGrad").val();
    
    $.ajax({
        url: "models/zavrsi-kupovinu.php",
        method: "post",
        data: {
            korpa: localStorage.getItem("cart"),
            grad: grad,
            pb: postBr,
            adresa: adresa
        },
        dataType: "json",
        success: function(response){
            console.log(response);
            if(response.success){
                localStorage.removeItem("cart");
                $("#korpa h4").html("Vaša korpa je prazna.");
                $("#btnDovrsi, #ispisProizvodaUKorpi, #upozorenje, .modal-footer").hide();
                $(".modal-body").html(`<p class="text-success fw-bold fs-4"><i class="fa fa-check-circle-o mx-1" aria-hidden="true"></i>${response.response}</p>`);
                $(".brProizvoda").html("0");
                setTimeout(function(){
                    location.reload();
                }, 2000);
            }
        },
        error: function(err){
            console.log(err);
        }
    });
    
}

function pitanjaOdgovori(data){
    let ispis="";

    for(let i of data){
        ispis+=`<div class="fs-5 red" data-id="${i.id_pitanja}">
                    <div class="d-flex justify-content-between">
                        <p>${i.pitanje}</p>
                        <div class="strelica"><i class="fa fa-chevron-up" aria-hidden="true"></i></div>
                    </div>
                    <div>
                        <p class="${i.id_pitanja} odgovor fs-6">${i.odgovor}</p>
                    </div>
                </div>`;
    }

    $(document).ready(function(){
        $(".odgovor").hide();
        $(".red").click(function(){
            let id = $(this).data("id");
            if($(`[data-id=${id}] .strelica i`).attr("class")=="fa fa-chevron-down"){
                $(`[data-id=${id}] .strelica i`).removeClass("fa fa-chevron-down");
                $(`[data-id=${id}] .strelica i`).addClass("fa fa-chevron-up");
            }
            else{
                $(`[data-id=${id}] .strelica i`).removeClass("fa fa-chevron-up");
                $(`[data-id=${id}] .strelica i`).addClass("fa fa-chevron-down");
            }
            $(`.${id}`).slideToggle();
        })
    })

    $("#pitanjaOdgovori").html(ispis);
}
