



<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header well" data-original-title>
			<h2><i class="icon-edit"></i> <?php echo $maintenance['Maintenance']['nom']; ?></h2>
			</div>
		<div class="box-content">
		
								  <fieldset>
							<legend><?php  echo "Entretien après une utilisation de ".$maintenance['Maintenance']['compteur']." heures.";?></legend>
							
							<b>Révision à effectuer :</b> <?php echo $maintenance['Maintenance']['resume']; ?>
							</br></br>
<b>Révision détaillée :</b></br></br>
<?php echo $maintenance['Maintenance']['condition']; ?>

<div class="form-actions">
		<?php echo $this->Html->link($this->Html->image("list.png", array("alt" => "Liste")), "/maintenances/", array('escape'=>false,'class'=>"first"));?>

		<?php echo $this->Html->link($this->Html->image("delete.png", array("alt" => "Delete")), "/maintenances/delete/{$maintenance['Maintenance']['id']}", array('escape'=>false,'class'=>"first"), 'Are you sure ?');?>

		<?php echo $this->Html->link($this->Html->image("edit.png", array("alt" => "Edit")), '/maintenances/edit/'.$maintenance['Maintenance']['id'], array('escape'=>false,'class'=>"first"));?>

</div>
						 
			
	</div><!--/span-->

</div>