
<h1>Catégories</h1>
			<div>
				<ul class="breadcrumb">
					<?php echo $this->Html->link($this->Html->image("add.png", array("alt" => "Ajouter_Categorie")), "/categories/add/", array('escape'=>false,'class'=>"first"));?>
					<?php echo $this->Html->link('Ajouter une Categorie', array( 'controller' => 'categories', 'action'=> 'add','admin'=>false)); ?>
				</ul>
			</div>
<br>

<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header well" data-original-title>
			<h2><i class="icon-edit"></i> Liste des Catégories</h2>

			</div>
		<div class="box-content">
		
		<form class="form-horizontal">
								  <fieldset>
							<legend>Catégories enregistrées dans votre base de données</legend>
<table class="table table-bordered table-striped">

    <tr>
	
        <th> <?php echo $this->Paginator->sort('id', 'Id'); ?></th>
        <th><?php  echo $this->Paginator->sort('nom', 'Nom'); ?></th>
		
        <th>Action</th>
		
    </tr>

    <!-- Here is where we loop through our $posts array, printing out post info -->

    <?php foreach ($data as $categorie): ?>
    <tr>
        <td><?php echo $categorie['Categorie']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($categorie['Categorie']['nom'],
array('controller' => 'categories', 'action' => 'view', $categorie['Categorie']['id'])); ?>
        </td>
		<td>
		<?php echo $this->Html->link($this->Html->image("delete.png", array("alt" => "Delete")), "/categories/delete/{$categorie['Categorie']['id']}", array('escape'=>false,'class'=>"first"), 'Are you sure ?');?>
		<?php echo $this->Html->link($this->Html->image("edit.png", array("alt" => "Edit")), '/categories/edit/'.$categorie['Categorie']['id'], array('escape'=>false,'class'=>"first"));?>
       </td>
        
    </tr>
	
    <?php endforeach; ?>

</table>
	 
			</div>
			
	</div><!--/span-->

</div>
