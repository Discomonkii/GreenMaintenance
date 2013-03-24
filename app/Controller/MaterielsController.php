<?php


	App::import('Controller', 'Categories');
	App::import('Controller', 'Maintenances');
	App::import('Controller', 'MaintenancesMateriel');

// app/Controller/MaterielsController.php
class MaterielsController extends AppController{

	var $name="Materiels";
	var $useTable = array('materiels','categories','maintenances','maintenances_materiels');
	var $uses = array('Categorie','Materiel','Maintenance','MaintenancesMateriel');
	
	
	var $paginate = array(
		'limit' => 20,
		'order' => array(
		'Materiel.id' => 'desc'
		)
	);

	public $belongsTo = array(
        'Categorie' => array(
            'className'    => 'Categorie',
            'foreignKey'   => 'Categorie_id'
        )
    );
	
	
	function index(){
   		 $data = $this->paginate('Materiel');
   		 $this->set('data', $data);

	}
	
	
	function view($id) {
		$this->Materiel->id = $id;
		$this->set('maintenance', $this->Materiel->Maintenance->read());
		$this->set('materiel', $this->Materiel->read());

	}
	


	
	function edit($id){
		$this->helpers[] = 'Media.Uploader';
		if($this->request->is('put')||$this->request->is('post')){
			$this->Materiel->id = $id;
			$materiel = $this->Materiel->read();
			$du = $this->request->data['Materiel']['test'];
			$total = $materiel['Materiel']['duree_utilisation'];
			$this->Materiel->save($this->request->data);
			$total+=$du;
			$this->Materiel->savefield('duree_utilisation',$total);
				$this->Session->setFlash("Matériel mis à jour","notif");
				$this->redirect(array('action'=>'index'));
		}else{
			$this->Materiel->id = $id;
			$this->request->data = $this->Materiel->read();
		}
	}
	
	

	function add(){
		$this->helpers[] = 'Media.Uploader';
		$categories = $this->Materiel->Categorie->find('list');
		$this->set('categories', $categories);					
		if (!empty($this->data)) {
			$d=$this->request->data;
			if ($this->Materiel->save($this->data)) {
				$this->Session->setFlash('Le matériel a bien été enregistré',"notif");
				$this->redirect(array('action' => 'index'));
			}
		}
	}

	function delete($id){
		$this->Materiel->delete($id);
		$this->Session->setFlash('The product with id: '.$id.' has been deleted.',"notif");
		$this->redirect(array('action'=>'index'));

	}
	

	function displayAlerts($id){
		$alertes = $this->Materiel->find('list',array(
		'contain'=>array(
		'Maintenance')));
		$this->set('alertes', $alertes);

	}

	function deleteMaintenance($id) {
		$this->Materiel->MaintenanceMateriel->delete($id);
		$this->Session->setFlash('La maintenance id: '.$id.' a été supprimée.',"notif");
		$this->redirect($this->referer());


	}


	function viewM($id){
		$this->Materiel->MaintenancesMateriel->id = $id;
		$this->set('maintenancemateriel', $this->Materiel->MaintenanceMateriel->read());

	}
	
	function editM($id){
	$this->loadModel('MaintenancesMateriel');
		if($this->request->is('put')||$this->request->is('post')){
			$d = $this->request->data;
			$this->Materiel->MaintenancesMateriel->id = $id;
			$this->Materiel->MaintenancesMateriel->save($d);
			$this->Session->setFlash("Les modifications ont été enregistrées","notif");
		}else{
			$this->Materiel->MaintenancesMateriel->id=$id;
			$this->request->data = $this->Materiel->MaintenancesMateriel->read();
			
		}
	}
	
	function revision($id,$duree,$compteur,$id2) {
		$this->Materiel->contain('MaintenancesMateriel');
		$this->Materiel->MaintenancesMateriel->id=$id;
		$total=$duree+$compteur;
		$this->Materiel->MaintenancesMateriel->savefield('alerte',$total);
		$this->Session->setFlash('La maintenance id: '.$id.' a été supprimée.',"notif");
		$this->redirect(array('controller' => 'materiels', 'action' => 'view',$id2));
		
	}
	

}
?>