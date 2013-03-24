
<h2>Last Items</h2>

<br>

<table>

    <?php $right=true; ?>

    <?php foreach ($data as $materiel): ?>
	
	<tr>
        <td><?php echo $materiel['Materiel']['name']; ?></td>
			
	</tr>	
	<tr>
		<td><?php echo $this->Upload->view('materiel',$materiel['Materiel']['id']); ?></td>
	</tr>
	
   
	
    <?php endforeach; ?>

</table>

		<?php echo $this->Paginator->numbers(); ?>

?>