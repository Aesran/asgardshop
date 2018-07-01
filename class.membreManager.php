<?php
/* Manager des objets de class personnage */

class MembreManager

{
  private static $_instance = 0;


  // Attributs du manager
  private $_db; 

   public function __construct($db)
    {
      $this->setdb($db);
    }
          

  public function setdb(PDO $db) { $this->_db = $db; }



    public function add(Membre $membre) { // Ajouter un membre
      // Verifier s'il n'éxiste pas un membre
      $nom = $membre->getNom(); // On enregistre le nom dans une variable $nom, sinon on obtient une erreur
      $requete = $this->_db->prepare("SELECT COUNT(*) as nombre FROM `Membres` WHERE nom = :nom"); // On compte le nombre d'occurence dans "nombre"
      $requete->bindParam(':nom', $nom);
      $requete->execute();

      $resultat = $requete->fetch(); // On relie les résultats dans un tableau


      if ($resultat['nombre'] == 0) { // Si aucune occurence, on peut ajouter le personnage
        
        $req = $this->_db->prepare("INSERT INTO Membres(nom, MotdePasse, DateInscription, Permission, Faction, Email) VALUES(:nom, :MotdePasse, :DateInscription, :Permission, :Faction, :Email)");
        // Préparer la requête avec les informations correspondantes
        $req->execute(array(
                            ':nom' => $membre->getNom(),
                            ':MotdePasse' => $membre->getMotdePasse(),
                            ':DateInscription' => time(),
                            ':Permission' => 'membre',
                            ':Faction' => $membre->getFaction(),
                            ':Email' => $membre->getEmail()

    ));
    //$error = $req->errorInfo();
    //print_r($error);
        // Executer la requête et enregistrer une possible erreur.
    }
  }
    



    public function delete(Membre $membre) { // suprimmer un personnage
          $nom = $membre->getNom();
          $req = $this->_db->prepare("DELETE FROM `Membres` WHERE nom=:nom");
          $req->bindParam(':nom', $nom);
          $req->execute();
          //$error = $req->errorInfo();
          //print_r($error);
      }
 

    public function update(Membre $membre) { // MAJ des info d'un personnage

       $req = $this->_db->prepare("UPDATE  Membres SET nom = :nom, MotdePasse = :MotdePasse, Permission = :Permission, Faction = :Faction, Email = :Email WHERE nom =:nom");
        // Préparer la requête avec les informations correspondantes
        $req->execute(array(
                            ':nom' => $membre->getNom(),
                            ':MotdePasse' => $membre->getMotdePasse(),
                            ':Permission' => $membre->getPermission(),
                            ':Faction' => $membre->getFaction(),
                            ':Email' => $membre->getEmail()

    ));
        //$error = $req->errorInfo();
        //print_r($error);
      }

    

    public function get($membre) { // recuperer le profil d'un personnage
      // on verifie que le personnage existe bel et bien
     $nom = $membre; // On enregistre le nom dans une variable $nom, sinon on obtient une erreur
      $req = $this->_db->prepare("SELECT * FROM `Membres` WHERE nom = :nom");
      $req->bindParam(':nom', $nom);
      $req->execute();
      $data = $req->fetch(PDO::FETCH_ASSOC);
      return new Membre($data);

      //$error = $req->errorInfo();
      //print_r($error);
      // print_r($data);

       /* Simple code pour verifier le type d'une variable;
       if (is_string($data["niveau"])) { 
          $type = gettype($data["niveau"]); echo $type;

          $niveau = $data['niveau'];
          $type2 = gettype($niveau);
          echo $type2;

           } */
        

      }

      public function ident($login,$password) { // Renvoir TRUE si les données correspondent
        $sha = sha1($password);

        $login_exist = $this->_db->prepare("SELECT COUNT(*) AS nombre FROM `Membres` WHERE login = :login");
        $login_exist->bindParam(":login", $login);
        $login_exist->execute();
        $req = $login_exist->fetch();

        // Verifier l'existence du login dans la bdd
        if ($req['nombre'] == 1) {
             // On récupère le mot de passe du login
          $password_bdd = $this->_db->prepare("SELECT MotdePasse FROM `Membres` WHERE login = :login");
          $req->bindParam(":login", $login);
          $req->execute();

          $paswordd_bdd = $req->fetch();
          if ($password_bdd['MotdePasse'] == $paswordd) { 
          return TRUE;
          }

          // On compare ce mot de passe au mot de passe entré par l'utilisateur




        }


        return FALSE;
      }
    
    public function getlist() { // recuperer la liste de tout les personnages

    }

}




?>