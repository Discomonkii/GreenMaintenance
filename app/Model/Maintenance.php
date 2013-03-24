<?php
     
class Maintenance extends AppModel{
     
    var $name = 'Maintenance';

	public $actsAs = array(
		'Containable',
		'Media.Media' => array(
		  // Ici vous pouvez spécifier des options
		)
	); 
	
	public $hasMany = array(
		'MaintenancesMateriel'
	);
	
	public $validate = array(
        'nom' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Veuillez préciser un nom'
            )
        )
    );
     
}
     
?>