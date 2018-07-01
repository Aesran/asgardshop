<?php
// Classe représentant un membre du site

// Attributs
class Membre {

	// Déclaration des attributs de ma classe
	private $_id;
	private $_Nom;
	private $_Email;
	private $_MotdePasse;
	private $_DateInscription;
	private $_Permission; // L'utilisateur peut être membre lambda ou administrateur
	private $_Faction; // Faction IG de l'utilisateur

	// ################  Getter

	public function getId() { return $this->_Id; }
	public function getNom() { return $this->_Nom; }
	public function getEmail() { return $this->_Email; }
	public function getMotdePasse() { return $this->_MotdePasse; }
	public function getDateInscription() { return $this->_DateInscription; }
	public function getPermission() { return $this->_Permission; }
	public function getFaction() { return $this->_Faction; }


	// ############### Construction de l'objet

	public function __construct($data) {
		$this->hydrate($data);

	}

	// ################   Setter
	// On les utilise pour mettre à jour la valeur d'un attribut
	// Tout en vérifiant que la valeur correspond bien à ce qui est attendu

	public function setId($id) {

		$id = (int) $id; // On transforme $id en entier
		if($id > 0) { // L'ID dois être positif
		$this->_id = $id;
	}

	}


	public function setNom($nom) {

		$nom = (string) $nom;
		if(strlen($nom) > 3 && strlen($nom) < 30) { // Si le nom fait entre 3 et 30 charactères
			$this->_Nom = $nom;

		}

	}

	public function setEmail($email) {
		// Verifier qu'il s'agit bien d'un e-mail valide (regex)
	// A completer en dernier, il s'agit d'un point de difficulté
		$regex = '#^[a-z0-9_.-]+\@[a-z0-9_.-]{2,}\.(com|fr|net|info|de|uk)$#';
		if (preg_match($regex,$email)) { // On vérifie qu'on a bien une adresse au format Nom + @ + nom du hosteur + .com/.fr etc ...
		$this->_Email = $email;
		}
		
	}

	public function setMotdePasse($passe) {
		// Verifier la longueur
		$passe = (string) $passe;
		if(strlen($passe) > 3) {
			$this->_MotdePasse = sha1($passe);
		}

	}

	public function setDateInscription($date) {
		// Verifier qu'il s'agit d'une date / timestamp, ou au pire d'un int positif

		$date = (int) $date;
		if ($date > 0) { // Si $date est un nombre positif
			$this->_DateInscription = $date;

		}
	}

	public function setPermission($permission) {
		//Verifier que la permission est conforme : sois "admin" sois "membre"
		$perm = (string) $permission;

		if ($perm == 'admin' || $perm == 'membre') { // Si on modifie bien sois pour un admin, sois pour un membre
			$this->_Permission = $perm;
		}
	}

	public function setFaction($faction) {
		// Verifier que c'est une chaine de caractère
		// Verifier le nombre de charactère au minimum
		$faction = (string) $faction;
		if (strlen($faction) > 3 && strlen($faction) < 50) { //Si le nom de faction fait entre 3 et 50 caractères
			$this->_Faction = $faction;
		}

	}


	public function hydrate(array $data) {
	
		foreach($data as $key => $var) {
			$method = 'set' . $key;

			if(method_exists($this, $method)) {
				$this->$method($var);
			}
		}	


	}


}






?>