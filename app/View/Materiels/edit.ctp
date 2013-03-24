<script type="text/javascript">
  $(document).ready(function(){
    //hide TaskDue and add two inputs in its place for date + time
    //when submitted, put their values into TaskDue
    $('#TaskDue').hide().after('<input type="text" name="DueDate" id="DueDate" value="" style="width:200px" />&nbsp;<input type="text" name="DueTime" id="DueTime" value="" style="width:200px" />');
    //enable datepicker
    $("#DueDate").Zebra_DatePicker({
      format: 'd/m/Y'
    });
    //enable timepicker
    $("#DueTime").timePicker({
      startTime: "09:00",
      endTime: "17:00",
      show24Hours: true,
      separator: ':',
      step: 20
    });
 
    //put values back into CakePHP input element
    $("#TaskAddForm").submit(function() {
      var DueDate = $("#DueDate").val();
      var DueTime = $("#DueTime").val();
      DueDate = DueDate.split('/');
      $("#TaskDue").val(DueDate[2] + '-' + DueDate[1] + '-' + DueDate[0] + ' ' + DueTime + ':00');
    });
  });
</script>



<?php $materiel = $this->request->data; ?>

<div class="row-fluid sortable">

	<div class="box span12">
	
		<div class="box-header well" data-original-title>
		
			<h2><i class="icon-edit"></i> Editer le Matériel</h2>

			</div>
		<div class="box-content">
				  
							<legend>Editez, modifiez les données du matériel dans votre base de données.</legend>
    <?php
	
		echo $this->Form->create('Materiel',array('action' => 'edit'));
        echo $this->Form->input('nom',array("label" => "Nom"));
		echo $this->Form->input('modele',array("label" => " Modèle"));
		echo $this->Form->input('serie', array('label' => 'Numéro de série', 'type' => 'text'));
		echo $this->Form->input('id');
echo '</br>';
		echo '<b>Durée d utilisation : '.$materiel['Materiel']['duree_utilisation'].' heures</b>';

		echo $this->Form->input('test', array('label' => 'Ajouter des heures', 'type' => 'int'));
		echo '</br>';
		echo "Description";
				echo $this->Tinymce->input('Materiel.description', array(
					'label' => ''
					),array(
						'language'=>'en'
					)
				);  
?>		
<br><br>	
<?php	
echo $this->Form->input('date_acquisition', array( 'label' => 'Date d acquisition',
                                       'type'=>'date',
                                       'dateFormat'=> 'DMY',
                                       'minYear' => date('Y') - 20,
                                       'maxYear' => date('Y') + 20 ));

?>
<br>
<?php echo $this->Uploader->iframe('Materiel',$materiel['Materiel']['id']); 
echo $this->Form->input('maintenances',array("label" => " Ajouter une maintenance"));
?>

<div class="form-actions">
<?php echo $this->Form->end('Mettre à jour', array('escape'=>false,'class'=>"btn btn-primary")); ?>
</div>
						 

			</div>
			
	</div><!--/span-->

</div>