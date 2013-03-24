
<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header well" data-original-title>
			<h2><i class="icon-edit"></i> Ajouter une Maintenance</h2>
			</div>
		<div class="box-content">
		
								  <fieldset>
							<legend>Ajouter une maintenance dans votre base de données</legend>

<?php echo $this->Form->create('Maintenance'); ?>
<?php echo $this->Form->input('nom',array('label'=>"Nom : ")); ?>
<?php echo $this->Form->input('compteur',array('label'=>"Entretien toutes les (nb heures) : ")); ?>
<br>
<?php echo $this->Form->input('resume',array('label'=>"Maintenance à faire en 3-4 mots : ")); ?>
<?php	echo "Description détaillée";
	    echo $this->Tinymce->input('Maintenance.condition', array(
            'label' => ''
            ),array(
                'language'=>'en'
            )
        );  
?>		
			

<br>

<div class="form-actions">
<?php echo $this->Form->end('Ajouter', array('escape'=>true,'class'=>"btn btn-primary")); ?>
</div>
						 
			
	</div><!--/span-->

</div>