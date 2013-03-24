



<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header well" data-original-title>
			<h2><i class="icon-edit"></i> <?php echo $message['Message']['titre']; ?></h2>
			</div>
		<div class="box-content">
		
								  <fieldset>
							<legend><?php  echo "le ".date('d.m.Y à H:i', strtotime($message['Message']['date']));?></legend>

<?php echo $message['Message']['message']; ?>

<div class="form-actions">
		<?php echo $this->Html->link($this->Html->image("list.png", array("alt" => "Liste")), "/messages/", array('escape'=>false,'class'=>"first"));?>

		<?php echo $this->Html->link($this->Html->image("delete.png", array("alt" => "Delete")), "/messages/delete/{$message['Message']['id']}", array('escape'=>false,'class'=>"first"), 'Are you sure ?');?>

		<?php echo $this->Html->link($this->Html->image("edit.png", array("alt" => "Edit")), '/messages/edit/'.$message['Message']['id'], array('escape'=>false,'class'=>"first"));?>

</div>
						 
			
	</div><!--/span-->

</div>