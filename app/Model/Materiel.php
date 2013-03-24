<?php

class Materiel extends AppModel{

	var $name = 'Materiel';
    var $belongsTo = array ('Categorie' => array(
							'className' => 'Categorie',
							'foreignKey'=>'categorie_id'));

	public $hasAndBelongsToMany = array('Maintenance');
	
	public $hasMany = array(
		'MaintenanceMateriel'
		);

	public $actsAs = array(
		'Containable',
		'Media.Media' => array(
		  // Ici vous pouvez spécifier des options
		)
	); 
	
	public $validate = array(
        'nom' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Veuillez préciser un nom'
            )
        )
    );
	
	public function afterSave(){
		if(!empty($this->data['Materiel']['maintenances'])){
		$maintenances = explode(',',$this->data['Materiel']['maintenances']);
			foreach($maintenances as $maintenance){
				$maintenance = trim($maintenance);
				if(!empty($maintenance)){
					$d = $this->Maintenance->findByNom($maintenance);
					if(!empty($d)){
						$this->Maintenance->id = $d['Maintenance']['id'];
					}else{
					$this->Maintenance->create();
					$this->Maintenance->save(array(
						'nom' => $maintenance
						));
					}
					$this->MaintenanceMateriel->create();
					$duree = $this->data['Materiel']['duree_utilisation'];
					$compteur= $d['Maintenance']['compteur'];
					$alerte=$duree+$compteur;
					$this->MaintenanceMateriel->save(array(
						'materiel_id' => $this->id,
						'maintenance_id'=> $this->Maintenance->id,
						'alerte' => $alerte
					));
				}
			}
			return true;
		}
	}

}

?>