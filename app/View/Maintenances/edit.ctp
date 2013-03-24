<?php $mainenance = $this->request->data; ?>

<div class="row-fluid sortable">

	<div class="box span12">
	
		<div class="box-header well" data-original-title>
		
			<h2><i class="icon-edit"></i> Editer la maintenance</h2>

			</div>
		<div class="box-content">
				  
							<legend>Editez, modifiez les données de cette mainenance dans votre base de données.</legend>
    <?php
	
		echo $this->Form->create('Maintenance',array('action' => 'edit'));
        echo $this->Form->input('nom',array("label" => "Nom"));
		echo $this->Form->input('id');
		echo $this->Form->input('compteur',array('label'=>"Entretien toutes les (nb heures) : ")); 
		echo '<br>';
echo $this->Form->input('resume',array('label'=>"Maintenance à faire en 3-4 mots : ")); 
	
echo "Description";
	    echo $this->Tinymce->input('Maintenance.condition', array(
            'label' => ''
            ),array(
                'language'=>'en'
            )
        );  
?>		
		

<div class="form-actions">
<?php echo $this->Form->end('Mettre à jour', array('escape'=>false,'class'=>"btn btn-primary")); ?>
</div>
						 

			</div>
			
	</div><!--/span-->

</div>