<?php


namespace Controller;

use Model\Connect;

class CinemaController
{



    //page home 

    public function home()
    {
        $pdo = Connect::seConnecter();
        require "view\home.php";

    }

    // fonction pour envoyer des newsletters
    public function lesnouvelles()
    {   $queFaitOn = 'mail';
        $mail_admin = 'mema22@live.fr';
        $pdo = Connect::seConnecter();
        $sql=( "INSERT INTO newsletter SET mail='" . $_POST['mail'] . "'");
        
        
        if (!empty($_POST['mail'])) {


                if ($queFaitOn == 'mail') {

                    mail($mail_admin, "Nouveau mail", "Nouvelle inscription newsletter pour {$_SERVER['HTTP_HOST']} : " . $_POST['mail']);

                } 

                echo "<p>Merci pour votre inscription, nous allons bientôt vous envoyer nos newsletters !</p>";
            }
            require "view\home.php";

        }


        

    //fonction pour s'inscrire à la newsletters
    public function phpmailer()
    {
        $pdo = Connect::seConnecter();
        require "view\phpmailer.php";

    }


    
    public function ajouterMailBDD()
    {
        $pdo = Connect::seConnecter();
        $queFaitOn = 'mail';
        $mail_admin = 'mema22@live.fr';
        
        
    
        $sql=( "INSERT INTO newsletter SET mail='" . $_POST['mail'] . "'");
        
       


    }


            

       
    //fonction pour aller sur formulaire ajouter un film

    public function ajouterFormulaireFilm()
    {
        $pdo = Connect::seConnecter();
        require "view\ajouterFormulaireFilm.php";
    }


    // fonction vente    
    public function buy()
    {
        $pdo = Connect::seConnecter();
        require "view\buy.php";
    }


    //fonction pour aller sur formulaire supprimer un film        
    public function supprimerFormulaireFilm()
    {
        $pdo = Connect::seConnecter();
        require "view\supprimerFormulaireFilm.php";
    }


    //fonction pour aller sur formulaire ajouter personnage

    public function ajouterFormulairePersonnage()
    {

        $pdo = Connect::seConnecter();

        require "view\ajouterFormulairePersonnage.php";
    }

    //function formulaire achat

    public function acheter()
    {

        $pdo = Connect::seConnecter();

        require "view\acheter.php";
    }


    //fonction pour aller sur formulaire supprimer personnage 

    public function supprimerFormulairePersonnage()
    {

        $pdo = Connect::seConnecter();

        require "view\supprimerFormulairePersonnage.php";
    }

    //modifierfonction page modifier
    public function modifierFilmFormulaire()
    {
        $pdo = Connect::seConnecter();
        require "view\modifierFilmFormulaire.php";
    }


