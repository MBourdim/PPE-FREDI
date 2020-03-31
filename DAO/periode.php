<?php
class Periode {
    private $annee;
    private $tarifKm;
    private $codeStatut;

    //Constructeur
    public function __construct(array $row) {
        $this->annee = $row['annee'];
        $this->tarifKm = $row['forfait_km'];
        $this->codeStatut = $row['code_statut'];
    }

    //Get annee
    public function getAnnee() {
        return $this->annee;
    }

    //Set annee
    public function setAnnee($annee) {
        $this->annee = $annee;
    }

    //Get tarif
    public function getTarif() {
        return $this->tarifKm;
    }

    //Set tarif
    public function setTarif($tarifKm) {
        $this->tarifKm = $tarifKm;
    }

    //Get code statut
    public function getCodeStatut() {
        return $this->codeStatut;
    }

    //Set code statut
    public function setCodeStatut($codeStatut) {
        $this->codeStatut = $codeStatut;
    }
}