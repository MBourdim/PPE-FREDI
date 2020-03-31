<?php
class note{
    private $date_remise;
    private $total;
    private $code_statut;
    private $id_utilisateur;

    //Constructeur
    public function __construct(array $row){
        $this->date_remise = $row['date_remise'];
        $this->total = $row['total'];
        $this->code_statut = $row['code_statut'];
        $this->id_utilisateur = $row['id_utilisateur'];
    }

    //Get date_remise
    public function getDate_remise(){
        return $this->date_remise;
    }

    //Set date_remise
    public function setDate_remise($date_remise){
        $this->date_remise = $date_remise;
    }

    //Get total
    public function getTotal(){
        return $this->total;
    }

    //Set total
    public function setTotal($total){
        $this->total = $total;
    }

    //Get code_statut
    public function getCode_statut(){
        return $this->code_statut;
    }

    //Set code_statut
    public function setCode_statut($code_statut){
        $this->code_statut = $code_statut;
    }

    //Get id_utilisateur
    public function getId_utilisateur(){
        return $this->id_utilisateur;
    }

    //Set id_utilisateur
    public function setId_utilisateur($id_utilisateur){
        $this->id_utilisateur = $id_utilisateur;
    } 
}

?>