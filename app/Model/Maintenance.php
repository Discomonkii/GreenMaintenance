<?php
     
class Maintenance extends AppModel{
     
    var $name = 'Maintenance';

	public $actsAs = array(
		'Containable',
		'Media.Media' => array(
		  // Ici vous pouvez sp�cifier des options
		)
	); 
	
	public $hasMany = array(
		'MaintenancesMateriel'
	);
	
	public $validate = array(
        'nom' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Veuillez pr�ciser un nom'
            )
        )
    );
     
}
     
?>