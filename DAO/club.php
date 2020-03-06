<?php
class Club {
    private $id_club;
    private $libelle;
    private $adresse1;
    private $adresse2;
    private $adresse3;
    private $id_ligue;
    private $id_utilisateur;

 //constructeur
    public function __construct(array $row) {
        $this->id_club = $row['id_club'];
        $this->libelle = $row['libelle'];
        $this->adresse1 = $row['adresse1'];
        $this->adresse2 = $row['adresse2'];
        $this->adresse3 = $row['adresse3'];
        $this->id_ligue = $row['id_ligue'];
        $this->id_utilisateur = $row['id_utilisateur'];
    }

    public function getId_club(){
		return $this->id_club;
	}

	public function setId_club($id_club){
		$this->id_club = $id_club;
	}

	public function getLibelle(){
		return $this->libelle;
	}

	public function setLibelle($libelle){
		$this->libelle = $libelle;
	}

	public function getAdresse1(){
		return $this->adresse1;
	}

	public function setAdresse1($adresse1){
		$this->adresse1 = $adresse1;
	}

	public function getAdresse2(){
		return $this->adresse2;
	}

	public function setAdresse2($adresse2){
		$this->adresse2 = $adresse2;
	}

	public function getAdresse3(){
		return $this->adresse3;
	}

	public function setAdresse3($adresse3){
		$this->adresse3 = $adresse3;
	}

	public function getId_ligue(){
		return $this->id_ligue;
	}

	public function setId_ligue($id_ligue){
		$this->id_ligue = $id_ligue;
	}

	public function getId_utilisateur(){
		return $this->id_utilisateur;
	}

	public function setId_utilisateur($id_utilisateur){
		$this->id_utilisateur = $id_utilisateur;
    }
    
}
