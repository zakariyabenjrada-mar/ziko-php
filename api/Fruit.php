<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Fruit
 *
 * @author pc
 */
class Fruit {
    // declaration des attributs :
    private $id,$nom,$prix_unitaire,$photo;
    
	
	

            // constructeur ;
    function __construct($id,$nom, $prix_unitaire, $photo) {
        $this->id = $id;
        $this->nom = $nom;
        $this->prix_unitaire = $prix_unitaire;
        $this->photo = $photo;
    }
	
	
	
	
	function getId() {
        return $this->id;
    }
    function setId($id) {
        $this->id = $id;
    }
    function getNom() {
        return $this->nom;
    }

    function getPrix_unitaire() {
        return $this->prix_unitaire;
    }

    function getPhoto() {
        return $this->photo;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }

    function setPrix_unitaire($prix_unitaire) {
        $this->prix_unitaire = $prix_unitaire;
    }

    function setPhoto($photo) {
        $this->photo = $photo;
    }


    
    
    
}
