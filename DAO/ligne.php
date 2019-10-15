<?php
class Ligne {
    private $date_frais;
    private $lib_trajet;
    private $cout_peage;
    private $cout_repas;
    private $cout_hebergement;
    private $nb_km;
    private $total_ligne;
    private $code_statut;
    private $id_motif;
    private $annee;
    private $id_note;

    //Constructeur
    public function __construct(array $row) {
        $this->date_frais = $row['date_frais'];
        $this->lib_trajet = $row['forfait_km'];
        $this->cout_peage = $row['code_statut'];
    }

    //Get date_frais
    public function getDate_frais() {
        return $this->date_frais;
    }

    //Set date_frais
    public function setDate_frais($date_frais) {
        $this->date_frais = $date_frais;
    }

    //Get tarif
    public function getLib_trajet() {
        return $this->lib_trajet;
    }

    //Set tarif
    public function setLib_trajet($lib_trajet) {
        $this->lib_trajet = $lib_trajet;
    }

    //Get code statut
    public function getCout_peage() {
        return $this->cout_peage;
    }

    //Set code statut
    public function setCout_peage($cout_peage) {
        $this->cout_peage = $cout_peage;
    }
}