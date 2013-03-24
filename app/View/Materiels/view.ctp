<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header well" data-original-title>
			<h2><i class="icon-edit"></i> <?php echo $materiel['Materiel']['nom']; ?></h2>
			</div>
		<div class="box-content">
		
								  <fieldset>
							<legend><?php  echo "Acquisition le ".date('d.m.Y', strtotime($materiel['Materiel']['date_acquisition']));?></legend>
<?php 
if(isset($materiel['Materiel']['thumb'])):
echo $this->Html->image($materiel['Materiel']['thumb']);
endif;
?>
<br>
<?php echo 'Numéro de série : ';
echo $materiel['Materiel']['serie']; ?>
<?php echo $materiel['Materiel']['description']; ?>
<br>
<legend>Maintenance /<?php echo '   Compteur : '.$materiel['Materiel']['duree_utilisation'].' heures'; ?></legend>

<table class="table table-bordered table-striped">
    <tr>
		<th>Nom</th>
		<th>Révision toutes les (Heures)</th>
		<th>Prochaine révision (Heures)</th>
		<th>A Effectuer</th>
		<th>Révision faite</th>
		<th>Actions</th>		
	</tr>
<?php 	 
foreach($materiel['Maintenance'] as $m): ?>
<tr>
    <td>
        
	<?php echo $this->Html->link($m['nom'],array('controller' => 'maintenances', 'action' => 'view', $m['id'])); ?>

    </td>
    <td>
        <?php echo $m['compteur']; ?>
    </td>
	<td>
        <?php echo $m['MaintenancesMateriel']['alerte']; ?>
    </td>
	<td>
        <?php  
		if($materiel['Materiel']['duree_utilisation']>=$m['MaintenancesMateriel']['alerte'])
		echo $m['resume'];

	

		?>
    </td>
	<td>
        <?php  
		if($materiel['Materiel']['duree_utilisation']>=$m['MaintenancesMateriel']['alerte'])
			
			echo $this->Html->link($this->Html->image("alerte.png", array("alt" => "Delete")), "/materiels/revision/{$m['MaintenancesMateriel']['id']}/{$materiel['Materiel']['duree_utilisation']}/{$m['compteur']}/{$materiel['Materiel']['id']}", array('escape'=>false,'class'=>"first"));			

		else
			echo $this->Html->image("ok.png", array("alt" => "ok"));

		?>
    </td>
	<td>
		<?php echo $this->Html->link($this->Html->image("edit.png", array("alt" => "Delete")), "/materiels/editM/{$m['MaintenancesMateriel']['id']}", array('escape'=>false,'class'=>"first"));?>
		<?php echo $this->Html->link($this->Html->image("delete.png", array("alt" => "Delete")), "/materiels/deleteMaintenance/{$m['MaintenancesMateriel']['id']}", array('escape'=>false,'class'=>"first"), 'Etes vous sûr de vouloir le supprimer?');?>
    </td>
</tr>
<?php 
endforeach
?>
</table>
<div class="form-actions">
		<?php echo $this->Html->link($this->Html->image("list.png", array("alt" => "Liste")), "/materiels/", array('escape'=>false,'class'=>"first"));?>

		<?php echo $this->Html->link($this->Html->image("delete.png", array("alt" => "Delete")), "/materiels/delete/{$materiel['Materiel']['id']}", array('escape'=>false,'class'=>"first"), 'Are you sure ?');?>

		<?php echo $this->Html->link($this->Html->image("edit.png", array("alt" => "Edit")), '/materiels/edit/'.$materiel['Materiel']['id'], array('escape'=>false,'class'=>"first"));?>

</div>
						 
			
	</div><!--/span-->

</div>