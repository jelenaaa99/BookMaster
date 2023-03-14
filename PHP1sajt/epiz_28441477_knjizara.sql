-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2021 at 01:08 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_28441477_knjizara`
--

-- --------------------------------------------------------

--
-- Table structure for table `autori`
--

CREATE TABLE `autori` (
  `id_autor` int(50) NOT NULL,
  `ime_autor` varchar(50) COLLATE utf32_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `autori`
--

INSERT INTO `autori` (`id_autor`, `ime_autor`) VALUES
(1, 'Aleksandar Sergejevič Puškin'),
(2, 'Maksim Gorki'),
(3, 'Ivan Turgenjev'),
(4, 'Fjodor Mihajlovič Dostojevski'),
(5, 'Ivo Andrić'),
(6, 'Aleksandar  Đurišić'),
(7, 'Artur Bekhard'),
(8, 'Edi de Vind'),
(9, 'Andreas Guski'),
(10, 'Luka Mičeta'),
(11, 'Džordž R. R. Martin'),
(12, 'Suzan Kolins'),
(13, 'Stiven King'),
(14, 'Ejlan Mastaj'),
(15, 'Piter V. Bret'),
(16, 'Nikol Mones'),
(17, 'Eloiza Džejms'),
(18, 'Nora Roberts'),
(19, 'Ketrin Kukson'),
(20, 'Gijom Muso'),
(22, 'Stefani Robel'),
(23, 'Lusinda Rajli'),
(24, 'Nikolas Sparks');

-- --------------------------------------------------------

--
-- Table structure for table `knjige`
--

CREATE TABLE `knjige` (
  `id_knjige` int(50) NOT NULL,
  `naziv_knjige` varchar(50) COLLATE utf32_unicode_ci NOT NULL,
  `cena_knjige` decimal(10,2) NOT NULL,
  `sifra_knjige` varchar(20) COLLATE utf32_unicode_ci NOT NULL,
  `isbn_knjige` varchar(20) COLLATE utf32_unicode_ci NOT NULL,
  `opis_knjige` text COLLATE utf32_unicode_ci NOT NULL,
  `src_knjige` varchar(50) COLLATE utf32_unicode_ci NOT NULL,
  `zanrId_knjige` int(20) NOT NULL,
  `autorId_knjige` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `knjige`
--

INSERT INTO `knjige` (`id_knjige`, `naziv_knjige`, `cena_knjige`, `sifra_knjige`, `isbn_knjige`, `opis_knjige`, `src_knjige`, `zanrId_knjige`, `autorId_knjige`) VALUES
(1, 'Kapetanova Kći', '475.20', '320197', '9788676097463', 'Uzbudljiva ruska ljubavna priča, puna peripetija, opasnosti i neizvesnosti, zamišljena kao istorijski roman inspirisan kozačkom seljačkom bunom Jemeljana Pugačova u doba Katarine Velike. Nestašnog sedamnaestogodišnjeg momka, Petra Andreiča, otac šalje u vojsku, u Bjelogorsku tvrđavu. Tu upoznaje Mašu, kapetanovu ćerku, i između njih se javlja ljubav. Ljubomorni Švabin remeti njihovu idilu, a epilog te intrige je Puškinov čest motiv dvoboj. Uzbudljive slike borbe, neizvesna ljubavna priča i zanimljiv pripovedački izraz, nateraće vas da roman pročitate u jednom dahu.', 'kapetanovaKci.jpg', 1, 1),
(2, 'Mati', '891.00', '352718', '9788644707226', 'Epohalni roman Mati koji govori o buđenju svesti potlačenog i eksploatisanog siromašnog stanovništva carske Rusije o pravima na slobodan i dostojanstven život, danas posle jednog veka postaje više nego aktuelan.\r\nMaskim Gorki je u njemu opisao ilegalnu borbu fabričkih radnika, socijalističkih revolucionara, ali iz perspektive majke jednog od njih. Vođena najpre ljubavlju prema sinu, a potom shvatajući da nepravičan i težak život, kojim su živeli svi njeni preci i ona sama, nije neminovnost već da se tome može i mora usprotiviti, majka postaje ilegalac, revolucionar. Svojim hrabrim podvigom na kraju romana, ona se uzdiže kao tragični simbol ustalog ruskog naroda.', 'mati.jpg', 1, 2),
(3, 'Očevi i deca', '719.10', '351199', '9788652139705', 'Prvi roman Ivana Turgenjeva Ruđin (1856) kao i njegov najvažniji i najpoznatiji roman Očevi i deca (1862) uverljivo prikazuju tadašnje rusko seljaštvo i mladu inteligenciju koja želi da zemlju uvede u novo doba.\r\nGlavni junak istoimenog romana, Ruđin je elokventan mladić pun novih ideja koji po dolasku u rusku provinciju postaje predmet divljenja. Kada se sazna da nije u stanju da uskladi reči i dela, on će morati da ode. Iskljupljenje će pronaći na pariskim barikadama 1848, postavši tako prvi junak revolucionar u istoriji ruske proze.\r\nJevgenij Bazarov, protagonista romana Očevi i deca, darovit je, nestrpljiv i zajedljiv mladić koji ne priznaje autoritete. Prvi nihilista u svetskoj književnosti i najupečatljiviji lik velikog ruskog pisca, Bazarov će postati simbol mladalačkog radikalizma i promena koje će uslediti.\r\n', 'oceviIDeca.jpg', 1, 3),
(4, 'Braća Karamazovi', '899.10', '349869', '9788652138791', 'Roman Braća Karamazovi Fjodora Dostojevskog po mišljenju mnogih kritičara i proučavalaca njegovog dela smatra se krunom autorove spisateljske karijere. Priča o porodici Karamazov Dostojevskom je poslužila kao okosnica za izuzetan filozofski roman koji istražuje hrišćansku etiku, slobodnu volju, otuđenost, suparništvo i moral.\r\nVečita borba dobra i zla svevremeno je otelotvorena u likovima Fjodora Pavloviča i njegovih sinova Mitje, Ivana, Aljoše i vanbračnog sina Smerdjakova. Nakon više od jednog veka od objavljivanja ovog romana, autentičnost i psihološka rafiniranost njihovih karaktera ne prestaju da nas intrigiraju i fasciniraju.', 'bracaKaramazovi.jpg', 1, 4),
(5, 'Znakovi pored puta', '1169.10', '351874', '9788652139279', 'Svoje zapise, razmišljanja, ispise iz pročitanih knjiga, pripovedačke zamisli, beleške o ljudima i pojavama, jeziku i književnosti Andrić je počeo da piše još 20-ih godina XX veka, kada je još pisao ijekavicom, i skupljao ih u fasciklu pod simboličnim nazivom „Znakovi pored puta“.\r\nNeiscrpno vrelo mudrosti, „Znakovi pored puta“ već skoro pola veka omiljeno su štivo mnogih generacija, knjiga koja se sa podjednakim uživanjem može čitati gde god se otvori, riznica najraznolikijih saveta, zapažanja i životnih uvida koje je ovaj pisac upućivao ne samo čitaocima nego i samome sebi.', 'znakoviPoredPuta.jpg', 1, 5),
(6, 'Glogi', '765.00', '352560', '9788681510254', 'Kako je živeo, voleo i plakao Nebojša Glogovac?\r\nLobanja, Šone, Šonsi, Glogi, Nebojša, Pančevac – i još mnogo imena inadimaka imao je čovek koji je glumi, ali i svemu ostalom, dao i karakter i reč.\r\nBio je svoj i neosvojiv. Davao se kome je hteo, a zauzvrat nije tražio ništa.\r\nSvedočenja najbližih otkrivaju nepoznate detalje iz života ovog velikana: kako je kao momak radio u prodavnici muzičkih uređaja, šta mu se sve dešavalo dok je stopirao od Pančeva do Beograda, zašto mu se na prijemnom ispitu na Akademiji dramskih umetnosti tresla noga i kako su sve velike uloge i najveći reditelji posle toga tražili i jurili baš njega.\r\nNa ovoj vrtešci reči i emocija, suze smenjuju smeh, a smeh izaziva suze. Nemazaustavljanja, fliper se igra u četiri ruke.\r\nUmeo je i da živi, a i da umre.\r\nNjegov recept nalazi se među ovim stranicama.', 'glogi.jpg', 2, 6),
(7, 'Nikola Tesla', '1237.50', '349178', '9788681168097', 'Bekhardova romansirana biografija Nikole Tesle je lako razumljiva,jednostavnim jezikom ispričana životna drama ovog veliko pronalazača. Pitajući se kako je dečak iz provincije postao jedan od najvećih naučnih genija,autor se u njoj prvenstveno bavi Teslinom ličnošću,odnosno prelomnim životnim iskustvima koja su odredila njegovu psihologiju i karakter. Iz tog razloga najviše pažnje je posvetio detinjstvu budućeg genija,obeleženom toplim ali komplikovanim odnosom s roditeljima i tragedijom prerano preminukog starijeg brata.\r\nPrateći Teslin uspon tokom godina školovanja,inženjerske profesije u Busimpešti,Parizu i na kraju Americi,Bekhard piše i o njegovom inovatorskom radu,pre svega na polju naizmenične struje,i to na način koji je sasvim razumljiv i laicima.', 'nikolaTesla.jpg', 2, 7),
(8, 'Poslednja stanica Aušvic', '719.10', '349086', '9788652138777', 'Ispovest o životu i preživljavanju u logoru. Jedinstven i univerzalan zapis koji nam govori da i u paklu ima nade.\r\n\r\nGodine 1943, na početku nemačke okupacije, Edi de Vind radio je kao lekar u Vesterborku, holandskom tranzitnom logoru. Nacisti su mu tamo odveli majku, ali je Jevrejski savet uveravao Edija da će je osloboditi ako nastavi da radi za njih. Kasnije je saznao da su je već prebacili u Aušvic.\r\nNapisana u samom logoru u nedeljama nakon što ga je Crvena armija oslobodila, Poslednja stanica Aušvic predstavlja veran opis Edijevih dana provedenih u Aušvicu. Njegova snažna poetična proza pruža jedinstven uvid u užase s kojima se suočio u koncentracionom logoru. Obogaćeni fotografijama iz Edijevog života pre Holokausta, tokom i posle njega, ovi potresni memoari objedinjuju dirljivu ljubavnu priču, detaljan prikaz zverstava Aušvica i inteligentnu raspravu o snazi ljudskog duha.', 'poslednjaStanicaAusvic.jpg', 2, 8),
(9, 'Dostojevski: Biografija', '1169.10', '348256', '9788652137831', 'Prema rečima Tomasa Mana, Zločin i kazna je „najveći kriminalistički roman svih vremena“. Život samog autora, obeležen spoljnim i unutrašnjim dramama, bio je, međutim, gotovo jednako uzbudljiv kao i njegovi romani. Kad je s dvadeset sedam godina uhapšen iz političkih razloga, Dostojevski je u poslednjem trenutku izbegao izvršenje smrtne presude. Posle deset godina provedenih u Sibiru vraća se kao potpuno drugi čovek i stupa ponovo na književnu scenu. Kasnije će od poverilaca bežati u inostranstvo, a od materijalne oskudice u kockarsku strast. Obračuni sa svetom njegovog doba učinili su ga „prorokom XX veka“, kako ga naziva Alber Kami. U svojim delima osvetlio je najtajnije zakutke ljudske duše, koliko prefinjeno toliko i nemilosrdno.\r\nSlavista Andreas Guski prati političke preobražaje Dostojevskog od pobunjenika do reakcionara, njegove pokušaje da zaradi za život kao profesionalni književnik i njegovu borbu za čitaoce. O životu Dostojevskog Guski pripoveda tako da pred nama izranja opipljiv lik, čovek od krvi i mesa, a njegov grandiozni opus smešten je u kontekst vremena u kojem je živeo.', 'dostojevskiBiografija.jpg', 2, 9),
(10, 'Stefan Nemanja', '809.90', '259176', '9788652113453', '900 godina od rođenja.\r\nNastanak evropske Srbije.\r\nPovest Srba od doseljavanja na Balkan do države župana Stefana Nemanje.\r\nStefan Nemanja, u monaštvu Simeon, spada u one vladare koji su stekli poštovanje kako svojih podanika i savremenika, tako i svojih potomaka. Samo je uticaj njegovog svetiteljskog kulta na srpski narod bio veći od njegove vladarske slave. Monah sveti Simeon je nadvisio i nadmašio velikog župana Stefana Nemanju.\r\nVladarski plašt zamenio je skromnom monaškom rizom, mač krstom, štit jevanđeljem, veseli i bučni dvor hilandarskom tišinom.\r\nSilazeći sa trona peo se u večnost.\r\nBilo je to izdizanje iznad ljudske mere – na putu ka svetosti.', 'stefanNemanja.jpg', 2, 10),
(11, 'Igra Prestola', '1439.10', '351875', '9788652139699', 'Zima dolazi. To su reči kuće Stark iz najsevernije zemlje kojom gospodari kralj Robert Barateon iz svoje daleke Kraljevske Luke. Severom u Robertovo ime vlada Edard Stark, gospodar Zimovrela. On živi u miru i udobnosti sa svojom ponosnom suprugom Kejtlin, sinovima Robom, Brenom i Rikonom, kćerima Sansom i Arjom, i kopiletom Džonom Snežnim. Još dalje na severu, iza velikog Zida, prostire se divljina i u njoj strašna, neprirodna bića, zaboravljena tokom dugog leta, prognana u mit. Ali sada zima dolazi i divlja zemlja se budi.\r\nNo, neposredna pretnja ipak dolazi sa juga gde je Džon Erin, kraljeva desna ruka, umro pod misterioznim okolnostima. Sada kralj Robert dolazi u Zimovrel, sa celom svitom, sa porodicom, ljupkom ali hladnom i proračunatom kraljicom Sersei, okrutnim i hrabrim sinom Džofrijem, i kraljičinom braćom Džejmijem i Tirionom iz bogate i moćne kuće Lanister. Prvi je mačevalac bez premca, a drugi porodična nakaza briljantnog uma. Sudbonosni susret se primiče, budućnost carstva je neizvesna.', 'igraPrestola.jpg', 3, 11),
(12, 'Balada o ptici pevačici i zmiji', '649.35', '345291', '9788610032659', 'Na jutro žetve počeće desetogodišnjica Igara Gladi. U Kapitolu, osamnaestogodišnji Koriolan Snou priprema se za jedinstvenu priliku da učestvuje kao mentor u Igrama. Nekada moćna porodica Snou doživela je teška vremena, a njihova sudbina zavisi od tanane šanse da Koriolan svojim šarmom, mudrošću i manevrom pomogne učenicama da osvoje Igre. Sve je protiv njega. Dobio je ponižavajući zadatak da predvodi ženski tribut iz Distrikta 12, najniži od najnižih. Njegova sudbina je sada u potpunosti zamršena: svaki izbor koji napravi može da dovede do pobede ili poraza, trijumfa ili pada. U areni će doći do borbe protiv smrti. Van arene, Koriolan počinje da oseća propast svog tributa… I moraće da odabere između lične potrebe da prati pravila i želje da preživi bez obzira na sve.', 'baladaOPticiPevacici.jpg', 3, 12),
(13, 'Zelena Milja', '499.50', '327045', '9788610023268', 'U Državnom zatvoru Hladna planina, duž jednog usamljenog niza ćelija zvanog Zelena milja, osuđenici čekaju smrt u naručju Vesele varnice. Ovde čuvari, kao što su čestiti Pol Edžkomb i sadista Persi Vetmur, paze na njih. Ali bili oni dobri ili zli, nevini ili krivi, svi će preneraženo dočekati novog zatvorenika, Džona Kofija, osuđenog na smrt zbog strašnog zločina. Da li je Kofi đavo u ljudskom obličju? Ili je, možda, nešto sasvim, sasvim drugo?\r\nZli ubica ili nevini svetac – šta god da je – Kofi ima neobične moći koje možda mogu da ponude spas drugima, iako oni ne mogu da urade ništa da spasu njega.\r\nJedan od najboljih Kingovih romana, prepun zagonetki, užasa i čudesa, priča smeštena u stravičnom zatvorskom okruženju, ali svejedno dirljiva koliko i užasna. King premašuje očekivanja, njegovo pisanje nas opčinjava i u nama budi glad za novim obrtima. Čitaocima ostaje samo da u jednom dahu pročitaju ovo remek-delo.', 'zelenaMilja.jpg', 3, 13),
(14, 'Svet koji bi trebalo da imamo', '764.15', '307715', '9788610019315', 'Svet Toma Barena neka je vrsta tehnološkog raja, skoro nestvarna oaza mira i blagostanja, i to zahvaljujući izumu koji je rešio sve probleme modernog društva. Tom je rođen u takvom svetu, ali kao da njemu ne pripada: svakog jutra kada se probudi, on je nepodnošljivo usamljen. Nedavno je izgubio majku, jedinu osobu koja ga je volela, a otac, čuveni naučnik, smatra ga nesposobnim i prezire ga. Povrh svega, zaljubljen je u devojku koja ga ne primećuje, a za koju bi učinio sve, prekršio čak i zakone fizike.\r\nNakon jednog putovanja kroz vreme i incidenta za koji je on odgovoran, Tom će se naći u svetu koji jedva prepoznaje – u našoj stvarnosti. Ipak, u tom svetu, pogrešnom za njega, otkriva da ima sjajnu karijeru, porodicu koja ga obožava, a možda je pronašao i srodnu dušu. Da li je onda bolje da čovečanstvu vrati izgubljenu utopiju ili da ostane i uživa u sreći tog nesavršenog univerzuma?', 'svetKojiBiTrebaloDaImamo.jpg', 3, 14),
(15, 'Sunčani rat', '1439.10', '279596', '9788652115310', 'U noći mladog meseca brojni demoni ustaju želeći smrt izvesne dvojice ljudi. I jedan i drugi bi mogli postati legendarni Izbavitelj, čovek koji će, ako je verovati proročanstvu, iznova ujediniti rasute ostatke čovečanstva i povesti ih u konačni napad kako bi jednom zasvagda uništili demonske utrobnike.\r\nArlen Stog je nekada bio običan čovek, ali postao je nešto više – Iscrtani Čovek, istetoviran drevnim simbolima, toliko moćnim da se on sada može meriti sa svakim demonom. Arlen neprestano poriče da je Izbavitelj, ali što se više trudi da se srodi s prostim narodom, to oni zagriženije veruju u njega. Mnogi bi ga sledili, ali put preti da Arlena odvede u tamu, u koju može otputovati samo on sam, i odakle možda nema povratka.', 'suncaniRat.jpg', 3, 15),
(16, 'Izgubljeni u prevodu', '899.10', '353152', '9788652140558', 'Nezaboravna priča o ljubavi i strasti, o porodičnim vezama i ljudskoj patnji i o pokušaju jedne žene da nestane u tuđoj zemlji – samo da bi u njoj našla dom, ljubav i samu sebe.\r\nU zoru Alis Manegan vozi bicikl opustelim ulicama Pekinga. Amerikanka po rođenju, prevodilac po zanimanju, noći provodi u zadimljenim pekinškim barovima u društvu sa Kinezima koji je privlače i lako proziru njene namere. Svuda oko nje bruji nova Kina, širi se miris prošlosti, ali i promene, miris sveta u koji je došla da bi pobegla od oca čije postupke ne odobrava i od sopstvenog bola. Svake noći, kada se iskrade iz hotela, nada se da će se u tom svetu izgubiti zauvek.\r\nAlisin život se menja nakon telefonskog poziva jednog američkog arheologa. Ona će krenuti na put kroz prošlost Kine, kao i kroz neke od najudaljenijih i tajanstvenih predela. Alis se pridružuje ekspediciji koja traga za fosilnim ostacima pekinškog čoveka, i tu upoznaje profesora Lin Šijanga. Dok vlasti budno prate svaki njihov korak i snimaju svaki njihov šapat, Alis i Lin nalaze utehu jedno u drugome, polako se oslobađajući aveti prošlosti. Njihova veza prerasta u jednu od najuzbudljivijih erotskih ljubavnih priča u savremenoj književnosti.', 'izgubljeniUPrevodu.jpg', 4, 16),
(17, 'Gospodarica Moga Srca', '584.35', '349229', '9788610034905', 'Nijedan muškarac ne može da odoli Džeminim senzualnim čarima… Osim njenog muža.\r\nSvadbena zvona u čast ugovorenog braka između ljupke Džeme i staloženog i nepokolebljivog Elajdže, vojvode od Bomonta, tek što su utihnula kada je šokantno otkriće nateralo nevestu da pobegne sa plemićkog poseda. Potresena i povređena, beži u inostranstvo, gde narednih devet godina živi tako što ulazi iz jedne avanture u drugu, skupljajući sočne skandale (bar ako je verovati glasinama).\r\nSve dok je, sasvim iznenada, Elajdža ne pozove da se vrati kući – jer mu je potreban naslednik. Džema prezire njegovu hladnoću, ali ipak u sebi otkriva da nikada nije prestala da ga voli. Shvata da, zapravo, želi nemoguće: srce svoga muža na dlanu.', 'gospodaricaMogaSrca.jpg', 4, 17),
(18, 'Anika', '584.35', '349224', '9788610035032', 'Tri para. Drevna misterija. Moć bezvremene ljubavi. Nakon uspešne portage za zvezdama u Grčkoj, šestorka koja je ujedinila moći sada je u Italiji. Dok ulozi u opasnoj igri postaju sve veći, prelepa Anika i hrabri Sojer pronaći će još nešto.\r\nAnika dolazi iz mora… I zna da će tamo morati da se vrati kada njena potraga bude završena. Lepa, živahna i neverovatno snažna, ne prestaje da očarava svoje nove prijatelje, čuvare izabrane da štite tri zvezde koje su stvorile boginje. Zahvaljujući putniku Sojeru, stigli su na prelepo italijansko ostrvo Kapri kako bi pronašli Zvezdu vode. Njega sve više privlači Anika i njena iskrenost i vedar duh. Ipak, zna da će, ako je pusti u svoje srce, izgubiti čvrsto tlo pod nogama, bez obzira na svoj magijski kompas. Ali kako može da se bori protiv prave ljubavi?\r\nZa to vreme, Nereza, njihov mračni neprijatelj, već je izgubila jednu zvezdu i priprema osvetu smrtonosnim i nepredvidivim oružjem. U borbi između tame i svetlosti, možda je ljubav jedino što ih može sačuvati strašne sudbine.', 'anika.jpg', 4, 18),
(19, 'Tiha žena', '809.10', '347904', '9788652137503', 'Knjige Ketrin Kukson prodate su u više od 130 miliona primeraka, prevedene na 26 jezika, a 17 godina je bila najtraženiji autor u britanskim bibliotekama.\r\nU kancelariji ugledne londonske advokatske firme pojavila se žena u prljavoj odeći, koja je visila s njenog krhkog tela, a bilo je očigledno da ima teškoće s govorom. Kad je gospodin Armstrong, advokat, saznao ime posetiteljke, shvatio je da će razrešiti tajnu koja ga je mučila dvadeset šest godina. Ajrin Bejndor, Tiha Žena, nekad je bila mlada i fina, muzički nadarena supruga bogatog i moćnog čoveka i majka voljenog sina. Šta se dogodilo s njom? Šta je radila i gde je bila tokom svih tih godina? Gde je nestao njen divan glas?\r\nUz izuzetnu veštinu u smišljanju zapleta, smeštanju radnje i slikanju likova i uz oslanjanje na vlastito iskustvo života radničke klase, Ketrin Kukson nas vodi kroz nesvakidašnju priču o životu Tihe Žene.', 'tihaZena.jpg', 4, 19),
(20, 'Život je roman', '584.35', '347882', '9788610033731', 'Za njega, sve je već bilo napisano.\r\nZa nju, sve je tek trebalo da se napiše.\r\n„Jednog aprilskog dana, moja trogodišnja ćerkica Keri nestala je dok smo se igrale žmurke u našem stanu u Bruklinu.“\r\nTako počinje priča Flore Konvej, slavne spisateljice poznate po tome da se krije od očiju javnosti. Nema objašnjenja za Kerin nestanak: vrata i prozori u stanu bili su zatvoreni, kamere postavljene u staroj zgradi u Njujorku nisu zabeležile provalu. Policijska istraga nije dala nikakve rezultate.\r\nU isto vreme, na drugoj strani Atlantika, pisac slomljenog srca krije se među zidovima stare, oronule kuće.\r\nSamo on drži u rukama rešenje ove misterije. A Flora će ga pronaći.', 'zivotJeRoman.jpg', 4, 20),
(23, 'U bekstvu', '849.00', '353783', '9788610036244', 'Moćna nova knjiga autorke bestselera Nore Roberts podseća nas na to da ono najdragocenije možemo da pronađemo na mestima na kojima to najmanje očekujemo. Jedan dan, pomislila je, jedan trenutak, jedna nedužna igra.', 'uBekstvu.jpg', 4, 18),
(24, 'Oprosti mi Rouz Gould', '849.00', '354234', '9788610036312', 'Prvih osamnaest godina života, Rouz Gould Vots je verovala da je ozbiljno bolesna. Bila je alergična na sve i svašta, koristila kolica jer je bila previše slaba da hoda i praktično živela u bolnici. Komšije su pomagale koliko su mogle, skupljale pomoć i nudile rame za plakanje, ali bez obzira na to koliko lekara posetila ili analiza uradila, niko nije mogao da ustanovi šta nije u redu sa njom.\r\nIspostavilo se, na kraju, da je njena mama, Peti Vots, samo bila stvarno dobar lažov.\r\nNakon što je odležala pet godina u zatvoru, Peti je najzad slobodna, ali nema gde da ode, i zato moli ćerku da je primi. Čitava zajednica šokirana je kada Rouz Gould pristane. Peti tvrdi da želi da ostavi sve za sobom i pomiri se sa ćerkom koja je svedočila protiv nje. Ali Rouz Gould poznaje svoju majku. Peti Vots nikome ne ostaje dužna. Na Petinu nesreću, Rouz Gould više nije njena draga nemoćna devojčica…\r\nI čekala je toliko dugo da joj se majka vrati kući.', 'rouzGould.jpg', 6, 22),
(26, 'Povratak', '899.00', '353696', '9788652140947', 'Trevor Benson nikad nije nameravao da se vrati u Nju Bern u Severnoj Karolini. Radio je u Avganistanu kao ortopedski hirurg sve dok jednog dana ispred bolnice nije eksplodirala minobacačka granata. Zadobivši teške povrede, vratio se u domovinu, a trošna, drvena kućica koju je nasledio od dede izgleda mu kao dobro mesto za oporavak, baš kao i bilo koje drugo.\r\nU Nju Bernu brine o dedinim voljenim košnicama i priprema se za drugu specijalizaciju na fakultetu. Kada sretne Natali Masterson, zamenika šerifa, neplanirano će se kod njega probuditi osećanja koja ne može da ignoriše. Iako je očigledno da je i on njoj drag, Natali je povremeno neočekivano veoma suzdržana prema njemu. Trevor počinje da se pita šta je uzrok takvom njenom ponašanju.\r\nU život mu ulazi još jedna tajnovita osoba, tinejdžerka Kali koja živi u obližnjem kampu za prikolice. Tvrdeći da joj je sedamnaest godina, ona radi u prodavnici mešovite robe i izbegava društvo. Otkrivši da se svojevremeno sprijateljila s njegovim dedom, Trevor se nada da Kali može da rasvetli misteriozne okolnosti pod kojima je njegov deda umro, ali ona nudi skromne nagoveštaje sve dok se ne ispostavi da je Kalina prošlost isprepletena sa starčevom smrću više nego što je Trevor mogao da pretpostavi.\r\nU nastojanju da otkrije Nataline i Kaline tajne, Trevor će naučiti šta zaista znače ljubav i opraštanje... i da se u životu, da bismo krenuli dalje, često moram vratiti na mesto gde je sve počelo.', 'povratak.jpg', 4, 24),
(27, 'Ljubavno pismo', '1079.00', '353709', '9788652140756', 'Čuvanje tajni je opasna igra…\r\nLondon, 1995.\r\nSer Džejms Harison, jedan od najvećih glumaca svoje generacije, preminuo je u devedeset petoj godini života i ostavio ne samo ožalošćenu porodicu već i šokantnu, razornu tajnu koja može da uzdrma englesko društvo do srži.\r\nDžoani Haslam, ambicioznoj mladoj novinarki, dodeljen je zadatak da napiše članak o ser Džejmsovoj sahrani. Ispraćaju prisustvuju mnoge svetski poznate ličnosti. Ali pod plaštom glamura, Džoana otkriva mračnu priču o pismu ser Džejmsa Harisona čiji je sadržaj očajnički skrivan duže od sedamdeset godina. Kad je pronikla kroz koprenu laži, shvatila je da postoji i druga strana koja pokušava da je spreči da otkrije istinu. I da ne preza ni od čega da dođe do pisma pre nje.\r\n', 'ljubavnoPismo.jpg', 4, 23);

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `id_korisnik` int(255) NOT NULL,
  `ime` varchar(20) COLLATE utf32_unicode_ci NOT NULL,
  `prezime` varchar(20) COLLATE utf32_unicode_ci NOT NULL,
  `telefon` varchar(20) COLLATE utf32_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf32_unicode_ci NOT NULL,
  `postanski_broj` int(11) NOT NULL,
  `drzava` varchar(20) COLLATE utf32_unicode_ci NOT NULL DEFAULT 'Srbija',
  `grad` varchar(20) COLLATE utf32_unicode_ci NOT NULL,
  `ulica` varchar(50) COLLATE utf32_unicode_ci NOT NULL,
  `lozinka` varchar(50) COLLATE utf32_unicode_ci NOT NULL,
  `pol` varchar(10) COLLATE utf32_unicode_ci NOT NULL,
  `aktivan` bit(1) NOT NULL,
  `id_uloge` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`id_korisnik`, `ime`, `prezime`, `telefon`, `email`, `postanski_broj`, `drzava`, `grad`, `ulica`, `lozinka`, `pol`, `aktivan`, `id_uloge`) VALUES
(12, 'Jelena', 'Bisevac', '063/331-824', 'bisevacjelena1@gmail.com', 11000, 'Srbija', 'Beograd', 'Bulevar vojvode Mišića 19', 'c62439ea56c71bf8b4760d507e0e646a', 'Z', b'1', 2),
(13, 'Pera', 'Peric', '061/236-478', 'pera@gmail.com', 12500, 'Srbija', 'Novi Sad', 'Masarikova', 'bf676ed1364b5857fba69b5623c81b64', 'M', b'1', 1),
(15, 'Laza', 'Lazić', '063/235-789', 'laza@gmail.com', 15200, '', 'Niš', 'Nerevska', '973902af2b44887ff2f2c6854bf5cf9d', 'M', b'1', 1),
(17, 'Mila', 'Milić', '065/789-456', 'mila@gmail.com', 14000, '', 'Kraljevo', 'Kraljevska 12', '0d5c82813c52b2d5ba31175a17303b82', 'Z', b'1', 1),
(19, 'Stefan', 'Stefanović', '064/458-789', 'stefan@gmail.com', 11000, 'Srbija', 'Beograd', 'Balkanska', 'e42337a246c9864183d92125eb51d86c', 'M', b'1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `meni`
--

CREATE TABLE `meni` (
  `id_meni` int(20) NOT NULL,
  `naziv_meni` varchar(20) COLLATE utf32_unicode_ci NOT NULL,
  `href_meni` varchar(20) COLLATE utf32_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `meni`
--

INSERT INTO `meni` (`id_meni`, `naziv_meni`, `href_meni`) VALUES
(1, 'O nama', 'oNama'),
(2, 'Knjige', 'knjige'),
(3, 'Kontakt', 'kontakt.php'),
(4, 'Autor', 'autor.php');

-- --------------------------------------------------------

--
-- Table structure for table `najcesca_pitanja_i_odgovori`
--

CREATE TABLE `najcesca_pitanja_i_odgovori` (
  `id_pitanja` int(11) NOT NULL,
  `pitanje` text COLLATE utf32_unicode_ci NOT NULL,
  `odgovor` text COLLATE utf32_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `najcesca_pitanja_i_odgovori`
--

INSERT INTO `najcesca_pitanja_i_odgovori` (`id_pitanja`, `pitanje`, `odgovor`) VALUES
(1, 'Da li je poručene artikle moguće menjati ili reklamirati u maloprodajnim objektima?', 'Robu koju ste kupili preko sajta www.BookMaster.rs. ne možete menjati, vraćati ili potraživati sredstva u našim knjižarama.\r\nSva zamena i povraćaji robe vrše sve preko kurirske službe.\r\nZahtev za zamenu ili povraćaj robe šaljete na porudzbine@BookMaster.rs.\r\n'),
(2, 'Kada i u koje vreme će mi biti isporučeni poručeni artikli?', 'Porudžbine se predaju kurirskoj službi u roku od 1 do 2 radna dana od prijema porudžbine.\r\nPorudžbine koje se naprave u petak biće na obradi u ponedeljak jer kurska služba ne preuzima pakete vikendom.\r\nRok isporuke je 1-2 radna dana od predaje paketa kurirskoj službi.\r\nIsporuka se vrši radnim danima od 8-16h. Kurirske službe u redovnim okolnostima ne isporučuju vikendom.\r\nUkoliko niste na adresi i ovom periodu, preporučujemo da upišete drugu adresu isporuke. To može biti npr adresa na poslu ili adresa člana porodice koji će umesto vas preuzeti pošiljku.'),
(3, 'Kako da otkažem porudžbinu?', 'Svoju porudžbinu možete otkazati slanjem emaila na porudzbine@BookMaster.rs.'),
(4, 'Kako da reklamiram artikal?', 'Ukoliko ste dobili artikal koji je oštećen ili na bilo koji način ne odgovara poručenom, zahtev za reklamaciju šaljete na reklamacije@BookMaster.rs ili na porudzbine@BookMaster.rs'),
(5, 'Kako mogu da platim svoju porudžbinu?', 'Pouzećem - plaćanje gotovinom prilikom preuzimanja paketa.'),
(6, 'Kojom kurirskom službom se vrši isporuka?', 'Za isporuku paketa koristimo usluge kurirske službe AKS.*\r\n\r\n* Zadržavamo pravo da u slučaju potrebe koristimo usluge i drugih kurirskih službi bez prethodne najave.'),
(7, 'Koliko košta isporuka?', 'Isporuka je besplatna za bilo koji iznos kupovine.'),
(8, 'Poručio sam pogrešan artikal, kako da izvršim zamenu?', 'Zahtev za zamenu šaljete na porudzbine@BookMaster.rs.\r\nZamena artikla se naplaćuje 300 dinara.\r\nArtikal se menja isključivo preko kurirske službe, robu ne možete menjati ili vraćati u našim maloprodajnim objektima.'),
(9, 'Šta se dešava ukoliko nisam na adresi u trenutku isporuke?', 'Ukoliko niste na adresi, kuriri su u obavezi da vam dostave obaveštenje (pismeno ili telefonom) o pokušaju uručenja.\r\nIsporuka će biti pokušana još jednom a nakon 2 neuspešna pokušaja, pošiljka se vraća pošiljaocu.'),
(10, 'Želim da vratim poručene artikle i dobijem svoj novac nazad.', 'Trenuno je na snazi odluka Knjižara BookMaster o produženom roku vraćanja na 30 dana od trenutka prijema pošiljke.\r\nZakonski rok za vraćanje poručene robe je 14 dana. Zahtev za povraćaj robe i sredstava šaljete na porudzbine@BookMaster.rs.');

-- --------------------------------------------------------

--
-- Table structure for table `narudzbine`
--

CREATE TABLE `narudzbine` (
  `id_narudzbine` int(11) NOT NULL,
  `datum` timestamp NOT NULL DEFAULT current_timestamp(),
  `grad` varchar(50) COLLATE utf32_unicode_ci NOT NULL,
  `postanski_broj` int(11) NOT NULL,
  `adresa` varchar(100) COLLATE utf32_unicode_ci NOT NULL,
  `id_korisnika` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `narudzbine`
--

INSERT INTO `narudzbine` (`id_narudzbine`, `datum`, `grad`, `postanski_broj`, `adresa`, `id_korisnika`) VALUES
(20, '2021-04-21 11:03:16', 'Beograd', 11000, 'Bulevar vojvode Mišića 19', 12),
(21, '2021-04-21 11:44:30', 'Novi Sad', 12500, 'Masarikova', 13),
(22, '2021-04-21 12:48:43', 'Niš', 15200, 'Nerevska', 15);

-- --------------------------------------------------------

--
-- Table structure for table `narudzbine_stavke`
--

CREATE TABLE `narudzbine_stavke` (
  `id_narudzbine` int(11) NOT NULL,
  `id_proizvoda` int(11) NOT NULL,
  `kolicina` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `narudzbine_stavke`
--

INSERT INTO `narudzbine_stavke` (`id_narudzbine`, `id_proizvoda`, `kolicina`) VALUES
(20, 13, 1),
(20, 14, 1),
(21, 3, 2),
(21, 4, 1),
(21, 5, 1),
(22, 18, 5);

-- --------------------------------------------------------

--
-- Table structure for table `porukekorisnika`
--

CREATE TABLE `porukekorisnika` (
  `id_poruke` int(11) NOT NULL,
  `ime` varchar(20) COLLATE utf32_unicode_ci NOT NULL,
  `prezime` varchar(20) COLLATE utf32_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf32_unicode_ci NOT NULL,
  `telefon` varchar(20) COLLATE utf32_unicode_ci NOT NULL,
  `postanski_broj` int(11) NOT NULL,
  `poruka` text COLLATE utf32_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `porukekorisnika`
--

INSERT INTO `porukekorisnika` (`id_poruke`, `ime`, `prezime`, `email`, `telefon`, `postanski_broj`, `poruka`) VALUES
(7, 'Jelena', 'Bisevac', 'bisevacjelena1@gmail.com', '063/331-824', 11000, 'Dobar dan.');

-- --------------------------------------------------------

--
-- Table structure for table `uloge`
--

CREATE TABLE `uloge` (
  `id_uloge` int(5) NOT NULL,
  `naziv` varchar(20) COLLATE utf32_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `uloge`
--

INSERT INTO `uloge` (`id_uloge`, `naziv`) VALUES
(1, 'korisnik'),
(2, 'administrator');

-- --------------------------------------------------------

--
-- Table structure for table `zanr`
--

CREATE TABLE `zanr` (
  `id_zanr` int(20) NOT NULL,
  `naziv_zanr` varchar(20) COLLATE utf32_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `zanr`
--

INSERT INTO `zanr` (`id_zanr`, `naziv_zanr`) VALUES
(1, 'Klasik'),
(2, 'Biografija'),
(3, 'Fantastika'),
(4, 'Roman'),
(6, 'Triler');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `autori`
--
ALTER TABLE `autori`
  ADD PRIMARY KEY (`id_autor`);

--
-- Indexes for table `knjige`
--
ALTER TABLE `knjige`
  ADD PRIMARY KEY (`id_knjige`),
  ADD KEY `zanrId_knjige` (`zanrId_knjige`),
  ADD KEY `autorId_knjige` (`autorId_knjige`);

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`id_korisnik`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `id_uloge` (`id_uloge`);

--
-- Indexes for table `meni`
--
ALTER TABLE `meni`
  ADD PRIMARY KEY (`id_meni`);

--
-- Indexes for table `najcesca_pitanja_i_odgovori`
--
ALTER TABLE `najcesca_pitanja_i_odgovori`
  ADD PRIMARY KEY (`id_pitanja`);

--
-- Indexes for table `narudzbine`
--
ALTER TABLE `narudzbine`
  ADD PRIMARY KEY (`id_narudzbine`),
  ADD KEY `id_korisnika` (`id_korisnika`);

--
-- Indexes for table `narudzbine_stavke`
--
ALTER TABLE `narudzbine_stavke`
  ADD PRIMARY KEY (`id_narudzbine`,`id_proizvoda`),
  ADD KEY `id_proizvoda` (`id_proizvoda`);

--
-- Indexes for table `porukekorisnika`
--
ALTER TABLE `porukekorisnika`
  ADD PRIMARY KEY (`id_poruke`);

--
-- Indexes for table `uloge`
--
ALTER TABLE `uloge`
  ADD PRIMARY KEY (`id_uloge`);

--
-- Indexes for table `zanr`
--
ALTER TABLE `zanr`
  ADD PRIMARY KEY (`id_zanr`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `autori`
--
ALTER TABLE `autori`
  MODIFY `id_autor` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `knjige`
--
ALTER TABLE `knjige`
  MODIFY `id_knjige` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `id_korisnik` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `meni`
--
ALTER TABLE `meni`
  MODIFY `id_meni` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `najcesca_pitanja_i_odgovori`
--
ALTER TABLE `najcesca_pitanja_i_odgovori`
  MODIFY `id_pitanja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `narudzbine`
