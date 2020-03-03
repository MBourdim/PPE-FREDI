<?php
class Adherent {
    private $id_adherent;
    private $num_licence;
    private $code_sexe;
    private $date_naissance;
    private $adresse1;
    private $adresse2;
    private $adresse3;
    private $nom_resp;
    private $prenom_resp;
    private $code_statut;

 //constructeur
    public function __construct($id_adherent, $num_licence, $code_sexe, $date_naissance, $adresse1, $adresse2, $adresse3, $nom_resp, $prenom_resp, $code_statut) {
        $this->id_adherent = $id_adherent;
        $this->num_licence = $num_licence;
        $this->code_sexe = $code_sexe;
        $this->date_naissance = $date_naissance;
        $this->adresse1 = $adresse1;
        $this->adresse2 = $adresse2;
        $this->adresse3 = $adresse3;
        $this->nom_resp = $nom_resp;
        $this->prenom_resp = $prenom_resp;
        $this->code_statut = $code_statut;
    }

    public function getId_adherent(){
		return $this->id_adherent;
	}

	public function setId_adherent($id_adherent){
		$this->id_adherent = $id_adherent;
	}

	public function getNum_licence(){
		return $this->num_licence;
	}

	public function setNum_licence($num_licence){
		$this->num_licence = $num_licence;
	}

	public function getCode_sexe(){
		return $this->code_sexe;
	}

	public function setCode_sexe($code_sexe){
		$this->code_sexe = $code_sexe;
	}

	public function getDate_naissance(){
		return $this->date_naissance;
	}

	public function setDate_naissance($date_naissance){
		$this->date_naissance = $date_naissance;
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

	public function getNom_resp(){
		return $this->nom_resp;
	}

	public function setNom_resp($nom_resp){
		$this->nom_resp = $nom_resp;
	}

	public function getPrenom_resp(){
		return $this->prenom_resp;
	}

	public function setPrenom_resp($prenom_resp){
		$this->prenom_resp = $prenom_resp;
	}

	public function getCode_statut(){
		return $this->code_statut;
	}

	public function setCode_statut($code_statut){
		$this->code_statut = $code_statut;
	}  

}   