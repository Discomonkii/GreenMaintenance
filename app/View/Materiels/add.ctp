
<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header well" data-original-title>
			<h2><i class="icon-edit"></i> Ajouter un Matériel</h2>
			</div>
		<div class="box-content">
		
								  <fieldset>
							<legend>Ajouter un matériel dans votre base de données</legend>

<?php echo $this->Form->create('Materiel'); ?>
<?php echo $this->Form->input('nom',array('label'=>"Nom : ")); ?>
<?php echo $this->Form->input('modele',array('label'=>"Modele : ")); ?>
<?php echo $this->Form->input('serie', array('label' => 'Numéro de série', 'type' => 'text')); ?>
<?php echo $this->Form->input('duree_utilisation', array('label' => 'Compteur d heures', 'type' => 'int','default'=>'0')); ?>
 
<?php //echo $this->Form->select('nom',$categories); ?>


<?php echo $this->Form->input('categorie_id', array('type' => 'select', 'options' => $categories, 'empty' => false)); ?>


<br>
<?php	echo "Description";
	    echo $this->Tinymce->input('Materiel.description', array(
            'label' => ''
            ),array(
                'language'=>'en'
            )
        );  
?>		
<br><br>	
<?php	
echo $this->Form->input('date_acquisition', array( 'label' => 'Date d acquisition',
                                       'type'=>'date',
                                       'dateFormat'=> 'DMY',
                                       'minYear' => date('Y') - 20,
                                       'maxYear' => date('Y') + 20 ));

?>
<br>
<?php // echo $this->Uploader->iframe('Materiels',$this->request->date['Materiel']['id']); ?>

<div class="form-actions">
<?php echo $this->Form->end('Ajouter', array('escape'=>true,'class'=>"btn btn-primary")); ?>
</div>
						 
			
	</div><!--/span-->

</div>