--
ALTER TABLE `narudzbine`
  MODIFY `id_narudzbine` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `porukekorisnika`
--
ALTER TABLE `porukekorisnika`
  MODIFY `id_poruke` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `uloge`
--
ALTER TABLE `uloge`
  MODIFY `id_uloge` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `zanr`
--
ALTER TABLE `zanr`
  MODIFY `id_zanr` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `knjige`
--
ALTER TABLE `knjige`
  ADD CONSTRAINT `knjige_ibfk_1` FOREIGN KEY (`zanrId_knjige`) REFERENCES `zanr` (`id_zanr`),
  ADD CONSTRAINT `knjige_ibfk_2` FOREIGN KEY (`autorId_knjige`) REFERENCES `autori` (`id_autor`);

--
-- Constraints for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD CONSTRAINT `korisnici_ibfk_1` FOREIGN KEY (`id_uloge`) REFERENCES `uloge` (`id_uloge`);

--
-- Constraints for table `narudzbine`
--
ALTER TABLE `narudzbine`
  ADD CONSTRAINT `narudzbine_ibfk_1` FOREIGN KEY (`id_korisnika`) REFERENCES `korisnici` (`id_korisnik`);

--
-- Constraints for table `narudzbine_stavke`
--
ALTER TABLE `narudzbine_stavke`
  ADD CONSTRAINT `narudzbine_stavke_ibfk_1` FOREIGN KEY (`id_narudzbine`) REFERENCES `narudzbine` (`id_narudzbine`),
  ADD CONSTRAINT `narudzbine_stavke_ibfk_2` FOREIGN KEY (`id_proizvoda`) REFERENCES `knjige` (`id_knjige`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
