<?php


session_start();
use Controller\CinemaController;

spl_autoload_register(function ($class_name) {






    include $class_name . ".php";


});

$ctrlCinema = new CinemaController();

$action = isset($_GET["action"]) ? $_GET["action"] : "home";
$id = (isset($_GET["id"])) ? $_GET["id"] : null;
$query = isset($_GET["query"]) ? $_GET["query"] : "";


if (isset($_GET["action"])) {
    switch ($_GET["action"]) {
        case
        "listeFilms":
            $ctrlCinema->listeFilms();
            break;
        case
        "listeActeurs":
            $ctrlCinema->listeActeurs();
            break;
        case
        "listeRealisateurs":
            $ctrlCinema->listeRealisateurs();
            break;

        case
        "home":
            $ctrlCinema->home();
            break;
        case
        "modifierFilmFormulaire":
            $ctrlCinema->modifierFilmFormulaire();
            break;

        case "modifierFilm":
            $ctrlCinema->modifierFilm();
            require "view/home.php";
            break;

        case "ajouterFilm":
            $ctrlCinema->ajouterFilm();
            require "view/admin.php";
            break;

        case "buy":
            $ctrlCinema->buy();
            break;



        case "ajouterFormulaireFilm":
            $ctrlCinema->ajouterFormulaireFilm();
            require "view/home.php";

            break;

        case "supprimerFilm":$ctrlCinema->supprimerFilm();

            
            break;


        case "supprimerFormulaireFilm":


            break;


        case "supprimerPersonnage":$ctrlCinema->supprimerPersonnage();
            

            break;

        case "acheter":$ctrlCinema->acheter();
            

            break;
        case "mailenvoie":$ctrlCinema->mailenvoie();
            

            break;





        case "rechercher":

            $ctrlCinema->rechercher($query);
            break;

        case "ajouterPersonne":
            $ctrlCinema->ajouterPersonne();
            break;



        default:
            require "view/home.php";
            break;





        case "detailsRealisateur":
            $nom_realisateur = $_GET["nom"] ?? null;
            $ctrlCinema->detailsRealisateur($nom_realisateur);
            break;

        case "detailsFilm":
            $titre_film = $_GET["titre"] ?? null;
            $ctrlCinema->detailsFilm($titre_film);
            break;


        case"admin":$ctrlCinema->admin();
            
        
            break;
        case"lesnouvelles":$ctrlCinema->lesnouvelles();
            
        
            break;
        case"ajouterFormulairePersonnage":$ctrlCinema->ajouterFormulairePersonnage();
        
            
            break;


        case
        "supprimerFormulairePersonnage":$ctrlCinema->supprimerFormulairePersonnage();
            
            break;


        case
        "LoginFormulaireAdmin":
            $ctrlCinema->LoginFormulaireAdmin();
            break;



        case "detailsActeur":
            $prenom_acteur = $_GET["prenom"] ?? null;
            $ctrlCinema->detailsActeur($prenom_acteur);
            break;



        case "login":
            $username = $_POST["username"] ?? null;
            $password = $_POST["password"] ?? null;
            $ctrlCinema->login();
            break;



    }


} else
    require "view\home.php";



