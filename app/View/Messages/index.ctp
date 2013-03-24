
<h1>Messages</h1>
<br>
			<div>
				<ul class="breadcrumb">
<?php echo $this->Html->link($this->Html->image("add.png", array("alt" => "Add_Message")), "/messages/add/", array('escape'=>false,'class'=>"first"));?>
<?php echo $this->Html->link('Ajouter un message', array( 'controller' => 'messages', 'action'=> 'add','admin'=>false)); ?>
				</ul>
			</div>
<br>

<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header well" data-original-title>
			<h2><i class="icon-edit"></i> Liste des Messages</h2>

			</div>
		<div class="box-content">
		
		<form class="form-horizontal">
								  <fieldset>
							<legend>Messages enregistrés dans votre base de données</legend>

<table class="table table-bordered table-striped">

    <tr>
		<th></th>
		<th><?php echo $this->Paginator->sort('date', 'Date Publication'); ?></th>
		<th>Titre</th>
		<th>Auteur</th>
        <th>Action</th>
		
    </tr>

    <!-- Here is where we loop through our $posts array, printing out post info -->

    <?php foreach ($data as $message): ?>
	
    <tr>
		<td><?php echo $this->Form->input("", array("type" => "checkbox")); ?></td>
        <td><?php echo date('d.m.Y à H:i:s', strtotime($message['Message']['date'])); ?></td>
		<td><?php echo $this->Html->link($message['Message']['titre'],array('controller' => 'messages', 'action' => 'edit', $message['Message']['id'])); ?></td>
		<td>
            <?php echo $this->Html->link($message['Message']['utilisateur_id'],array('controller' => 'messages', 'action' => 'edit', $message['Message']['id'])); ?>
        </td>
		<td>
         
		<?php echo $this->Html->link($this->Html->image("delete.png", array("alt" => "Delete")), "/messages/delete/{$message['Message']['id']}", array('escape'=>false,'class'=>"first"), 'Are you sure ?');?>
		<?php echo $this->Html->link($this->Html->image("edit.png", array("alt" => "Edit")), '/messages/edit/'.$message['Message']['id'], array('escape'=>false,'class'=>"first"));?>
	   </td>
	   
    </tr>
	
    <?php endforeach; ?>

</table>

		<?php echo $this->Paginator->numbers(); ?>


			</div>
			
	</div><!--/span-->

</div>