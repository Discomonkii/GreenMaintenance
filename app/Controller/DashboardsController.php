<?php

// app/Controller/DashboardsController.php
class DashboardsController extends AppController{

	var $name="Dashboards";
	var $uses = array('Message','Materiel','User','MaintenancesMateriel','Maintenance');

	function index()
	{

		$messages = $this->Message->find('all');
		$materiels = $this->Materiel->find('all');
		
		$totalmateriels = $this->Materiel->find('count');
		$this->set('totalmateriels', "$totalmateriels");
			
		$totalmessages = $this->Message->find('count');
		$this->set('totalmessages', "$totalmessages");
		
		$totalalertes = $this->MaintenancesMateriel->find('count');
		$this->set('totalalertes', "$totalalertes");
		
		$totalusers = $this->User->find('count');
		$this->set('users', "$totalusers");
		
		$dernierCree = $this->Message->find('all', array(
        'order' => array('Message.date' => 'desc'),
		'limit' => 3
		));
		$this->set('dernierCree', $dernierCree);
		
		$derniersM = $this->Materiel->find('all', array(
        'order' => array('Materiel.id' => 'desc'),
		'limit' => 10
		));
		$this->set('derniersM', $derniersM);
		
		$maintenances = $this->Maintenance->find('all', array(
        'order' => array('Maintenance.id' => 'desc'),
		'limit' => 10
		));
		$this->set('maintenances', $maintenances);
	
	}
	


}


?>