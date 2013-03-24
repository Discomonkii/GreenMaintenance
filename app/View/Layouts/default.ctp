<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

header('Expires: '.gmdate('D, j M Y H:i:s', time()-1800).' GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', FALSE);
header('Pragma: no-cache');

$cakeDescription = __d('cake_dev', 'Green Maintenance : logiciel de suivi de maintenance');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css('bootstrap-journal');
		echo $this->Html->css('charisma-app');
		echo $this->Html->css('jquery-ui-1.8.21.custom');
		echo $this->Html->css('colorbox');
		echo $this->Html->css('uniform.default');
		echo $this->Html->css('chosen');
		echo $this->Html->css('noty_theme_default');
		echo $this->Html->css('elfinder.min');
		echo $this->Html->css('elfinder.theme');
		echo $this->Html->css('opa-icons');
		echo $this->Html->css('zebra_datepicker');

 

		echo $this->Html->script('zebra_datepicker');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>

	<!-- topbar starts -->
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				
							<?php echo $this->Html->link(
					$this->Html->image('logo400.png', array('alt' => $cakeDescription, 'border' => '0')),
					'http://www.le-grand-vert.fr/',
					array('target' => '_blank', 'escape' => false)
				);
			?>
				
				<!-- theme selector starts -->

				<!-- theme selector ends -->
				
				<!-- user dropdown starts -->
				<div class="btn-group pull-right" >
				
				
					<div class="btn dropdown-toggle" data-toggle="dropdown" href="#">
						<?php
						if($this->Session->read('Auth.User')) {
						   // user is logged in, show logout..user menu etc
						   echo $this->Html->link('Se déconnecter', array('controller'=>'users', 'action'=>'logout')); 
						} else {
						   // the user is not logged in
						   echo $this->Html->link('Se connecter', array('controller'=>'users', 'action'=>'login')); 
						}
						?>
					</div>

				</div>
				<!-- user dropdown ends -->
				
				<div class="top-nav nav-collapse">
					<ul class="nav">
					<!--	<li><a href="#">Rechercher</a></li>
						<li>
							<form class="navbar-search pull-left">
								<input placeholder="Ma recherche ici" class="search-query span2" name="query" type="text">
							</form> 
						</li>-->
					</ul>
				</div><!--/.nav-collapse -->
			</div>
		</div>
	</div>


	<div id="container">

		<div class="container-fluid">
		<div class="row-fluid">
		
		
			<!-- left menu starts -->
			<div class="span2 main-menu-span">
				<div class="well nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">
						<li class="nav-header hidden-tablet">Main</li>
						
						<li><?php echo $this->Html->link(' Dashboard', array( 'controller' => 'dashboards', 'action'=> 'index','admin'=>false)); ?></li>
						<li><?php echo $this->Html->link(' Gestion des Matériels', array( 'controller' => 'materiels', 'action'=> 'index','admin'=>false)); ?></li>
						<li><?php echo $this->Html->link(' Gestion des Catégories', array( 'controller' => 'categories', 'action'=> 'index','admin'=>false)); ?></li>
						<li><?php echo $this->Html->link(' Gestion des Maintenances', array( 'controller' => 'maintenances', 'action'=> 'index','admin'=>false)); ?></li>
						<li><?php echo $this->Html->link(' Gestion des Utilisateurs', array( 'controller' => 'users', 'action'=> 'index','admin'=>false)); ?></li>
						<li><?php echo $this->Html->link(' Gestion des Messages', array( 'controller' => 'messages', 'action'=> 'index','admin'=>false)); ?></li>

<br><br>
						<?php
						if($this->Session->read('Auth.User')) { ?>
						
						<li class="nav-header hidden-tablet">Actions Rapides</li>
						<li><?php echo $this->Html->link(' Ajouter un Matériel', array( 'controller' => 'materiels', 'action'=> 'add','admin'=>false)); ?></li>
						<li><?php echo $this->Html->link(' Ajouter une Catégorie', array( 'controller' => 'categories', 'action'=> 'add','admin'=>false)); ?></li>
						<li><?php echo $this->Html->link(' Ajouter une Maintenance', array( 'controller' => 'maintenances', 'action'=> 'add','admin'=>false)); ?></li>
						<li><?php echo $this->Html->link(' Gestion des Utilisateurs', array( 'controller' => 'materiels', 'action'=> 'index','admin'=>false)); ?></li>
						<li><?php echo $this->Html->link(' Ajouter un Message', array( 'controller' => 'messages', 'action'=> 'add','admin'=>false)); ?></li>
						
						<?php
						}
						?>
					</ul>
					
				</div><!--/.well -->
			</div><!--/span-->
			<!-- left menu ends -->
			
	
	
	
	
	
	
	
	
	
	
	
	
		<div id="content" class="span10">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		
		


		<footer>
		
			<p class="pull-right">Droits réservés à:  
			<?php echo $this->Html->link(
					$this->Html->image('logo200.png', array('alt' => $cakeDescription, 'border' => '0')),
					'http://www.le-grand-vert.fr/',
					array('target' => '_blank', 'escape' => false)
				);
			?>
			</p>
			
		</footer>
		
		</div>
	</div><!--/.fluid-container-->
		
		
	</div>
	<?php //echo $this->element('sql_dump'); ?>
</body>
</html>
