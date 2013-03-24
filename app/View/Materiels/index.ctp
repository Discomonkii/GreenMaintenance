
<h1>Materiels</h1>
<br>
			<div>
				<ul class="breadcrumb">
<?php echo $this->Html->link($this->Html->image("add.png", array("alt" => "Add_Product")), "/materiels/add/", array('escape'=>false,'class'=>"first"));?>
<?php echo $this->Html->link('Ajouter un matériel', array( 'controller' => 'materiels', 'action'=> 'add','admin'=>false)); ?>
				</ul>
			</div>
<br>

<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header well" data-original-title>
			<h2><i class="icon-edit"></i> Liste des Matériels</h2>

			</div>
		<div class="box-content">
		
		<form class="form-horizontal">
								  <fieldset>
							<legend>Matériels enregistrés dans votre base de données</legend>

<table class="table table-bordered table-striped">

    <tr>
		<th></th>
		<th><?php echo $this->Paginator->sort('nom', 'Nom'); ?></th>
		<th><?php echo $this->Paginator->sort('modele', 'Modèle'); ?></th>
		<th><?php echo $this->Paginator->sort('serie', 'N° de série'); ?></th>
		<th><?php echo $this->Paginator->sort('duree_utilisation', 'Nb heures'); ?></th>
		<th><?php echo $this->Paginator->sort('duree_acquisition', 'Acquisition'); ?></th>
		<th><?php echo $this->Paginator->sort('categorie_id', 'Catégorie'); ?></th>
        <th>Action</th>
		
    </tr>

    <!-- Here is where we loop through our $posts array, printing out post info -->

    <?php foreach ($data as $materiel): ?>
	
    <tr>
		<td><?php echo $this->Form->input("", array("type" => "checkbox")); ?></td>
        <td><?php echo $this->Html->link($materiel['Materiel']['nom'],array('controller' => 'materiels', 'action' => 'view', $materiel['Materiel']['id'])); ?></td>
		
        <td>
            <?php echo $materiel['Materiel']['modele']; ?>
        </td>
		<td>
            <?php echo $materiel['Materiel']['serie']; ?>
        </td>
		<td>
            <?php echo $materiel['Materiel']['duree_utilisation']; ?>
        </td>
		<td>
            <?php echo date('d.m.Y', strtotime($materiel['Materiel']['date_acquisition'])); ?>
        </td>
		<td>
            <?php echo $materiel['Categorie']['nom']; ?>
        </td>
		<td>
         
		<?php echo $this->Html->link($this->Html->image("delete.png", array("alt" => "Delete")), "/materiels/delete/{$materiel['Materiel']['id']}", array('escape'=>false,'class'=>"first"), 'Are you sure ?');?>
		<?php echo $this->Html->link($this->Html->image("edit.png", array("alt" => "Edit")), '/materiels/edit/'.$materiel['Materiel']['id'], array('escape'=>false,'class'=>"first"));?>
	   </td>
	   
    </tr>
	
    <?php endforeach; ?>

</table>

		<?php echo $this->Paginator->numbers(); ?>


			</div>
			
	</div><!--/span-->

</div>