    //affichage liste de films
    public function listeFilms()
    {

        $pdo = Connect::seConnecter();
        $listeFilms = $pdo->query(
            "SELECT f.titre_film,f.annee_sortie_film
            FROM film f
           "
        );

        require "view\listeFilms.php";


        //affichage liste d'acteurs

    }
    public function listeActeurs()
    {

        $pdo = Connect::seConnecter();
        $listeActeurs = $pdo->query(
            "SELECT p.nom_personne AS nom, p.prenom AS prenom, p.sexe, p.date_naissance_personne AS date_naissance
            FROM Acteur a
            JOIN Personne p ON a.id_personne = p.id_personne;date_naissance_personne ))"
        );
        require "view\listeActeurs.php";

    }

    //affichage liste de réalisateurs

    public function listeRealisateurs()
    {

        $pdo = Connect::seConnecter();
        $listeRealisateurs = $pdo->query(
            "SELECT p.nom_personne AS nom, p.prenom AS prenom, p.sexe, p.date_naissance_personne AS date_naissance
            FROM realisateur a
            JOIN Personne p ON a.id_personne = p.id_personne;date_naissance_personne = '1994-05-05'))"
        );
        require "view\listeRealisateurs.php";

    }



    //Details Réalisateurs
    public function detailsRealisateur($nom_realisateur)
    {
        $pdo = Connect::seConnecter();

        $sql = "SELECT p.nom_personne AS nom, p.prenom, p.date_naissance_personne AS date_naissance, p.sexe
            FROM Realisateur r
            JOIN Personne p ON r.id_personne = p.id_personne
            WHERE p.nom_personne = :nom_realisateur";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nom_realisateur', $nom_realisateur);
        $stmt->execute();

        $realisateur = $stmt->fetch();

        require 'view/detailsRealisateur.php';
    }




    //Details acteurs
    public function detailsActeur($prenom_acteur)
    {
        $pdo = Connect::seConnecter();

        $sql = "SELECT a.*, p.nom_personne AS nom, p.prenom, p.sexe, p.date_naissance_personne AS date_naissance
            FROM Acteur a
            JOIN Personne p ON a.id_personne = p.id_personne
            WHERE p.prenom = :prenom_acteur";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':prenom_acteur', $prenom_acteur);
        $stmt->execute();

        $acteur = $stmt->fetch();

        require 'view/detailsActeur.php';
    }





    //detail pour un film
    public function detailsFilm($titre_film)
    {
        $pdo = Connect::seConnecter();

        $sql = "SELECT f.*, r.nom_personne AS nom_realisateur, r.prenom AS prenom_realisateur
        FROM Film f
        JOIN Realisateur rl ON f.id_realisateur = rl.id_realisateur
        JOIN Personne r ON rl.id_personne = r.id_personne
        WHERE f.titre_film = :titre_film
    ";

        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':titre_film', $titre_film);

        if ($stmt->execute()) {
            $film = $stmt->fetch();

            if ($film) {
                require 'view/detailsFilm.php';
            } else {

                echo "Film non trouvé.";
            }
        } else {
            echo "Erreur lors de la récupération du film.";
        }
    }


    // rechercher

    public function rechercher($query)
    {
        $pdo = Connect::seConnecter();

        $query = '%' . $query . '%';
        $rechercher = $pdo->prepare("SELECT
            'Acteur' AS type, p.nom_personne AS nom, p.prenom AS prenom, p.sexe AS sexe, p.date_naissance_personne AS naissance
        FROM Acteur a
        JOIN Personne p ON a.id_personne = p.id_personne
        WHERE p.nom_personne LIKE :query
        OR p.prenom LIKE :query
        
        UNION
        
        SELECT 'Film' AS type, f.titre_film AS nom, f.annee_sortie_film AS annee_sortie, f.affiche_film AS affiche, f.synopsis_film AS synopsys 
        FROM Film f
        WHERE f.titre_film LIKE :query
        
    ");

        $rechercher->bindParam(':query', $query);
        $rechercher->execute();



        require 'view/rechercher.php';
    }



    //ajouter Personnage acteur ou réalisateur 

    public function ajouterPersonne()
    {
        $nom = $_POST['nom'] ?? '';
        $prenom = $_POST['prenom'] ?? '';
        $sexe = $_POST['sexe'] ?? '';
        $date_naissance = $_POST['date_naissance'] ?? '';
        $role = $_POST['role'] ?? '';

        $pdo = Connect::seConnecter();

        $sql = "INSERT INTO Personne (nom_personne, prenom, sexe, date_naissance_personne)
            VALUES (:nom, :prenom, :sexe, :date_naissance)";
        try {
            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':prenom', $prenom);
            $stmt->bindParam(':sexe', $sexe);
            $stmt->bindParam(':date_naissance', $date_naissance);

            $stmt->execute();

            $id_personne = $pdo->lastInsertId();

            if ($role === 'acteur') {
                $sql = "INSERT INTO Acteur (id_personne) VALUES (:id_personne)";
            } elseif ($role === 'realisateur') {
                $sql = "INSERT INTO Realisateur (id_personne) VALUES (:id_personne)";
            }

            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id_personne', $id_personne);
            $stmt->execute();


            echo "Votre personnage a été ajouté avec succès en tant que " . htmlspecialchars($role) . ".";

        } catch (PDOException $e) {

            echo "Erreur lors de l'ajout de votre personnage : " . $e->getMessage();
        }
        require 'view/admin.php';
    }


    //function pour supprimer un personnage acteur ou réalisateur

    public function supprimerPersonnage()
    {

        $nom = $_POST['nom'] ?? '';
        $prenom = $_POST['prenom'] ?? '';


        if (empty($nom) || empty($prenom)) {
            echo "Nom ou prénom invalide ou manquant.";
            return;
        }


        $pdo = Connect::seConnecter();

        try {

            $sql = "SELECT id_personne FROM Personne WHERE nom_personne = :nom AND prenom = :prenom";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':prenom', $prenom);
            $stmt->execute();
            $id_personne = $stmt->fetchColumn();


            if (!$id_personne) {
                echo "Personne non trouvée.";
                return;
            }


            $sql = "DELETE FROM Acteur WHERE id_personne = :id_personne";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id_personne', $id_personne);
            $stmt->execute();


            $sql = "DELETE FROM Personne WHERE id_personne = :id_personne";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id_personne', $id_personne);
            $stmt->execute();


            echo "Le personnage a été supprimé avec succès.";

        } catch (PDOException $e) {

            echo "Erreur lors de la suppression du personnage : " . $e->getMessage();
        }
        require 'view/admin.php';
    }



    //function pour modifier un film 


    public function modifierFilm()
    {

        $titre_film = $_POST['titre_film'] ?? '';
        $nouveau_titre = $_POST['nouveau_titre'] ?? '';
        $annee_sortie = $_POST['annee_sortie'] ?? '';
        $affiche = $_POST['affiche'] ?? '';
        $duree = $_POST['duree'] ?? '';
        $synopsis = $_POST['synopsis'] ?? '';
        $note = $_POST['note'] ?? '';


        $pdo = Connect::seConnecter();


        $sql = "UPDATE Film SET ";
        $params = [];

        if ($nouveau_titre !== '') {
            $sql .= "titre_film = :nouveau_titre, ";
            $params[':nouveau_titre'] = $nouveau_titre;
        }
        if ($annee_sortie !== '') {
            $sql .= "annee_sortie_film = :annee_sortie, ";
            $params[':annee_sortie'] = $annee_sortie;
        }
        if ($affiche !== '') {
            $sql .= "affiche_film = :affiche, ";
            $params[':affiche'] = $affiche;
        }
        if ($duree !== '') {
            $sql .= "duree_film = :duree, ";
            $params[':duree'] = $duree;
        }
        if ($synopsis !== '') {
            $sql .= "synopsis_film = :synopsis, ";
            $params[':synopsis'] = $synopsis;
        }
        if ($note !== '') {
            $sql .= "note_film = :note, ";
            $params[':note'] = $note;
        }


        if (!empty($params)) {
            $sql = rtrim($sql, ', ') . " WHERE titre_film = :titre_film";
            $params[':titre_film'] = $titre_film;

            try {

                $stmt = $pdo->prepare($sql);


                foreach ($params as $key => $value) {
                    $stmt->bindParam($key, $value);
                }


                $stmt->execute();


                echo "Le film a été modifié avec succès.";

            } catch (PDOException $e) {

                echo "Erreur lors de la modification du film : " . $e->getMessage();
            }
        } else {
            echo "Aucune modification à effectuer.";
        }
    }

    //function pour ajouter film via son titre et non le ID
    public function ajouterFilm()
    {

        $titre = $_POST['titre'] ?? '';
        $annee_sortie = $_POST['annee_sortie'] ?? '';
        $affiche = $_POST['affiche'] ?? '';
        $duree = $_POST['duree'] ?? '';
        $synopsis = $_POST['synopsis'] ?? '';
        $note = $_POST['note'] ?? '';
        $id_realisateur = $_POST['id_realisateur'] ?? '';


        $pdo = Connect::seConnecter();


        $sql = "INSERT INTO Film (titre_film, annee_sortie_film, affiche_film, duree_film, synopsis_film, note_film, id_realisateur)
            VALUES (:titre, :annee_sortie, :affiche, :duree, :synopsis, :note, :id_realisateur)";

        try {

            $stmt = $pdo->prepare($sql);


            $stmt->bindParam(':titre', $titre);
            $stmt->bindParam(':annee_sortie', $annee_sortie);
            $stmt->bindParam(':affiche', $affiche);
            $stmt->bindParam(':duree', $duree);
            $stmt->bindParam(':synopsis', $synopsis);
            $stmt->bindParam(':note', $note);
            $stmt->bindParam(':id_realisateur', $id_realisateur);


            $stmt->execute();


            echo "Le film a été ajouté avec succès.";

        } catch (PDOException $e) {

            echo "Erreur lors de l'ajout du film : " . $e->getMessage();
        }
    }

    //function supprimer un film

    public function supprimerFilm()
    {

        $titre_film = $_POST['titre_film'] ?? '';
        if (empty($titre_film)) {
            echo "Titre du film invalide ou manquant.";
            return;
        }

        $pdo = Connect::seConnecter();

        $sql = "DELETE FROM Film WHERE titre_film = :titre_film";
        try {

            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':titre_film', $titre_film);

            if ($stmt->execute()) {

                echo "Le film a été supprimé avec succès.";
            } else {
                echo "Erreur lors de la suppression du film.";
            }
        } catch (PDOException $e) {
            echo "Erreur lors de la suppression du film : " . $e->getMessage();
        }

        require 'view/LoginFormulaireAdmin.php';
    }



    //bonus partie login 

    //function formulaire de la page de connexion


    public function LoginFormulaireAdmin()
    {
        $pdo = Connect::seConnecter();

        require "view\LoginFormulaireAdmin.php";

    }


    //fonction pour ce connecter avec un user et un password 

    public function login()
    {

        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';


        if ($username === 'mohamed' && $password === 'momo') {

            header('Location: index.php?action=admin');
            exit;
        } else {

            echo "Nom d'utilisateur ou mot de passe incorrect.";
        }
        require 'view/home.php';

    }


    //function pour si authentification alors il va sur la page admin 


    public function admin()
    {

        if (!isset($_SESSION['authenticated']) || !$_SESSION['authenticated']) {


        }


        require 'view/admin.php';
    }



}

































