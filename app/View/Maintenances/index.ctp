
<h1>Maintenances</h1>
<br>
			<div>
				<ul class="breadcrumb">
<?php echo $this->Html->link($this->Html->image("add.png", array("alt" => "Add_Message")), "/maintenances/add/", array('escape'=>false,'class'=>"first"));?>
<?php echo $this->Html->link('Ajouter une maintenance', array( 'controller' => 'maintenances', 'action'=> 'add','admin'=>false)); ?>
				</ul>
			</div>
<br>

<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header well" data-original-title>
			<h2><i class="icon-edit"></i> Liste des Maintenances</h2>

			</div>
		<div class="box-content">
		
		<form class="form-horizontal">
								  <fieldset>
							<legend>Maintenances enregistrées dans votre base de données</legend>

<table class="table table-bordered table-striped">

    <tr>
		<th></th>
		<th><?php echo $this->Paginator->sort('id', 'Id'); ?></th>
		<th>Nom</th>
		<th>Entretien</th>
        <th>Compteur</th>
		<th>Actions</th>
		
    </tr>

    <!-- Here is where we loop through our $posts array, printing out post info -->

    <?php foreach ($data as $maintenance): ?>
	
    <tr>
		<td><?php echo $this->Form->input("", array("type" => "checkbox")); ?></td>
        <td><?php echo $maintenance['Maintenance']['id']; ?></td>
		<td><?php echo $this->Html->link($maintenance['Maintenance']['nom'],array('controller' => 'maintenances', 'action' => 'edit', $maintenance['Maintenance']['id'])); ?></td>
		<td>
            <?php echo $maintenance['Maintenance']['condition']; ?>
        </td>
		
        <td> <?php echo $maintenance['Maintenance']['compteur']; ?> </td>
		<td>
		<?php echo $this->Html->link($this->Html->image("delete.png", array("alt" => "Delete")), "/maintenances/delete/{$maintenance['Maintenance']['id']}", array('escape'=>false,'class'=>"first"), 'Are you sure ?');?>
		<?php echo $this->Html->link($this->Html->image("edit.png", array("alt" => "Edit")), '/maintenances/edit/'.$maintenance['Maintenance']['id'], array('escape'=>false,'class'=>"first"));?>
	   </td>
	   
    </tr>
	
    <?php endforeach; ?>

</table>

		<?php echo $this->Paginator->numbers(); ?>


			</div>
			
	</div><!--/span-->

</div>