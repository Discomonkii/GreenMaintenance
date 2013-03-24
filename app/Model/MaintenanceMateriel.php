<?php

class MaintenanceMateriel extends AppModel{

	public $useTable = "maintenances_materiels";
	
	public $actAs = array('containable');
	public $belongsTo = array('Maintenance','Materiel');

}

?>