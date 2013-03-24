

<?php $materiel = $this->request->data; ?>

<div class="row-fluid sortable">

	<div class="box span12">
	
		<div class="box-header well" data-original-title>
		
			<h2><i class="icon-edit"></i> Editer le Message</h2>

			</div>
		<div class="box-content">
				  
							<legend>Editez, modifiez les données du message dans votre base de données.</legend>
    <?php
	
		echo $this->Form->create('Message',array('action' => 'edit'));
        echo $this->Form->input('titre',array("label" => "Nom"));
		echo $this->Form->input('id');

	
echo "Description";
	    echo $this->Tinymce->input('Message.message', array(
            'label' => ''
            ),array(
                'language'=>'en'
            )
        );  
?>		
		

<div class="form-actions">
<?php echo $this->Form->end('Mettre à jour', array('escape'=>false,'class'=>"btn btn-primary")); ?>
</div>
						 

			</div>
			
	</div><!--/span-->

</div>