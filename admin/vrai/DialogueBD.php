<?php 
 
/*  
* To change this license header, choose License Headers in Project Properties.  
* To change this template file, choose Tools | Templates  
* and open the template in the editor. 
 */ 
 
/**  
* Description of DialogueBD  
*  
* @author christian.vial  
*/ 
require_once ‘Connexion.php’ ; 
class DialogueBD {     
    //put your code here          
    public function getToutesLesAdherents() { 
 
        try {             
            $conn = Connexion::getConnexion();             
            $sql = "SELECT * FROM adherent ";
                         
            $sth = $conn->prepare($sql);             
            $sth->execute();             
            $tabadherents = $sth->fetchAll(PDO::FETCH_ASSOC);             
            return $tabadherents;         } 
            catch (PDOException $e) {             
                $erreur = $e->getMessage();         
            }     
        } 
    }