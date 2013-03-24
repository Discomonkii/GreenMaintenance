<?php

// app/Controller/CategoriesController.php
class CategoriesController extends AppController{

	var $name="Categorie";
	
	
	var $paginate = array(
		'limit' => 20,
		'order' => array(
		'Categorie.nom' => 'asc'
		)
	); 
	

	function index(){
   		 $data = $this->paginate('Categorie');
   		 $this->set('data', $data);	 
	}
	
	
	function edit($id){
		if($this->request->is('put')||$this->request->is('post')){
			$this->Categorie->save($this->request->data);
			$this->Session->setFlash("Les modifications ont été enregistrées","notif");
			$this->redirect(array('action'=>'index'));
			
		}else{
			$this->Categorie->id = $id;
			$this->request->data = $this->Categorie->read();	
		}
	}
	
	
	function add(){
		if (!empty($this->data)) {
			if ($this->Categorie->save($this->data)) {
				$this->Session->setFlash('La catégorie a été ajoutée.',"notif");
				$this->redirect(array('action' => 'index'));		
			}
		}
	}
	
	
	function delete($id){
		$this->Categorie->delete($id);
		$this->Session->setFlash('La catégorie id: '.$id.' a été supprimée',"notif");
		$this->redirect(array('action'=>'index'));
	}
	
	
	function view($id) { 
		$this->Categorie->id = $id;
		$this->set('categorie', $this->Categorie->read());	
	}

}
?>