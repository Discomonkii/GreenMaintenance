<?php

echo "<h2>Pictures</h2>";
	echo $this->Form->create('Materiel',array('action' => 'upload'));
	echo $this->Upload->edit('Materiel',$this->request->data['Materiel']['id']);
	
?>