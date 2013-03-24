
<h1>Utilisateurs</h1>
<br>
			<div>
				<ul class="breadcrumb">
<?php echo $this->Html->link($this->Html->image("add.png", array("alt" => "Add_Message")), "/users/add/", array('escape'=>false,'class'=>"first"));?>
<?php echo $this->Html->link('Ajouter un Utilisateur', array( 'controller' => 'users', 'action'=> 'add','admin'=>false)); ?>
				</ul>
			</div>
<br>

<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header well" data-original-title>
			<h2><i class="icon-edit"></i> Liste des Utilisateurs</h2>

			</div>
		<div class="box-content">
		
		<form class="form-horizontal">
								  <fieldset>
							<legend>Utilisateurs enregistrés dans votre base de données</legend>

<table class="table table-bordered table-striped">

    <tr>
		<th></th>
		<th><?php echo $this->Paginator->sort('id', 'Id'); ?></th>
		<th>Nom</th>
		<th>Rôle</th>
		<th>Actions</th>
		
    </tr>

    <!-- Here is where we loop through our $posts array, printing out post info -->

    <?php foreach ($users as $users): ?>
	
    <tr>
		<td><?php echo $this->Form->input("", array("type" => "checkbox")); ?></td>
        <td><?php echo $users['User']['id']; ?></td>
		<td><?php echo $this->Html->link($users['User']['username'],array('controller' => 'users', 'action' => 'edit', $users['User']['id'])); ?></td>
		<td>
            <?php echo $users['User']['role']; ?>
        </td>
		

		<td>
		<?php echo $this->Html->link($this->Html->image("delete.png", array("alt" => "Delete")), "/users/delete/{$users['User']['id']}", array('escape'=>false,'class'=>"first"), 'Are you sure ?');?>
		<?php echo $this->Html->link($this->Html->image("edit.png", array("alt" => "Edit")), '/users/edit/'.$users['User']['id'], array('escape'=>false,'class'=>"first"));?>
	   </td>
	   
    </tr>
	
    <?php endforeach; ?>

</table>

		<?php echo $this->Paginator->numbers(); ?>


			</div>
			
	</div><!--/span-->

</div>