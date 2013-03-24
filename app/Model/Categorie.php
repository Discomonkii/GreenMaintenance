<?php

class Categorie extends AppModel{

var $name = 'Categorie';
var $hasMany = array('Materiel'=>array('className' => 'Materiel',
'foreignKey'=> 'categorie_id'));
var $displayField = 'nom';
	
}

?>