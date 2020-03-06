<?php
class Ligue {
    private $id_ligue;
    private $libelle;
    private $adresse1;
    private $adresse2;
    private $adresse3;

 //constructeur
    public function __construct(array $row) {
        $this->id_ligue = $row['id_ligue'];
        $this->libelle = $row['libelle'];
        $this->adresse1 = $row['adresse1'];
        $this->adresse2 = $row['adresse2'];
        $this->adresse3 = $row['adresse3'];
    }

    public function getId_ligue(){
		return $this->id_ligue;
	}

	public function setId_ligue($id_ligue){
		$this->id_ligue = $id_ligue;
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

}
