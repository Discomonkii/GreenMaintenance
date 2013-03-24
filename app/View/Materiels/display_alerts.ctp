
<h2>Last Items</h2>

<br>

<table>

    <?php $right=true; ?>

    <?php foreach ($alertes as $materiel): ?>
	
	<tr>
        <td><?php echo $materiel['Maintenance']['condition']; ?></td>
			
	</tr>	

	
   
	
    <?php endforeach; ?>

</table>

		<?php echo $this->Paginator->numbers(); ?>

?>