<?php

class Alerte extends AppModel {
    public $belongsTo = array(
        'Maintenance', 'Materiel'
    );
}

?>