

<?php $categorie = $this->request->data; ?>

<div class="row-fluid sortable">

	<div class="box span12">
	
		<div class="box-header well" data-original-title>
		
			<h2><i class="icon-edit"></i> Editer la Catégorie</h2>

			</div>
		<div class="box-content">
				  
							<legend>Editez, modifiez les données de la catégorie dans votre base de données.</legend>
    <?php
	
		echo $this->Form->create('Categorie',array('action' => 'edit'));
		
        echo $this->Form->input('nom',array("label" => "Nom"));
		echo $this->Form->input('id');
		echo "Description";
				echo $this->Tinymce->input('Categorie.description', array(
					'label' => ''
					),array(
						'language'=>'en'
					),
					'bbcode'
				);  
?>		
		


<br>
<div class="form-actions">
<?php echo $this->Form->end('Mettre à jour', array('escape'=>false,'class'=>"btn btn-primary")); ?>
</div>
						 

			</div>
			
	</div><!--/span-->

</div>