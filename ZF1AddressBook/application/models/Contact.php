<?php

class Application_Model_Contact
{
    protected $id;
    protected $prenom;
    protected $nom;
    protected $email;
    protected $telephone;
    
    public function getId() {
        return $this->id;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getTelephone() {
        return $this->telephone;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setPrenom($prenom) {
        $this->prenom = $prenom;
        return $this;
    }

    public function setNom($nom) {
        $this->nom = $nom;
        return $this;
    }

    public function setEmail($email) {
        $this->email = $email;
        return $this;
    }

    public function setTelephone($telephone) {
        $this->telephone = $telephone;
        return $this;
    }



}

