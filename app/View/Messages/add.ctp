
<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header well" data-original-title>
			<h2><i class="icon-edit"></i> Ajouter un Message</h2>
			</div>
		<div class="box-content">
		
								  <fieldset>
							<legend>Ajouter un message dans votre base de données</legend>

<?php echo $this->Form->create('Message'); ?>
<?php echo $this->Form->input('titre',array('label'=>"Titre : ")); ?>

<br>
<?php	echo "Message";
	    echo $this->Tinymce->input('Message.message', array(
            'label' => ''
            ),array(
                'language'=>'en'
            )
        );  
?>		
			

<br>

<div class="form-actions">
<?php echo $this->Form->end('Ajouter', array('escape'=>true,'class'=>"btn btn-primary")); ?>
</div>
						 
			
	</div><!--/span-->

</div>