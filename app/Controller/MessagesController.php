<?php

// app/Controller/MessagesController.php
class MessagesController extends AppController{

	var $name="Messages";
	
	
	var $paginate = array(
		'limit' => 20,
		'order' => array(
		'Message.date' => 'asc'
		)
	); 
	
	
	function beforeSave(){ 
		$Date = new stdClass; 
		$Date->type = 'expression'; 
		$Date->value = 'now()'; 
		$this->data['Message']['date'] = $Date; 
	} 


	function index(){
   		 $data = $this->paginate('Message');
   		 $this->set('data', $data);
		 
	}
	
	function edit($id){
		if($this->request->is('put')||$this->request->is('post')){
			$this->data['Message']['date'] = date('Y-m-d H:i:s');
			$this->Message->save($this->request->data);
				$this->Session->setFlash("Les modifications ont été enregistrées","notif");
				$this->redirect(array('action'=>'index'));
		}else{
			$this->Message->id = $id;
			$this->request->data = $this->Message->read();
		}
	}
	
	function add() {
		if (!empty($this->data)) {
		$d=$this->request->data;
		$d['Message']['date'] = date('Y-m-d H:i:s');
			if($this->Message->save($d,true,array('titre','message','date','utilisateur_id'))){
				$this->Session->setFlash('Le message a été ajouté.',"notif");
				$this->redirect(array('action' => 'index'));
			}
		}
	}
	
	function delete($id){
		$this->Message->delete($id);
		$this->Session->setFlash('Le message id: '.$id.' a été supprimé',"notif");
		$this->redirect(array('action'=>'index'));

	}
	
	function view($id) {
		$this->Message->id = $id;
		$this->set('message', $this->Message->read());
		
	}









}


?>