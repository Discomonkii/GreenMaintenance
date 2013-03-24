<h1>Page d'accueil</h1>
<br>		
			

			<div class="sortable row-fluid">
				<a data-rel="tooltip" title="$34 new sales." class="well span3 top-block" href="">
					<span class="icon32 icon-red icon-home"></span>
					<div>Matériels</div>
					<div></div>
					<span class="notification"><?php echo $totalmateriels; ?></span>
				</a>
				
				<a data-rel="tooltip" title="4 new pro members." class="well span3 top-block" href="">
					<span class="icon32 icon-color icon-alert"></span>
					<div>Maintenances</div>
					<div></div>
					<span class="notification green"><?php echo $totalalertes; ?></span>
				</a>
				
				<a data-rel="tooltip" title="6 new members." class="well span3 top-block" href="">
					<span class="icon32 icon-color icon-user"></span>
					<div>Utilisateurs</div>
					<div><?php //echo $totalutilisateurs; ?></div>
					<span class="notification yellow"><?php echo $users; ?></span>
				</a>
				
				<a data-rel="tooltip" title="12 new messages." class="well span3 top-block" href="">
					<span class="icon32 icon-color icon-envelope-closed"></span>
					<div>Messages</div>
					<div></div>
					<span class="notification red"><?php echo $totalmessages; ?></span>
				</a>
			</div>
			
			<div class="row-fluid">
				<div class="box span12">
					<div class="box-header well">
						<h2><i class="icon-info-sign"></i> Présentation</h2>
 
					</div>
					<div class="box-content">
						<h1>Le Grand Vert <small> présente <b>"Green Maintenance"</b>, une application permettant de gérer la maintenance de matériels</small></h1>
						<p>L'application a été developpée spécialement dans le cadre d'un projet BTS.</p>
						<p><b>Cet outil a été pensé par Bastien Mullem et codé par DiscoMonkii</b></p>
						
						<p class="center">
						</p>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
			
			
			
			<div class="row-fluid sortable">
			
			
				<div class="box span4">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-th"></i> Derniers Messages</h2>
					</div>
					<div class="box-content">
						<div class="box-content">
							<ul class="dashboard-list">
							
							<?php  foreach($dernierCree as $m):?>
								<li>
									
									<strong>Titre :</strong><?php echo $this->Html->link( $m['Message']['titre'], array( 'controller' => 'messages', 'action'=> 'view', $m['Message']['id'],'admin'=>false)); ?>

									<br>
									<strong>Date:</strong> <?php  echo "le ".date('d.m.Y à H:i', strtotime($m['Message']['date']));?><br>
									<strong>Message:</strong> <span><?php  
																		echo $this->Text->truncate(
																			strip_tags($m['Message']['message']), 
																			50, 
																				array(
																					'ending' => '...', 
																					'exact' => false)
																		); 
									?></span>  								
								</li>
							<?php endforeach; ?>
							</ul>
						</div>
					</div>
				</div><!--/span-->
				
				
				
						
				<div class="box span4">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-th"></i> Derniers Matériels</h2>
					</div>
					<div class="box-content">
						<div class="box-content">
							<ul class="dashboard-list">
							
							<?php  foreach($derniersM as $materiel):?>
								<li>
									
									<strong>Nom :</strong>
									<?php echo $this->Html->link( $materiel['Materiel']['nom'], array( 'controller' => 'materiels', 'action'=> 'view', $materiel['Materiel']['id'],'admin'=>false)); ?>
									<br>
									<strong>Date d'acquisition:</strong> <?php  echo "le ".date('d.m.Y', strtotime($materiel['Materiel']['date_acquisition']));?><br>
									<strong>Modele:</strong> <span><?php  echo $materiel['Materiel']['modele'];?></span>								
								</li>
							<?php endforeach; ?>
							</ul>
						</div>
					</div>
				</div><!--/span-->
						

				<div class="box span4">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-th"></i> Dernières Maintenances</h2>
					</div>
					<div class="box-content">
						<div class="box-content">
							<ul class="dashboard-list">
							
							<?php  foreach($maintenances as $maintenance):?>
								<li>
									
									<strong>Nom :</strong>
									<?php echo $this->Html->link( $maintenance['Maintenance']['nom'], array( 'controller' => 'maintenances', 'action'=> 'view', $maintenance['Maintenance']['id'],'admin'=>false)); ?>
									<br>
									<strong>A effectuer toutes les</strong> <?php  echo $maintenance['Maintenance']['compteur'];?><br>
									<strong>Entretien:</strong> <span><?php  echo $maintenance['Maintenance']['resume'];?></span>								
								</li>
							<?php endforeach; ?>
							</ul>
						</div>
					</div>
				</div><!--/span-->	
						
						
						
						
			</div><!--/row-->
			
			
			