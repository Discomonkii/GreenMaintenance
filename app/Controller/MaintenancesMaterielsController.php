<?php

// app/Controller/MaintenancesMaterielsController.php
class MaintenancesMaterielsController extends AppController{

	var $name="MaintenancesMateriel";

	public $belongsTo = array('Materiel','Maintenance');

	
	function editM($id){
		if($this->request->is('put')||$this->request->is('post')){
			$this->MaintenancesMateriel->id = $id;
			$this->MaintenancesMateriel->save($this->request->data);
			$this->Session->setFlash("Les modifications ont été enregistrées","notif");
			$id = $this->request->data['MaintenancesMateriel']['materiel_id'];
			$this->redirect(array('controller' => 'materiels', 'action' => 'view',$id));

		}else{
			$this->MaintenancesMateriel->id = $id;
			$this->request->data = $this->MaintenancesMateriel->read();
			
		}
	}
	
	
	function revision($id,$duree,$compteur) {
		$this->MaintenancesMateriel->id = $id;
		$total=$duree+$compteur;
		$this->MaintenancesMateriel->savefield('alerte',$total);
		$this->Session->setFlash('La maintenance id: '.$id.' a été supprimée.',"notif");
		$this->MaintenancesMateriel->contain('Materiel');
		$id = $this->MaintenancesMateriel->Materiel->id;
		$this->redirect(array('controller' => 'materiels', 'action' => 'view',$id));



	}
	
}


?>