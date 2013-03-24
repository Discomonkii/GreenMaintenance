<?php $m = $this->request->data; ?>


<div class="row-fluid sortable">

	<div class="box span12">
	
		<div class="box-header well" data-original-title>
		
			<h2><i class="icon-edit"></i> Editer la maintenance</h2>

			</div>
		<div class="box-content">
				  
							<legend>Editez, modifiez les données de cette mainenance dans votre base de données.</legend>
    <?php
	
		echo $this->Form->create('MaintenancesMateriel',array('action' => 'editM'));
        echo $this->Form->input('alerte',array("label" => "Entretien toutes les (nb Heures): "));
		echo $this->Form->input('materiel_id', array('type' => 'hidden') );
		echo $this->Form->input('statut',array("label" => "Statut"));

	?>		
		

<div class="form-actions">
<?php echo $this->Form->end('Mettre à jour', array('escape'=>false,'class'=>"btn btn-primary")); ?>
</div>
						 

			</div>
			
	</div><!--/span-->

</div>