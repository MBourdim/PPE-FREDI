<?php
class Adherent {
    private $id;
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
    public function __construct($id, $num_licence, $code_sexe, $date_naissance, $adresse1, $adresse2, $adresse3, $nom_resp, $prenom_resp, $code_statut) {
        $this->id = $id;
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

    public private get$Id() {
		return this.$id;
	}

	public void set$Id(private $id) {
		this.$id = $id;
	}

	public private get$Num_licence() {
		return this.$num_licence;
	}

	public void set$Num_licence(private $num_licence) {
		this.$num_licence = $num_licence;
	}

	public private get$Code_sexe() {
		return this.$code_sexe;
	}

	public void set$Code_sexe(private $code_sexe) {
		this.$code_sexe = $code_sexe;
	}

	public private get$Date_naissance() {
		return this.$date_naissance;
	}

	public void set$Date_naissance(private $date_naissance) {
		this.$date_naissance = $date_naissance;
	}

	public private get$Adresse1() {
		return this.$adresse1;
	}

	public void set$Adresse1(private $adresse1) {
		this.$adresse1 = $adresse1;
	}

	public private get$Adresse2() {
		return this.$adresse2;
	}

	public void set$Adresse2(private $adresse2) {
		this.$adresse2 = $adresse2;
	}

	public private get$Adresse3() {
		return this.$adresse3;
	}

	public void set$Adresse3(private $adresse3) {
		this.$adresse3 = $adresse3;
	}

	public private get$Nom_resp() {
		return this.$nom_resp;
	}

	public void set$Nom_resp(private $nom_resp) {
		this.$nom_resp = $nom_resp;
	}

	public private get$Prenom_resp() {
		return this.$prenom_resp;
	}

	public void set$Prenom_resp(private $prenom_resp) {
		this.$prenom_resp = $prenom_resp;
	}

	public private get$Code_statut() {
		return this.$code_statut;
	}

	public void set$Code_statut(private $code_statut) {
		this.$code_statut = $code_statut;
	}

    

   

   