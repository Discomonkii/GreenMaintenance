<?php

// app/Controller/MaintenancesController.php
class MaintenancesController extends AppController{

	var $name="Maintenances";
	
	
	var $paginate = array(
		'limit' => 20,
		'order' => array(
		'Maintenance.compteur' => 'asc'
		)
	); 
	

	function index(){
   		 $data = $this->paginate('Maintenance');
   		 $this->set('data', $data);
		 
	}
	
	function edit($id){
		if($this->request->is('put')||$this->request->is('post')){
				$this->Maintenance->id = $id;
				$this->Maintenance->save($this->request->data);
				$this->Session->setFlash("Les modifications ont été enregistrées","notif");
				$this->redirect(array('action'=>'index'));
		}else{
			$this->Maintenance->id = $id;
			$this->request->data = $this->Maintenance->read();
		}
	}
	
	function add(){
		if (!empty($this->data)) {
		$d=$this->request->data;
			if($this->Maintenance->save($this->data)){
				$this->Session->setFlash('La maintenance a été ajoutée.',"notif");
				$this->redirect(array('action' => 'index'));
			}
		}
	}
	
	function delete($id){
		$this->Maintenance->delete($id);
		$this->Session->setFlash('La maintenance id: '.$id.' a été supprimée',"notif");
		$this->redirect(array('action'=>'index'));

	}
	
	function view($id){
		$this->Maintenance->id = $id;
		$this->set('maintenance', $this->Maintenance->read());
		
	}









}


?>